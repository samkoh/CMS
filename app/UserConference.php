<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConference extends Model {

    protected $fillable = [
        'user_id',
        'conference_id'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

}
