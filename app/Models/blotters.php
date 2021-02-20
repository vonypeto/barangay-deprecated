<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blotters extends Model
{
    use HasFactory;
    protected $table = 'blotters';
    //Primary Key
    public $primaryKey = 'blotter_id';
    // Timestamps
    public $timestamps = true;
}
