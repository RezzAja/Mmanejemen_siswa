<?php
use App\Http\controllers\Admin\TeacherController;
use App\Http\controllers\Admin\MajorController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MajorController as ControllersMajorController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ParentModelController;
use App\Http\Controllers\PaymentSppController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\StudentController;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\ParentModel;
use App\Models\Student;
use  Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes(options:['register' => false]);

Route::get(uri:'/',action: [HomeController::class, 'index'])->name('dashboard');

Route::resource('guru', TeacherController::class); 

Route::resource('jurusan', ControllersMajorController::class);

Route::resource('kelas', ClassroomController::class); 

Route::resource('siswa', StudentController::class);

Route::resource('mapel', CourseController::class);

Route::resource('wali', ParentModelController::class);
Route::resource('spp', SppController::class);
Route::resource('payment', PaymentSppController::class);

// Route::get('/wali/{id_parent}/{id_student}', 'ParentModelController@index')->name('wali.index');

Route::get('/siswa/wali/{id}', [ParentModelController::class, 'index'])->name('wali.index');

Route::get('siswa/wali/{id}/create', [ParentModelController::class, 'create'])->name('wali.create');

Route::get('/siswa/wali/{id_student}/{id_parent}/edit', [ParentModelController::class, 'edit'])->name('wali.edit');

Route::get('mapel/filter/kelompok', [CourseController::class, 'filter'])->name('mapel.filter');

Route::get('/siswa/payment/{id}', [PaymentSppController::class, 'index'])->name('payment.index');

Route::get('siswa/payment/{id}/create', [PaymentSppController::class, 'create'])->name('payment.create');
