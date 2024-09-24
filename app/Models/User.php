<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Test;
use Laravel\Sanctum\HasApiTokens;
use App\Models\SubscribeTransactions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
    ];

    // public function tests(){
    //     return $this->belongsToMany(Test::class, 'test_people','user_id','test_id');
    // }

    public function subscribeTransaction()
    {
        return $this->hasOne(SubscribeTransactions::class);
    }

    public function hasActiveSubscription()
    {
        $subscription = $this->subscribeTransaction;
        return $subscription && $subscription->is_active;
        
    }
}
