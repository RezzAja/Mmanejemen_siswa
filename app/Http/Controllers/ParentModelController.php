<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\Student;
use Illuminate\Http\Request;

class ParentModelController extends Controller
{
    public function index($id)
    {
        return view('pages.admin.parents.index', [
            'item' => Student::findOrFail($id),
            'parents'=> ParentModel::where('id_student', $id)->get(),
            'title' => 'Daftar Data Wali murid',
        ]);
    }
  
    public function create($id)
    {
        $item = Student::findOrFail($id);
        return view('pages.admin.parents.create', [
            'title' => 'Tambah Data Wali Murid',
            'item' => $item,
        ]);
    }

    public function store(Request $request){
        // $data = $request->validate([
        //     'id_student' => 'required|integer',
        // ]);
        $data = $request->all();
        ParentModel::create($data);
        return redirect()->route('wali.index', $request->id_student)
            ->with ('success', 'Wali murid Berhasil Ditambahkan');
        
    }
    public function edit($id, $id_parent)
    {
        return view('pages.admin.parents.edit', [
            'item' => ParentModel::findOrFail($id_parent),
            'student' =>Student::findOrFail($id),
            'title' => 'Ubah Data Wali murid',
        ]);
    }
    
    public function update(Request $request, $id){
        $data = $request->all();

       
        ParentModel::findOrFail($id)->update($data);
    

        return redirect()->route('siswa.index')
            ->with ('success', 'Siswa Berhasil Diubah');
    }

    public function destroy($id){
        ParentModel::findOrFail($id)->delete();

        return redirect()->back()
            ->with ('success', 'Data Wali Murid Berhasil Dihapus');
    }
}
