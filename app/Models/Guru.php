<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

// class Guru extends Model
class Guru extends Authenticatable
{
    use HasRoles;
    
    protected $guard = 'gurus';
    protected $table = 'gurus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'alamat',
        'no_ktp',
        'username',
        'password',
        'level',
    ];
}
