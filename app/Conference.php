<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model {

    protected $fillable = [
        'loginId',
        'feesId',
        'name',
        'acronym',
        'theme',
        'venueAddress',
        'websiteURL',
        'email',
        'contactNo',
        'faxNo',
        'startDate',
        'endDate'
    ];

}
