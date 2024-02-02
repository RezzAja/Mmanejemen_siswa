<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('pages.admin.teachers.index', [
            'teachers' => Teacher::all(),
            'title' => 'Daftar Guru',
        ]);
    }
    public function show( $id)
    {
        
    }
    public function create(){
        return view('pages.admin.teachers.create', [
            'title' => 'Tambah Guru',
        ]);
    }

    public function store(Request $request){
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('guru-photo', 'public');
        Teacher::create($data);

        return redirect()->route('guru.index')
            ->with ('success', 'Guru Berhasil Ditambahkan');
    }

    public function edit($id){
        return view('pages.admin.teachers.edit', [
            'item' => Teacher::findOrFail($id),
            'title' => 'Ubah Guru',
        ]);
    
    }  
    
    public function update(Request $request, $id){
        $data = $request->all();

        if(!empty($data['photo'])){
            $data['photo'] = $request->file('photo')->store('guru-photo', 'public');
        }else{
            unset($data['photo']);
        }

        Teacher::findOrFail($id)->update($data);

        return redirect()->route('guru.index')
            ->with ('success', 'Guru Berhasil Diubah');
    }

    public function destroy($id){
        Teacher::findOrFail($id)->delete();

        return redirect()->back()
            ->with ('success', 'Guru Berhasil Dihapus');
    }
    
}