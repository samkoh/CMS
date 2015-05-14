<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperReview extends Model {

    protected $fillable = [
        'reviewer_id',
        'assigned_by',
        'paper_id',
        'score',
        'paperEvaluation',
        'quality',
        'rationale',
        'hypothesis',
        'manuscript',
        'structure',
        'comment'
    ];

    /*
     * One paper belongs to many users to review
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
