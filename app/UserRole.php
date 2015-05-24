<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_roles';



    public function users()
    {
        return $this->belongsToMany('App\User', 'email')->withTimestamps();
    }

}
