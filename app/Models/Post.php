<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(PostPhotos::class, 'post_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PostLike::class, 'post_id')
            ->select('post_id','user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PostComment::class, 'post_id')
            ->whereNull('parent_id');
    }
}
