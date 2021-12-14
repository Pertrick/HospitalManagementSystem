<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Specialty extends Model
{
    use HasFactory;

    public $table  = 'specialty';

    public function Doctor(){
        return $this->hasOne(Doctor::class);
    }
}
