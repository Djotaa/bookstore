<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $guarded=['id,created_at,updated_at'];

    public function authors(){
        return $this->belongsToMany(Author::class)->withTimestamps();
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
