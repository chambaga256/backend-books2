<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{ protected $fillable = ['title','author','publisher'];
    protected $table ='books';
    use HasFactory;
}
