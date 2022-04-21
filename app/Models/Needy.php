<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Needy extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'nid';
}
