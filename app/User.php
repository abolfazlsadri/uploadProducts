<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

/**
 * @OA\Schema(required={"name", "password", "c_password", "email"}),
 */

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @OA\Property(type="string")
     */
    protected $name;

    /**
     * @OA\Property(type="string", pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$", format="email", example="user2@gmail.com")
     */
    protected $email;

    /**
     * @OA\Property(type="string", format="password", example="PassWord12345")
     */
    protected $password;

    /**
     * @OA\Property(type="string", format="password", example="PassWord12345")
     */
    protected $c_password;
}
