<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'picture',
        'body',
        'author_id',
        'status',

    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    // relations

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(User::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return  $this->hasMany(Comment::class);
    }

    public function likes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Like::class);
    }
    //Logic
    public function publish() :void
    {
        $this->status = 'published';
        $this->save();
    }
    public function isPublished() :bool
    {
        return $this->status === 'published';
    }
    public function canBeEditedBy(User $user) :bool
    {
        return $this->author_id === $user->id || $user->isAdmin();
    }
    public function isLikedBy(User $user) :bool
    {
        return $this->likes()->where('user_id',$user->id)->exists();
    }
    //Scopes
    public function scopePublished($query)
    {
        return $query->where('status','published');

    }
    public function scopeForCurrentUser($query)
    {
        return $query->where('author_id',auth()->id());
    }
    public function getSmallBody()
    {
        return Str::limit($this->body, 150);
    }


}
