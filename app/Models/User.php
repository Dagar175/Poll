<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Poll;
use App\Models\Votes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
        'password' => 'hashed',
    ];

/**
 * Get all of the polls for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
        public function polls(): HasMany
        {
            return $this->hasMany(Poll::class, 'user_id', 'id');
        }


        public function getVotedPolls()
        {
            return $this->votes()->with('poll')->get();
        }
    
        public function votes(): HasMany
        {
            return $this->hasMany(Votes::class, 'user_id' , 'id');
        }
}
