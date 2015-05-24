<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserRole extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
//    protected $table = 'user_user_roles';

    protected $fillable = [
        'user_id',
        'conference_id',
        'user_role_id'
    ];

//    public function users()
//    {
//        return $this->hasMany('App\User')->withTimestamps();
//    }

}
