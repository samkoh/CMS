<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model {

    protected $fillable = [
        'title',
        'abstractContent',
        'fullPaperUrl',
        'status'
    ];

}
