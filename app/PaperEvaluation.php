<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperEvaluation extends Model {

    protected $fillable = [
        'user_id',
        'paper_id',
        'mark',
        'comment'
    ];

}
