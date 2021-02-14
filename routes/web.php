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
Route::get('/file/download/{file}', 'NoticeController@downloadFile');
Route::get('show/notice', 'NoticeController@showNotice')->name('show-notice');

//=============Teacher Controller===============
Route::get('/view-rule', 'TeacherRuleController@index')->name('view-teacher-rule');
Route::get('/create-rule', 'TeacherRuleController@create')->name('add-teacher-rule');
Route::post('/store-data', 'TeacherRuleController@storeTeacherRule')->name('store-Trules');
Route::get('/delete-rules/{id}', 'TeacherRuleController@deleteTeacherRule')->name('delete-Trule');
Route::get('/edit/{id}', 'TeacherRuleController@editTeacherRule')->name('edit-Trule');
Route::post('/update/{id}', 'TeacherRuleController@updateTeacherRule')->name('update-Trule');
Route::get('/teacher/rule', 'TeacherRuleController@viewRules')->name('teacher_rule_list');

//================Student Rule=================

Route::get('/view-Trule', 'StudentruleController@index')->name('view-student-rule');
Route::get('/ceate-rule', 'StudentruleController@create')->name('create-Srule');
Route::post('/store-rule', 'StudentruleController@storeStudentRule')->name('store-Srule');
Route::get('/edit-rule/{id}', 'StudentruleController@editStudentRule')->name('edit-Srule');
Route::get('/delete-rule/{id}', 'StudentruleController@deleteStudentRule')->name('delete-Srule');
Route::post('/update-rule/{id}', 'StudentruleController@updateStudentRule')->name('update-Srule');
Route::get('/student/rule', 'StudentruleController@viewRules')->name('student_rule_list');

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

//============Studen applycation===========
Route::get('/student/applyForm', [
    'uses' => 'ApplycationController@applyForm',
    'as' => 'apply-form',
])->middleware('auth');

Route::post('/student/apply', [
    'uses' => 'ApplycationController@applyStore',
    'as' => 'store-apply',
])->middleware('auth');

Route::get('/student/applylist', [
    'uses' => 'ApplycationController@applyList',
    'as' => 'apply-list',
])->middleware('auth');

Route::get('/teacher/applylist', [
    'uses' => 'ApplycationController@apply_show_by_teacher',
    'as' => 'apply-list-teacher',
])->middleware('auth');

Route::get('/teacher/view/{id}', [
    'uses' => 'ApplycationController@apply_view_by_teacher',
    'as' => 'view_apply_teacher',
])->middleware('auth');

Route::get('/teacher/accept/{id}', [
    'uses' => 'ApplycationController@applyAcceptByTeacher',
    'as' => 'accept-teacher',
])->middleware('auth');

Route::get('/teacher/reject/{id}', [
    'uses' => 'ApplycationController@applyRejectByTeacher',
    'as' => 'reject-by-teacher',
])->middleware('auth');

//========admin part=========

Route::get('/admin/applylist', [
    'uses' => 'ApplycationController@apply_show_by_admin',
    'as' => 'apply-list-admin',
])->middleware('auth');

Route::get('/ammin/accept/{id}', [
    'uses' => 'ApplycationController@applyAcceptByAdmin',
    'as' => 'accept-by-admin',
])->middleware('auth');

Route::get('/ammin/reject/{id}', [
    'uses' => 'ApplycationController@applyRejectByAdmin',
    'as' => 'reject-by-admin',
])->middleware('auth');

Route::get('/testing', function(){
  return auth()->user()->applications->latest()->get();
});


//===========book============
Route::get('/teachr/addbook', [
    'uses' => 'BookController@addBook',
    'as' => 'add-book',
])->middleware('auth');

Route::get('/teachr/listbook', [
    'uses' => 'BookController@listBook',
    'as' => 'list-book',
])->middleware('auth');

Route::post('/teacher/kistbook', [
    'uses' => 'BookController@storBook',
    'as' => 'store-book',
])->middleware('auth');

Route::get('/teachr/deletebook/{id}', [
    'uses' => 'BookController@deleteBook',
    'as' => 'delete-book',
])->middleware('auth');

Route::get('/student/booklist', [
    'uses' => 'BookController@studentBookList',
    'as' => 'student_book_list',
])->middleware('auth');

Route::get('/file/download/{file}', 'BookController@downloadFile');


//=======notice for Student======

Route::get('/teachr/addNotice', [
    'uses' => 'TNoticeController@addNotice',
    'as' => 'add-notice',
])->middleware('auth');

Route::get('/teachr/viewnotice', [
    'uses' => 'TNoticeController@listNotice',
    'as' => 'view-tnotice',
])->middleware('auth');

Route::post('/teacher/storeNotice', [
    'uses' => 'TNoticeController@storeNotice',
    'as' => 'store-tnotice',
])->middleware('auth');

Route::get('/teachr/deletenotice/{id}', [
    'uses' => 'TNoticeController@deleteNotice',
    'as' => 'delete-notice',
])->middleware('auth');


Route::get('/student/show/', [
    'uses' => 'TNoticeController@showStudent',
    'as' => 'show_by_student',
])->middleware('auth');

Route::get('/file/download/{file}', 'TNoticeController@downloadFile');

//=============Assingment---------

Route::get('/student/addassingment', [
    'uses' => 'AssingmentController@addAssingment',
    'as' => 'add-assingment',
])->middleware('auth');

Route::post('/student/storeassingment', [
    'uses' => 'AssingmentController@storeAssingment',
    'as' => 'store-assingment',
])->middleware('auth');

Route::get('/student/listassingment', [
    'uses' => 'AssingmentController@listAssingment',
    'as' => 'assingment-list',
])->middleware('auth');

Route::get('/student/deleteassingment/{id}', [
    'uses' => 'AssingmentController@deleteAssingment',
    'as' => 'delete-assingment',
])->middleware('auth');

Route::get('/teacher/listassingment', [
    'uses' => 'AssingmentController@teacherReview',
    'as' => 'teacher-review',
])->middleware('auth');

Route::get('/file/download/{file}', 'AssingmentController@downloadFile');

Route::get('/teacher/acceptassigment/{id}', [
    'uses' => 'AssingmentController@applyAccept',
    'as' => 'accept',
])->middleware('auth');

Route::get('/teacher/rejectassingment/{id}', [
    'uses' => 'AssingmentController@applyReject',
    'as' => 'reject',
])->middleware('auth');
