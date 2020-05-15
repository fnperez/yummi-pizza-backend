<?php

namespace YummiPizza\Entities;

use Illuminate\Support\Carbon;
use YummiPizza\Contracts\IUser;
use YummiPizza\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use YummiPizza\Traits\HasTimestamps;

class User extends Authenticatable implements JWTSubject, IUser
{
    public const ADMIN = 'admin';
    public const CLIENT = 'client';

    use Notifiable, HasTimestamps;

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
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail():? string
    {
        return $this->email;
    }

    public function getName():? string
    {
        return $this->name;
    }

    public function getPassword():? string
    {
        return $this->password;
    }

    public function markEmailAsUnverified(): void
    {
        $this->forceFill([
            'email_verified_at' => null,
        ])->save();
    }

    public function getId(): ?string
    {
        return $this->getKey();
    }

    public function getVerifiedAt():? Carbon
    {
        return $this->email_verified_at;
    }

    public function isRole(string $role): bool
    {
        return $this->role === $role;
    }
}
