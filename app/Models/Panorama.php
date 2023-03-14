<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $url
 * @property string $img_paths
 */
class Panorama extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'url', 'img_paths'];
}
