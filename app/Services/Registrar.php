<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'firstname' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
            'gender' => 'required',
            'dateOfBirth' => 'required',
            'addressLine1' => 'required',
            'contactNo' => 'required',
        ],
            $messages = array(
                'firstname.required' => 'The name is required ',
                'password.required' => 'The password is required ',
                'gender.required' => 'The gender is required ',
                'dateOfBirth.required' => 'Your day of birth is required ',
                'addressLine1.required' => 'The address is required ',
                'contactNo.required' => 'The contact number is required ',

            ));

	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
			'password' => bcrypt($data['password']),
            'nameTitlePrefix' => $data['nameTitlePrefix'],
            'gender' => $data['gender'],
            'dateOfBirth' => $data['dateOfBirth'],
            'nationalIdentityNo' => $data['nationalIdentityNo'],
            'addressLine1' => $data['addressLine1'],
            'addressLine2' => $data['addressLine2'],
            'addressLine3' => $data['addressLine3'],
            'city' => $data['city'],
            'state' => $data['state'],
            'postalCode' => $data['postalCode'],
            'country' => $data['country'],
            'contactNo' => $data['contactNo'],
            'faxNo' => $data['faxNo'],
            'education' => $data['education'],
            'user_role' => $data['user_role'],

        ]);
	}

}
