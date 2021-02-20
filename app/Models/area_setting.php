<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area_setting extends Model
{
    use HasFactory;
    protected $table = "area_settings";
    public $primaryKey = 'area_id';


}
