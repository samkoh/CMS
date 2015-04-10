<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

class Invitation extends Model {


    protected $fillable = [
        'name',
        'email',
        'template',
    ];


    //public static function open(array $attributes)
    //{
    //return new static($attributes);
    //}

    //public function useTemplate($template)
    //{
    //$this->template = $template;

    //return $this;
    //}


    /**
     * A notice is created by a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the email address for the recipient of DMCA notice
     *
     * @return string
     */
    public function getRecipientEmail()
    {
        return $this->user->email;
    }

    /**
     * Get the email address of the owner of the notice
     *
     * @return string
     */
    public function getOwnerEmail()
    {
        return $this->user->email;
    }
}
