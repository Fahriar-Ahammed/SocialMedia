<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public function User():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function Photos(): HasMany
    {
        return $this->hasMany(PostPhotos::class, 'post_id');
    }

    public function Likes(): HasMany
    {
        return $this->hasMany(PostLike::class, 'post_id');
    }

    public function Comments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'post_id')
            ->whereNull('parent_id');
    }
}
