<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model {

    protected $fillable = [
//        'email',
        'conferenceName',
        'acronym',
        'theme',
        'address',
        'websiteURL',
        'conferenceEmail',
        'contactNo',
        'faxNo',
        'startDate',
        'endDate'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function  topic()
    {
        return $this->belongsToMany('App\Topic')->withTimestamps();
    }

}
