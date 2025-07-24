<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'image', 'user_id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Additional methods or relationships can be defined here
    protected static function booted(): void
    {
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $slug = Str::slug($post->title);

                // تحقق من عدم التكرار
                $count = static::where('slug', 'LIKE', "{$slug}%")->count();
                $post->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });
    }
}
