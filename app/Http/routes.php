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

#Conference Chair Discussion
//Route::get('conferenceChair/confDiscussion', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@index']);
Route::get('conferenceChair/confDiscussion',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'Reviewer\ReviewerDiscussionController@index',
    'permissions_require_all' => true,
]);
//Route::get('conferenceChair/confDiscussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@show']);
Route::get('conferenceChair/confDiscussion/{id}',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'Reviewer\ReviewerDiscussionController@show',
    'permissions_require_all' => true,
]);
Route::post('conferenceChair/confDiscussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@store']);

#Conference Chair Assign Papers
//Route::get('conferenceChair/allPapers', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPapersController@index']);
Route::get('conferenceChair/allPapers',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairPapersController@index',
    'permissions_require_all' => true,
]);
//Route::get('conferenceChair/allPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPapersController@show']);
Route::get('conferenceChair/allPapers/{id}',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairPapersController@show',
    'permissions_require_all' => true,
]);
Route::post('conferenceChair/allPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPapersController@store']);

//Route::get('conferenceChair/finalizeAllPapers', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairFinalizePapersController@index']);

#Conference Chair View all User Profile
//Route::resource('conferenceChair/usersProfile', 'ConfChair\ConfChairUserProfileController');
Route::group(['middleware' => ['auth', 'permissions.required'],
    'permissions' => ['conference_chair'],
    'permissions_require_all' => true,
], function ()
{
    Route::resource('conferenceChair/usersProfile', 'ConfChair\ConfChairUserProfileController');
});

#Conference Chair Finalize the papers
Route::get('conferenceChair/finalizeAllPapers',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairFinalizePapersController@index',
    'permissions_require_all' => true,
]);
//Route::get('conferenceChair/finalizeAllPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairFinalizePapersController@show']);
Route::get('conferenceChair/finalizeAllPapers/{id}',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairFinalizePapersController@show',
    'permissions_require_all' => true,
]);
Route::patch('conferenceChair/finalizeAllPapers/{id}', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairFinalizePapersController@update']);

#Conference Chair create Topic
//Route::resource('conferenceChair/createTopic','ConfChair\ConfChairCreateTopicController' );
Route::group(['middleware' => ['auth', 'permissions.required'],
    'permissions' => ['conference_chair'],
    'permissions_require_all' => true,
], function ()
{
    Route::resource('conferenceChair/createTopic', 'ConfChair\ConfChairCreateTopicController');
});


#Conference Chair View Paper Report
//Route::get('conferenceChair/paperReport', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairPaperReportController@index']);
Route::get('conferenceChair/paperReport',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairPaperReportController@index',
    'permissions_require_all' => true,
]);

#Conference Chair create a conference
//Route::resource('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController');
Route::group(['middleware' => ['auth', 'permissions.required'],
    'permissions' => ['conference_chair'],
    'permissions_require_all' => true,
], function ()
{
    Route::resource('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController');
});


#Conference Chair view Invitation
//Route::get('conferenceChair/invitationStatus', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairInvitationStatusController@index']);
Route::get('conferenceChair/invitationStatus',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairInvitationStatusController@index',
    'permissions_require_all' => true,
]);

#Conference Chair Send Invitation

//Route::get('conferenceChair/invitation/confirm', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairInvitationController@confirm']);
Route::get('conferenceChair/invitation/confirm',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairInvitationController@confirm',
    'permissions_require_all' => true,
]);
//Route::get('conferenceChair/invitationCancel', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairInvitationCancelController@index']);
Route::get('conferenceChair/invitationCancel',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairInvitationCancelController@index',
    'permissions_require_all' => true,
]);

//Route::resource('conferenceChair', 'ConfChair\ConfChairInvitationController');
Route::group(['middleware' => ['auth', 'permissions.required'],
    'permissions' => ['conference_chair'],
    'permissions_require_all' => true,
], function ()
{
    Route::resource('conferenceChair', 'ConfChair\ConfChairInvitationController');
});

