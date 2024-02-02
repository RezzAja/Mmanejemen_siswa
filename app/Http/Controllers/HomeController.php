<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_siswa = Student::count();
        $jumlah_kelas = Classroom::count();
        $jumlah_guru = Teacher::count();
        $jumlah_mapel = Course::count();
        

        return view('pages.admin.dashboard', [
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah_kelas' => $jumlah_kelas,
            'jumlah_guru' => $jumlah_guru,
            'jumlah_mapel' => $jumlah_mapel,
        ]);
    }
}
