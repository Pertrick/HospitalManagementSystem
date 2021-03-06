<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialty;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'room_no',
        'specialty_id', 
    ];

    public function specialty(){
        return $this->belongsTo(Specialty::class );
    }
}
