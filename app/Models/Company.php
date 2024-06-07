<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'branch',
        'country',
        'city',
        'default_currency',
        'telephone_number',
        'mobile_number',
        'email',
        'address',
        'registration_number',
        'kra_pin',
        'nssf_no',
        'nhif_no',
        'status',
        'extras',
    ];

    /**
     * The subscriptions that belong to the company.
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'company_subscriptions');
    }

     /**
     * The users that belong to the company.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_companies');
    }
}
