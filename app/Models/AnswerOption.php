<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnswerOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['response', 'poll_id'];

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_option');
    }
}
