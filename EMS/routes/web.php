<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Employee_editController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\AttachFilesController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\JobDescriptionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\RamadanController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\Late_early_reqController;
use App\Http\Controllers\leaveRequestController;
use App\Http\Controllers\pendingLeaveController;
use App\Http\Controllers\Missing_attendanceController;
use App\Http\Controllers\AdministratorPrivilegeController;
use App\Http\Controllers\EmpTodayController;
use App\Http\Controllers\PermissionPrivilegeController;
use App\Http\Controllers\OfficeTimeController;
use App\Http\Controllers\OfficeScheduleController;
use App\Http\Controllers\RosterSetController;
use App\Http\Controllers\RosterPendingController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('auth.login');
// });



Route::get('/leave-list', [LeavesController::class, 'leaves'])->name('leaves');
Route::get('/leave-at-a-glance', [LeavesController::class, 'index'])->name('leaves.glance');

Route::get('/changePass', function () {
    return view('changePass');
});



Route::get('/pending-req', function () {
    return view('late-early-pending-req');
}); 



Route::get('/evaluation', function () {
    return view('evaluation');
});



Route::get('/profile-update-req', function () {
    return view('profile-update-request');
});


Route::get('/detail-attach', function () {
    return view('attach-detail');
});



Route::get('/emp-today', function () {
    return view('emp-today');
});




// job -desc
Route::resource('job',JobDescriptionController::class);
Route::get('edit-jobdesc/{id}', [JobDescriptionController::class,'edit']);
// Route::post('/create-jobdesc', [JobDescriptionController::class,'store'])->name('job.store');
Route::post('job-update/', [JobDescriptionController::class,'update']);
// Route::put('/update-jobdesc', [JobDescriptionController::class,'update'])->name('job.update');

// leave-list
Route::get('/leave-list',[LeavesController::class,'showLeave'])->name('leave.show');
Route::post('/leave-list',[LeavesController::class,'employeeLeave'])->name('emp.leave');
// Route::post('/search',[LeavesController::class,'searchStaff'])->name('search.staff');
// Route::get('jobdescription/{id}', [JobDescriptionController::class,'edit_view'])->name('job.editview');
Route::get('/leave-list',[LeavesController::class,'showEmployee_leaveList'])->name('emp.list');
// leave-at-a-glance
Route::get('/leave-at-a-glance',[LeavesController::class,'show_leave_glance']);

// yearly-leave

Route::get('/yearly-leave', [LeavesController::class, 'yearlyLeave']);
Route::get('/yearly-leave',[LeavesController::class, 'showYearlyLeave']);
Route::get('/yearly-leave',[LeavesController::class, 'showEmployee'])->name('emp.show');

// late early pending req
Route::get('/pending-req', [Late_early_reqController::class, 'index']);

// today's leave

Route::get('search-today-leave',[LeavesController::class,'searchLeave'])->name('searchLeave');

// pending leave request 

Route::get('pending-leave',[pendingLeaveController::class,'index']);
Route::get('/view-leave/{eid?}/{id?}/{date?}',[pendingLeaveController::class,'show'])->name('viewLeave');
Route::get('/edit-leave/{eid?}/{id?}/{date?}',[pendingLeaveController::class,'edit_leave']);
Route::post('update-leave/{id?}','App\Http\Controllers\pendingLeaveController@update_req')->name('update_req');
Route::get('delete-leave/{id?}','App\Http\Controllers\pendingLeaveController@deleteLeave')->name('deleteLeave');
Route::post('cancel-req/{id?}','App\Http\Controllers\pendingLeaveController@cancel_req')->name('cancel_req');
// Route::post('approve-leave/{id?}',[pendingLeaveController::class,'update'])->name('approve.update');
Route::post('approve-leave/{id?}','App\Http\Controllers\pendingLeaveController@update')->name('approve.update');
Route::post('verify-leave/{id?}','App\Http\Controllers\pendingLeaveController@Leave_Verify')->name('Leave_Verify.update'); 



// show leave to leave-list

Route::get('/view-leave-list/{id?}/{date?}',[pendingLeaveController::class,'showLeaves']);
// late-early-req
Route::get('late-early-req',[Late_early_reqController::class,'late_early_req']); 
Route::post('late-early-req-send',[Late_early_reqController::class,'create']);



// leave-req

Route::get('leave-req',[leaveRequestController::class,'index']);
Route::post('send-leave-req',[leaveRequestController::class,'create']);


// Route::get('/leave-req',[leaveRequestController::class,'component']);

// missing-attendance-req
Route::get('missing-attendance-req',[Missing_attendanceController::class,'index']);

// upload-attendance
Route::get('upload-attendance',[Missing_attendanceController::class,'upload_Attendance'])->name('upload');
Route::post('upload-attendance',[Missing_attendanceController::class,'store'])->name('upload.store');
Route::get('reports',[Missing_attendanceController::class,'report']);
Route::post('reports',[Missing_attendanceController::class,'search_report'])->name('search_report');
Route::post('report',[Missing_attendanceController::class,'attendance_file'])->name('attendance_file.report');
Route::post('training-report','App\Http\Controllers\Missing_attendanceController@training_attendance')->name('training_attendance');
// approve missing attendance
Route::get('approve-att-req/{id}',[Missing_attendanceController::class,'approve_att_req']);
Route::get('verify-att-req/{id}',[Missing_attendanceController::class,'verify_att_req']);

