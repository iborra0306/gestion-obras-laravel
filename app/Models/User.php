<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

#[Fillable(['name', 'email', 'password', 'rol'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

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

    public function partesTrabajo(): HasMany
    {
        return $this->hasMany(ParteTrabajo::class);
    }

    public function partesProveedor(): HasMany
    {
        return $this->hasMany(ParteProveedor::class);
    }

    public function partesEspecialista(): HasMany
    {
        return $this->hasMany(ParteEspecialista::class);
    }

    public function faltas(): HasMany
    {
        return $this->hasMany(Falta::class);
    }
}
