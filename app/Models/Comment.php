<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:jS F, Y, H:i:s',
        'updated_at' => 'datetime:jS F, Y, H:i:s'
    ];

    protected $fillable = [
        'content', 'author_id', 'post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class,'author_id', 'id');
    }
}
