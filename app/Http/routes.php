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

Route::resource('home', 'HomeController');
//Route::resource('home', 'ReviewerHomeController');

Route::get('conferenceChair/confDiscussion', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@index']);
Route::get('conferenceChair/confDiscussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@show']);
Route::post('conferenceChair/confDiscussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@store']);

Route::get('conferenceChair/allPapers', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPapersController@index']);
Route::get('conferenceChair/allPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPapersController@show']);
Route::post('conferenceChair/allPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPapersController@store']);

//Route::get('conferenceChair/finalizeAllPapers', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairFinalizePapersController@index']);

// Allow users with the permission "access" to see the page.
// Apply the middleware to a single route.
//Route::group(['middleware' =>'auth', 'permissions.required'], function() {
//    Route::get('conferenceChair/finalizeAllPapers',[
//        'permissions' => ['conference_chair', 'reviewer'],
//        'uses' => 'ConfChair\ConfChairFinalizePapersController@index',
//        'permissions_require_all' => true, //true means need to fulfill both permissions (AND)
//    ]);
//});
Route::get('conferenceChair/finalizeAllPapers',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairFinalizePapersController@index',
    'permissions_require_all' => true,
]);
Route::get('conferenceChair/finalizeAllPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairFinalizePapersController@show']);
Route::patch('conferenceChair/finalizeAllPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairFinalizePapersController@update']);

Route::get('conferenceChair/paperReport', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPaperReportController@index']);

Route::get('conferenceChair/invitationStatus', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairInvitationStatusController@index']);
Route::get('conferenceChair/invitation/confirm', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairInvitationController@confirm']);
Route::get('conferenceChair/invitationCancel', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairInvitationCancelController@index']);
Route::get('conferenceChair/sendBulkEmail', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairSendBulkEmailController@index']);

//Route::get('conferenceChair/createTopic', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairCreateTopicController@create']);
Route::resource('conferenceChair/createTopic','ConfChair\ConfChairCreateTopicController' );

//Route::get('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController@index');
Route::resource('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController');
//Route::get('conferenceChair/createConference', 'ConfChairCreateConference@store');
Route::get('conferenceChair/createConferenceFee', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairConferenceFeeController@index']);
Route::resource('conferenceChair', 'ConfChair\ConfChairInvitationController');


Route::get('reviewer/discussion', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@index']);
Route::get('reviewer/discussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@show']);
Route::post('reviewer/discussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@store']);

Route::get('reviewer/reviewerRegistration', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerRegistrationController@index']);
Route::get('reviewer/paperReviewRequest', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerPaperReviewRequestController@index']);

Route::get('reviewer/', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerPaperController@index']);
Route::get('reviewer/paper/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerPaperController@show']);
Route::patch('reviewer/paper/{id}', 'Reviewer\ReviewerPaperController@update');
//Route::post('reviewer/paper/{id}', 'Reviewer\ReviewerPaperController@store');


Route::get('reviewer/get/{fullPaperUrl}', ['as' => 'getpaper', 'uses' => 'Reviewer\ReviewerPaperController@get']);
//Route::resource('reviewer', 'Reviewer\ReviewerPaperController');


Route::resource('author', 'Author\SubmitPaperController');

//Route::resource('auth/register', 'Auth\AuthController');



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