#Conference Chair send Bulk email
//Route::get('conferenceChair/sendBulkEmail', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairSendBulkEmailController@index']);
Route::get('conferenceChair/sendBulkEmail',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairSendBulkEmailController@index',
    'permissions_require_all' => true,
]);

//Route::get('conferenceChair/createTopic', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairCreateTopicController@create']);


//Route::get('conferenceChair/createConference', 'ConfChair\ConfChairCreateConferenceController@index');
//Route::get('conferenceChair/createConference', 'ConfChairCreateConference@store');



#Conference Chair create conference fee
//Route::get('conferenceChair/createConferenceFee', ['middleware' => 'auth', 'uses' => 'ConfChair\ConfChairConferenceFeeController@index']);
Route::get('conferenceChair/createConferenceFee',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['conference_chair'],
    'uses' => 'ConfChair\ConfChairConferenceFeeController@index',
    'permissions_require_all' => true,
]);

#Reviewer Discussion
Route::get('reviewer/discussion', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@index']);
Route::get('reviewer/discussion',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['reviewer'],
    'uses' => 'Reviewer\ReviewerDiscussionController@index',
    'permissions_require_all' => true,
]);
//Route::get('reviewer/discussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@show']);
Route::get('reviewer/discussion/{id}',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['reviewer'],
    'uses' => 'Reviewer\ReviewerDiscussionController@show',
    'permissions_require_all' => true,
]);
Route::post('reviewer/discussion/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerDiscussionController@store']);

#Reviewer Registration
Route::get('reviewer/reviewerRegistration', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerRegistrationController@index']);

#Reviewer request to review paper
//Route::get('reviewer/paperReviewRequest', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerPaperReviewRequestController@index']);
Route::get('reviewer/paperReviewRequest',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['reviewer'],
    'uses' => 'Reviewer\ReviewerPaperReviewRequestController@index',
    'permissions_require_all' => true,
]);

#Reviewer review the paper
//Route::get('reviewer/', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerPaperController@index']);
Route::get('reviewer/',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['reviewer'],
    'uses' => 'Reviewer\ReviewerPaperController@index',
    'permissions_require_all' => true,
]);
//Route::get('reviewer/paper/{id}', ['middleware' => 'auth', 'uses' => 'Reviewer\ReviewerPaperController@show']);
Route::get('reviewer/paper/{id}',[
    'middleware' =>['auth', 'permissions.required'] ,
    'permissions' => ['reviewer'],
    'uses' => 'Reviewer\ReviewerPaperController@show',
    'permissions_require_all' => true,
]);
Route::patch('reviewer/paper/{id}', 'Reviewer\ReviewerPaperController@update');
//Route::post('reviewer/paper/{id}', 'Reviewer\ReviewerPaperController@store');

#Reviewer Download the paper for review
Route::get('reviewer/get/{fullPaperUrl}', ['as' => 'getpaper', 'uses' => 'Reviewer\ReviewerPaperController@get']);
//Route::resource('reviewer', 'Reviewer\ReviewerPaperController');

#Reviewer view and edit profile
//Route::get('profile', 'Author\AuthorProfileController@index');
//Route::get('profile/show', 'Author\AuthorProfileController@show');
//Route::get('profile/edit', 'Author\AuthorProfileController@edit');
Route::patch('profile/{email}', 'Author\AuthorProfileController@update');

//Route::resource('profile','Author\AuthorProfileController');
Route::group(['middleware' => ['auth'],],
    function ()
    {
        Route::resource('profile', 'Author\AuthorProfileController');
    });

#Author Submit Paper
//Route::resource('author', 'Author\SubmitPaperController');
Route::group(['middleware' => ['auth', 'permissions.required'],
    'permissions' => ['author'],
    'permissions_require_all' => true,
], function ()
{
    Route::resource('author', 'Author\SubmitPaperController');
});

//Route::resource('auth/register', 'Auth\AuthController');



Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
