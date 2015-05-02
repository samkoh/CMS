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

 Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('conferenceChair/allPapers', 'ConfChair\ConfChairPapersController@index');
Route::get('conferenceChair/allPapers/{id}', 'ConfChair\ConfChairPapersController@show');
Route::get('conferenceChair/invitationStatus', 'ConfChair\ConfChairInvitationStatusController@index');
Route::get('conferenceChair/invitation/confirm', 'ConfChair\ConfChairInvitationController@confirm');
Route::get('conferenceChair/invitationCancel', 'ConfChair\ConfChairInvitationCancelController@index');
Route::get('conferenceChair/sendBulkEmail', 'ConfChair\ConfChairSendBulkEmailController@index');
//Route::get('conferenceChair/createTopic', 'ConfChair\ConfChairCreateTopicController@create');
Route::resource('conferenceChair/createTopic','ConfChair\ConfChairCreateTopicController' );
//Route::get('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController@index');
Route::resource('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController');
//Route::get('conferenceChair/createConference', 'ConfChairCreateConference@store');
Route::get('conferenceChair/createConferenceFee', 'ConfChair\ConfChairConferenceFeeController@index');
Route::resource('conferenceChair', 'ConfChair\ConfChairInvitationController');


Route::get('reviewer/discussion', 'Reviewer\ReviewerDiscussionController@index');
Route::get('reviewer/discussion/{id}', 'Reviewer\ReviewerDiscussionController@showDiscussion');
Route::get('reviewer/reviewerRegistration', 'Reviewer\ReviewerRegistrationController@index');
Route::resource('reviewer', 'Reviewer\ReviewerPaperController');
Route::get('reviewer/paper/{id}', 'Reviewer\ReviewerPaperController@show');

Route::resource('author', 'Author\SubmitPaperController');



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
