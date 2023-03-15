<?php

namespace App\Http\Controllers;

use App\Models\Panorama;
use Illuminate\Http\Request;

class ThreeSixtyController extends Controller
{
    public function index(Request $request)
    {
        $panorama = Panorama::get();
        return view('ThreeSixty', compact('panorama'));
    }
    public function store(Request $request)
    {

        $imgArr = (array)[];
        $randomUrl = $this->getRandomCode(6) . time();
        foreach ($request->intro_img as $value) {
            $path = FilesController::imgUpload($value, $randomUrl);
            array_push($imgArr, $path);
        }
        $path = json_encode($imgArr);
        Panorama::create([
            'url' =>  $randomUrl,
            'img_paths' => $path,
        ]);
        return redirect('/three-sixty');
    }

    public function look(Request $request, $id, $url)
    {
        $data = Panorama::find($id)->where('url', $url)->first();
        if ($data) {
            $panorama = $data->img_paths ?? '';
        }else{
            $panorama ='';
        }
        return view('ThreeSixtyLook', compact('panorama'));
    }

    public function delete($id)
    {
        
        $path = Panorama::find($id)->first();
        $path_src = json_decode($path->img_paths);
        foreach ($path_src as $item) {


            FilesController::deleteUpload($item);
        }

        $path->delete();
        return redirect('/three-sixty');
    }
    /**
     * 產生亂數碼
     * @param int $count 產生亂數碼的數量(預設長度為3)
     * @return string 回傳亂數碼字串
     */
    function getRandomCode($count = 3)
    {
        $randomString = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $count);

        return $randomString;
    }
}
