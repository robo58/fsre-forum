<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:jS F, Y, H:i:s',
        'updated_at' => 'datetime:jS F, Y, H:i:s'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
