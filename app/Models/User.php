<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User; 

class User extends Authenticatable
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1; 
    
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'role',
        'status',
        'email_verified_at',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include active users.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include inactive users.
     */
    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    /**
     * Automatically hash the password when setting it.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public const ROLES = [
        'anonymous',  // Utilisateur non connecté
        'user',       // Utilisateur connecté
        'admin',      // Administrateur
    ];

    public const STATUSES = [
        'active',
        'inactive',
        'banned',      // Par exemple, utilisateur banni
        'pending',     // Par exemple, en attente de validation
    ];

    public function checkUserRole(User $user)
    {
    if ($user->role === User::ROLES['admin']) {
        return response()->json(['message' => 'Cet utilisateur est un administrateur.']);
    }

    return response()->json(['message' => 'Cet utilisateur n\'est pas un administrateur.']);
}

public function setUserRole(User $user)
{
    $user->role = User::ROLES['user'];
    $user->save();

    return response()->json(['message' => 'Le rôle de l\'utilisateur a été mis à jour.']);
}
}