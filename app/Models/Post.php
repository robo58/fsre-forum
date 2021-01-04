<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'author_id', 'theme_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:jS F, Y, H:i:s',
        'updated_at' => 'datetime:jS F, Y, H:i:s'
    ];

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'author_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
