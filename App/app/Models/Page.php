<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sn_twitter',
        'sn_facebook',
        'sn_instagram',
        'sn_linkedin',
        'description',
        'website',
        'phone',
        'city',
        'country',
        'cover_image',
        'logo',
        'business_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
