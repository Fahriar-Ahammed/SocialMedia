<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostComment extends Model
{
    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id')
            ->select('id','name');
    }

    public function replies():HasMany
    {
        return $this->hasMany(PostComment::class,'parent_id')
            ->select('id','parent_id','comment')
            ->with('replies');
    }

    public function likes():HasMany
    {
        return $this->hasMany(CommentLike::class,'comment_id');
    }

    public function mentions():HasMany
    {
        return $this->hasMany(CommentMentions::class,'comment_id');
    }
}
