<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poll extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['small_image', 'large_image', 'title', 'question'];

    public function options(): HasMany
    {
        return $this->hasMany(AnswerOption::class);
    }
}
