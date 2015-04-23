<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

    /*
     * Fillable for a topic
     */
    protected $fillable = [
        'name'
    ];

    /*public function  user()
    {
        return $this->belongsTo('App\User');
    }*/

    public function  conferences()
    {
        return $this->belongsToMany('App\Conference');
    }

}
