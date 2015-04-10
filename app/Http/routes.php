<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 //Route::get('/', 'HomeController@index');

//Route::get('home', 'ConfChairPapersController@index');

Route::get('conferenceChair/allPapers', 'ConfChairPapersController@index');

Route::get('conferenceChair/allPapers/{id}', 'ConfChairPapersController@show');

Route::get('conferenceChair/invitationStatus', 'ConfChairInvitationStatusController@index');

Route::get('conferenceChair/invitation/confirm', 'ConfChairInvitationController@confirm');

Route::get('conferenceChair/invitationCancel', 'ConfChairInvitationCancelController@index');

Route::get('conferenceChair/sendBulkEmail', 'ConfChairSendBulkEmailController@index');

Route::resource('conferenceChair', 'ConfChairInvitationController');


Route::get('reviewer/discussion', 'ReviewerDiscussionController@index');

Route::get('reviewer/discussion/{id}', 'ReviewerDiscussionController@showDiscussion');

Route::get('reviewer/reviewerRegistration', 'ReviewerRegistrationController@index');
Route::resource('reviewer', 'ReviewerPaperController');
Route::get('reviewer/paper/{id}', 'ReviewerPaperController@show');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
