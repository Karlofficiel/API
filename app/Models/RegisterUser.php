<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    use HasFactory;

    protected $table = 'register_users';
    protected $hidden = ['password']; // Pour ne pas retourner le hash du mot de passe dans la réponse JSON
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

}
