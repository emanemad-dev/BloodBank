<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'city_id', 'hospital_name', 'blood_type_id', 'age', 'bags_num', 'details', 'hospital_address', 'latitude', 'longitude', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}
