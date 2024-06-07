<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'path',
        'status',
        'extras',
    ];

    /**
     * The companies that belong to the subscription.
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_subscriptions');
    }
}
