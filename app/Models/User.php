<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Roles of users
     *
     * @var string[]
     */
    protected $roles = [
        'user',
        'writer',
        'moderator',
        'admin'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Checks if user has permission as defined role
     *
     * @param string $role
     * @throws Exception
     * @return bool
     */
    public function hasPermission(string $role)
    {
        if (!in_array($role, $this->roles))
        {
            throw new Exception('INVALID ROLE');
        }
        return array_search($this->role, $this->roles) >= array_search($role, $this->roles);
    }
}
