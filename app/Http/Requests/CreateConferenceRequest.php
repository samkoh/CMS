<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateConferenceRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'conferenceName' =>'max:100',
            'acronym' =>'max:30',
            'theme' =>'max:50',
            'conferenceEmail'    => 'email',
            'websiteURL' => 'active_url',
            'contactNo' => 'integer',
            'faxNo' => 'integer',
        ];
	}

}
