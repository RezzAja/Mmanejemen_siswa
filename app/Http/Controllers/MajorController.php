<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return view('pages.admin.majors.index' ,['items'=>Major::all()]);
    }
     public function store(Request $request)
     {
            $data = $request->all();
            Major::create($data);
            return  redirect()->back()->with('success', 'Jurusan Berhasil Ditambahkan');
    }

     public function update(Request $request, $id)
     {
            $data = $request->all();
            Major::findOrFail($id)->update($data);
            return  redirect()->back()->with('success', 'Jurusan Berhasil Diedit');
    }
     public function destroy( $id)
     {
        
            Major::findOrFail($id)->delete();
            return  redirect()->back()->with('success', 'Jurusan Berhasil Dihapus');
    }
}
