<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Bpuig\Subby\Traits\HasSubscriptions ;

class Company extends Model
{
    use HasFactory,HasSubscriptions ;
    
}
