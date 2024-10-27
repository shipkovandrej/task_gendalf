<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function goods()
    {
        return $this->hasMany(Good::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'category_users', 'category_id', 'user_id')->withTimestamps();
    }


}
