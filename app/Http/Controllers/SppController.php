<?php

namespace App\Http\Controllers;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        return view('pages.admin.spps.index' ,['items'=>Spp::all()]);
    }
     public function store(Request $request)
     {
            $data = $request->all();
            Spp::create($data);
            return  redirect()->back()->with('success', 'Spp Berhasil Ditambahkan');
    }

     public function update(Request $request, $id)
     {
            $data = $request->all();
            Spp::findOrFail($id)->update($data);
            return  redirect()->back()->with('success', 'Spp Berhasil Diedit');
    }
     public function destroy( $id)
     {
        
            Spp::findOrFail($id)->delete();
            return  redirect()->back()->with('success', 'Spp Berhasil Dihapus');
    }
}
