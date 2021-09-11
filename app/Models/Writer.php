<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class Writer extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account_balance','about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'account_balance' => 'double'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function bids(){
        return $this->hasMany(BiddingOrders::class, 'email', 'email');
    }

    public function completed(){
        return $this->hasMany(CompletedOrder::class, 'email', 'email');
    }

    public function ratings()
    {
        return $this->hasMany(WriterRating::class);
    }
    
    public function recentRatings()
    {
        return $this->hasMany(WriterRating::class)->limit(5)->orderBy('created_at', 'DESC');
    }

    public function averageRating()
    {
        if($this->ratings)
            return number_format($this->ratings()->average('rating'), 1);
        else
            return 0;
    }

    
}
