<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model {

    protected $fillable = [
        'title',
        'abstractContent',
        'fullPaperUrl',
        'status',
        'tempStatus',
        'averageMarks'
    ];


    public function  evaluations()
    {
        return $this->hasMany('App\PaperEvaluation');
    }
}
