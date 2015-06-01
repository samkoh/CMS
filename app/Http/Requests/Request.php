<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {

    //Custom Validation message for upload paper
    public function messages()
    {
        return [
            'fullPaperUrl.required' => 'You need to upload your paper',
            'fullPaperUrl.mimes' => 'Your upload paper must be in PDF file format',
            'websiteURL.active_url' => 'Your conference URL is invalid'
        ];
    }

}
