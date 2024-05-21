<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;





class Client extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'clients';
    public $timestamps = true;

    protected $fillable = array('name', 'phone', 'api_token', 'password', 'is_active', 'email', 'd_o_b', 'city_id', 'blood_type_id', 'pin_code', 'last_donation_rate');
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function bloodTypesSettings()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->phone_number;
    }
}
