<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident_info extends Model
{
    use HasFactory;
    protected $table = 'resident_infos';
    //Primary Key
    public $primaryKey = 'resident_id';
    // Timestamps
    public $timestamps = true;
}
