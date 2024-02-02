<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
{
    $groupOfCourse = $request->input('group_of_course');

    if ($groupOfCourse) {
        $courses = Course::where('group_of_course', '=', $groupOfCourse)->get();
    } else {
        $courses = Course::all();
    }

    return view('pages.admin.courses.index', [
        'courses' => $courses,
        'datas' => Course::all(),
        'title' => 'Daftar Mapel',
        'kelompok' => 'Semua Kelompok'
    ]);
}

public function filter(Request $request)
{
    $groupOfCourse = $request->input('group_of_course');
    $courses = Course::where('group_of_course', '=', $groupOfCourse)->get();

    return view('pages.admin.courses.index', [
        'courses' => $courses,
        'datas' => Course::all(),
        'title' => 'Daftar Mapel',
        'kelompok' => $request->group_of_course
    ]);
}

    public function store(Request $request){
        $data = $request->all();
        Course::create($data);
        return  redirect()->back()->with('success', 'Mapel Berhasil Ditambahkan');
    }

    public function edit($id){
        return view('pages.admin.courses.edit', [
            'item' => Course::findOrFail($id),
            'title' => 'Ubah Mapel',
        ]);
    
    }  
    
    public function update(Request $request, $id){
        $data = $request->all();
        $data = $request->all();
        Course::findOrFail($id)->update($data);
        return  redirect()->back()->with('success', 'Mapel Berhasil Diedit');
    }

    public function destroy($id){
        Course::findOrFail($id)->delete();

        return redirect()->back()
            ->with ('success', 'Mapel Berhasil Dihapus');
    }
 
}
