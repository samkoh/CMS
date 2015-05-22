<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUserRole extends Model {

        protected $fillable = [
        'user_id',
        'conference_id',
            'user_role_id'
    ];

}
