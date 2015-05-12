<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperDiscussion extends Model {

    protected $fillable = [
        'user_id',
        'paper_id',
        'content'
    ];

}
