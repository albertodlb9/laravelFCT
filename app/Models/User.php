<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** Esto es del menda */
    //* Relación companies_roles_users */
    public function actions(): HasMany
    {
        return $this->hasMany(Action::class, 'user_id', 'id');
    }
    public function rols(): BelongsToMany
    {
        return $this->belongsToMany(Rol::class,'companies_roles_users');
    }
    public function companies():  BelongsToMany
    {
        return $this->belongsToMany(Company::class,'companies_roles_users');
    }
    //* Relación pupils_teachers_tutors */

    public function teacher():hasOne
    {
        return $this->hasOne(User::class);
    }
    public function tutors():hasMany
    {
        return $this->hasMany(User::class);
    }
    public function pupils():hasMany
    {
        return $this->hasMany(User::class);
    }

/************************************** */


    /**                  */
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
