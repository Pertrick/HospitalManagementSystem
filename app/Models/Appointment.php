<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'specialist',
        'date',
        'message',
        'phone',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


  
}
