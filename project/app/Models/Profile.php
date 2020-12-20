<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'picture',
        'cover_image',
        'job_title',
        'sn_twitter',
        'sn_facebook',
        'sn_instagram',
        'sn_linkedin',
        'description',
        'job_description',
        'website',
        'phone',
        'city',
        'country',
        'degree',
        'cv',
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

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function educations()
    {
        return $this->hasMany('App\Models\Educations');
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\Certificates');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skills');
    }
}
