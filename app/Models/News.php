<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'small_image',
        'large_image',
        'title',
        'subtitle',
        'teaser',
        'content',
    ];

    public function setSmallImageAttribute($value): void
    {
        $attribute_name = "small_image";
        $disk = "public";
        $destination_path = "stories/small";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setLargeImageAttribute($value): void
    {
        $attribute_name = "large_image";
        $disk = "public";
        $destination_path = "stories/large";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

}
