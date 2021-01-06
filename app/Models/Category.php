<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'created_at' => 'datetime:jS F, Y, H:i:s',
        'updated_at' => 'datetime:jS F, Y, H:i:s'
    ];

    public function themes()
    {
        return $this->hasMany(Theme::class);
    }

}
