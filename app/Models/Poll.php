<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use CrudTrait;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'small_image',
        'large_image',
        'title',
        'question'
    ];

    public function answerOptions(): HasMany
    {
        return $this->hasMany(AnswerOption::class);
    }

    public function setSmallImageAttribute($value): void
    {
        $attribute_name = "small_image";
        $disk = "public";
        $destination_path = "polls/small";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public function setLargeImageAttribute($value): void
    {
        $attribute_name = "large_image";
        $disk = "public";
        $destination_path = "polls/large";
        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
