<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->user_id = auth()->id();
            $slug = Str::slug($post->title);

            // Check for uniqueness
            // would increment if slug is not unique
            $originalSlug = $slug;
            $count = 1;
            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $post->slug = $slug;
        });
    }

    protected $fillable = [
        'title',
        'content',
        'slug',
        'topic',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
