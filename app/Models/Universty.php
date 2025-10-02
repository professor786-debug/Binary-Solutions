<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universty extends Model
{
    use HasFactory;
    protected $table = 'universties';
    protected $fillable = ['name', 'status'];
}