// employee-today
Route::get('emp-today',[EmpTodayController::class,'index']);

// Auth::routes();
Auth::routes([
    // 'register' => false, // Registration Routes...
    // 'reset' => false, // Password Reset Routes...
    // 'verify' => false, // Email Verification Routes...
]);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::resource('employees', EmployeeController::class);
    Route::post('add-facility', [EmployeeController::class,'createFacility']);
    Route::get('edit-facility/{id}', [EmployeeController::class,'editFacility']);
    Route::put('update-facility', [EmployeeController::class,'updateFacility']);
    Route::delete('facility-delete/{id}', [EmployeeController::class,'deleteFacility']);
    Route::delete('delete-status/{id}', [EmployeeController::class,'deleteStatus']);
    Route::post('add-status', [EmployeeController::class,'createStatus']);
    Route::post('add-grade', [EmployeeController::class,'createGrade']);
    Route::put('update-grade/{id}', [EmployeeController::class,'updateGrade']);
    Route::put('archive-employee/{id}', [EmployeeController::class,'employeeArchive']);
    Route::post('edit-employee-info', [EmployeeController::class,'editEmployeeInfo']);
    Route::resource('notice', NoticeController::class);
    Route::resource('attachment', AttachFilesController::class);
    Route::resource('policy', PolicyController::class);
    // Route::get('download/{file}', [PolicyController::class,'downloadPolicy']);
    Route::resource('holiday', HolidayController::class);
    Route::post('holiday-search', [HolidayController::class, 'searchHoliday']);
    Route::get('edit-holiday/{id}', [HolidayController::class,'edit']);
    Route::put('update-holiday', [HolidayController::class,'update']);
    Route::resource('incident', IncidentController::class);
    Route::get('edit-incident/{id}', [IncidentController::class,'edit']);
    Route::put('update-incident', [IncidentController::class,'update']);
    Route::resource('archive', ArchiveController::class);
    Route::resource('department', DepartmentController::class);
    Route::get('edit-department/{id}', [DepartmentController::class,'edit']);
    Route::put('update-department', [DepartmentController::class,'update']);
    Route::resource('designation', DesignationController::class);
    Route::get('edit-designation/{id}', [DesignationController::class,'edit']);
    Route::put('update-designation', [DesignationController::class,'update']);
    Route::resource('facility', FacilityController::class);
    Route::get('edit-facility/{id}', [FacilityController::class,'edit']);
    Route::put('update-facility', [FacilityController::class,'update']);
    Route::resource('note', NoteController::class);
    Route::get('edit-note/{id}', [NoteController::class,'edit']);
    Route::put('update-note', [NoteController::class,'update']);
    Route::resource('ramadan', RamadanController::class);
    Route::resource('jobdescription', JobDescriptionController::class);
    Route::resource('evaluation', EvaluationController::class);
    Route::resource('adminpriv', AdministratorPrivilegeController::class);
    Route::post('admin-privileger', [AdministratorPrivilegeController::class, 'adminPrivilege']);
    Route::post('roster-privileger', [AdministratorPrivilegeController::class, 'rosterPrivilege']);
    Route::post('management-privileger', [AdministratorPrivilegeController::class, 'managementPrivilege']);
    Route::delete('admin-delete/{id}', [AdministratorPrivilegeController::class, 'deleteAdmin']);
    Route::delete('roster-delete/{id}', [AdministratorPrivilegeController::class, 'deleteRoster']);
    Route::delete('management-delete/{id}', [AdministratorPrivilegeController::class, 'deleteManagement']);
    Route::resource('permission-priv', PermissionPrivilegeController::class);
    Route::resource('office-time', OfficeTimeController::class);
    Route::put('schecule-update/{id}', [OfficeTimeController::class,'updateRoster']);
    Route::put('roster-update/{id}', [OfficeTimeController::class,'updateRoster']);
    // Route::resource('office-schedule', OfficeScheduleController::class);
    Route::get('office-schedule', [OfficeScheduleController::class, 'searchSchedule']);
    Route::post('office-schedule', [OfficeScheduleController::class, 'searchSchedule']);
    // Route::resource('set-roster', RosterSetController::class);
    Route::get('set-roster', [RosterSetController::class, 'setRoster']);
    Route::post('set-roster', [RosterSetController::class, 'setRoster']);
    Route::post('roster-set-same-time', [RosterSetController::class, 'setRosterSameTime']);
    Route::post('set-roster-more-weekend', [RosterSetController::class, 'setRosterMoreWeekend']);
    Route::post('roster-set-custom-time', [RosterSetController::class, 'setRosterCustomTime']);
    Route::resource('roster/holiday-request', RosterPendingController::class);
    // Route::resource('approve-roster-holidays', RosterPendingController::class);


});
