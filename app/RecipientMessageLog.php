<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipientMessageLog extends Model {

    /*
   * Fillable fields for Conference Chair Invitation
   *
   * #var array
   */
    protected $fillable = [
        'user_id',
        'recipient_id',
        'messagelog_id',
        'content'
    ];

    /*
     * Open a new Invitation
     */
    public static function open(array $attributes)
    {
        return new static($attributes);
    }

    /*
     * Set the invitation template Recipient Message
     */
    public function useTemplate($content)
    {
        $this->content = $content;

        return $this;
    }

//    public function message()
//    {
//        return $this->belongsToMany('App\MessageLog');
//    }

//    public function recipient()
//    {
//        return $this->belongsTo('App\RecipientMessageLog', 'recipient_id');
//    }
//
//    public function user()
//    {
//        return $this->belongsTo('App\User');
//    }
//
//    public function getRecipientEmail()
//    {
//        return $this->recipient->recipient_id;
//    }
//
//    public function getOwnerEmail()
//    {
//        return $this->user->email;
//    }

}
