<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('pages.admin.students.index', [
            'students' => Student::all(),
            'classrooms' => Classroom::all(),
            'title' => 'Daftar Data Siswa',
        ]);
    }
    
    public function create(){
        return view('pages.admin.students.create', [
            'title' => 'Tambah Data Siswa',
            'classrooms' => Classroom::all(),
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('siswa-photo', 'public');
        Student::create($data);


        return redirect()->route('siswa.index')
            ->with ('success', 'Siswa Berhasil Ditambahkan');
    }

    public function edit($id){
        return view('pages.admin.students.edit', [
            'item' => Student::findOrFail($id),
            'classrooms' => Classroom::all(),
            'title' => 'Ubah Data Siswa',
        ]);
    
    }  
    
    public function update(Request $request, $id){
        $data = $request->all();

        if(!empty($data['photo'])){
            $data['photo'] = $request->file('photo')->store('siswa-photo', 'public');
        }else{
            unset($data['photo']);
        }

        Student::findOrFail($id)->update($data);

        return redirect()->route('siswa.index')
            ->with ('success', 'Siswa Berhasil Diubah');
    }

    public function destroy($id){
        Student::findOrFail($id)->delete();

        return redirect()->back()
            ->with ('success', 'Data Siswa Berhasil Dihapus');
    }
    
}


