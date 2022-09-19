<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $guarded=['id,created_at,updated_at'];

    public function books(){
        return $this->belongsToMany(Book::class)->withTimeStamps();
    }
}
