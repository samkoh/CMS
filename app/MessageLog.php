<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageLog extends Model {

    /*
* Fillable fields for Conference Chair Invitation
*
* #var array
*/
    protected $fillable = [
        'user_id',
        'recipient_id',
        'conference_id',
        'conference_hash_id',
        'title',
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

//    public function recipientMessageLog()
//    {
//        return $this->belongsToMany('App\RecipientMessageLog');
//    }

}
