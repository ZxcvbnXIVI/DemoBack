<?php

// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'UserID'; // Assuming 'UserID' is the primary key

    protected $fillable = [
        'UserName',
        'email',
        'google_id',
        'email_verified_at',
        'password',
        'Role',
        'image_path',
        'current_team_id',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Additional model methods or relationships can be defined here
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}

