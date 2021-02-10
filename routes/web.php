<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('admin.user.login-form');
});

Route::get('/user-registration', [
    'uses' => 'UserRegistrationController@ShowRegistrationForm',
    'as' => 'user-registration',
])->middleware('auth');

Route::post('/user-registration', [
    'uses' => 'UserRegistrationController@userSave',
    'as' => 'user-save',
])->middleware('auth');

Route::get('/user-list', [
    'uses' => 'UserRegistrationController@userList',
    'as' => 'user-list',
])->middleware('auth');

Route::get('/user-profile/{userId}', [
    'uses' => 'UserRegistrationController@userProfile',
    'as' => 'user-profile',
])->middleware('auth');

Route::get('/change-user-info/{id}', [
    'uses' => 'UserRegistrationController@changeUserInfo',
    'as' => 'change-user-info',
])->middleware('auth');

Route::put('/user-info-update/{user_id}', [
    'uses' => 'UserRegistrationController@userInfoUpdate',
    'as' => 'user-info-update',
])->middleware('auth');

Route::get('/change-user-avatar/{id}', [
    'uses' => 'UserRegistrationController@changeUserAvatar',
    'as' => 'change-user-avatar',
])->middleware('auth');

Route::post('/update-user-avatar', [
    'uses' => 'UserRegistrationController@userImageUpdate',
    'as' => 'update-user-avatar',
])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//=================notice controller=====
Route::get('/create-notice', 'NoticeController@create')->name('add-notice');
Route::post('/add-notice', 'NoticeController@add')->name('sore-notice');
Route::get('/view-notice', 'NoticeController@index')->name('notice-index');
Route::get('/delete-notice/{id}', 'NoticeController@delete')->name('delete-notice');

//=============Teacher Controller===============
Route::get('/view-rule', 'TeacherRuleController@index')->name('view-teacher-rule');
Route::get('/create-rule', 'TeacherRuleController@create')->name('add-teacher-rule');
Route::post('/store-data', 'TeacherRuleController@storeTeacherRule')->name('store-Trules');
Route::get('/delete-rules/{id}', 'TeacherRuleController@deleteTeacherRule')->name('delete-Trule');
Route::get('/edit/{id}', 'TeacherRuleController@editTeacherRule')->name('edit-Trule');
Route::post('/update/{id}', 'TeacherRuleController@updateTeacherRule')->name('update-Trule');

//================Student Rule=================

Route::get('/view-Trule', 'StudentruleController@index')->name('view-student-rule');
Route::get('/ceate-rule', 'StudentruleController@create')->name('create-Srule');
Route::post('/store-rule', 'StudentruleController@storeStudentRule')->name('store-Srule');
Route::get('/edit-rule/{id}', 'StudentruleController@editStudentRule')->name('edit-Srule');
Route::get('/delete-rule/{id}', 'StudentruleController@deleteStudentRule')->name('delete-Srule');
Route::post('/update-rule/{id}', 'StudentruleController@updateStudentRule')->name('update-Srule');

//================Batch Controller================
Route::get('/add/batch', [
    'uses' => 'UniversityController@addBatch',
    'as' => 'add-batch',
])->middleware('auth');

Route::post('/save/batch', [
    'uses' => 'UniversityController@storeBatch',
    'as' => 'batch-save',
])->middleware('auth');

Route::get('/list/batch', [
    'uses' => 'UniversityController@listBatch',
    'as' => 'batch-list',
])->middleware('auth');

Route::get('/list/batch/{id}', [
    'uses' => 'UniversityController@deleteBatch',
    'as' => 'batch-delete',
])->middleware('auth');

Route::get('/edit/batch/{id}', [
    'uses' => 'UniversityController@editBatch',
    'as' => 'batch-edit',
])->middleware('auth');

Route::post('/edit/batch/{id}', [
    'uses' => 'UniversityController@updateBatch',
    'as' => 'batch-update',
])->middleware('auth');

//================Section Controller================
Route::get('/add/section', [
    'uses' => 'UniversityController@addSection',
    'as' => 'add-section',
])->middleware('auth');

Route::post('/store/section', [
    'uses' => 'UniversityController@storeSection',
    'as' => 'section-save',
])->middleware('auth');

Route::get('/list/section', [
    'uses' => 'UniversityController@listSection',
    'as' => 'section-list',
])->middleware('auth');

Route::get('/list/section_ajax', [
    'uses' => 'UniversityController@sectionListByAjax',
    'as' => 'section-list-by-ajax',
])->middleware('auth');

Route::get('/section/delete', [
    'uses' => 'UniversityController@sectionDelete',
    'as' => 'section-delete',
])->middleware('auth');

//=============Student Registration===========
Route::get('/student/reg', [
    'uses' => 'StudentRegController@studentReg',
    'as' => 'student-reg-form',
])->middleware('auth');

Route::get('/student/section', [
    'uses' => 'StudentRegController@bringSection',
    'as' => 'bring-section',
])->middleware('auth');
