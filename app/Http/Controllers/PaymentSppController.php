<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use App\Models\PaymentSpp;
use App\Models\Student;
use App\Models\Spp;
use Illuminate\Http\Request;

class PaymentSppController extends Controller
{
    public function index($id)
    {
        return view('pages.admin.payments.index', [
            'item' => Student::findOrFail($id),
            'parents' => ParentModel::where('id_student', $id)->get(),
            'title' => 'Daftar Data Transaski',
        ]);
    }
  
    public function create($id)
    {
        $item = Student::findOrFail($id);
        return view('pages.admin.payments.create', [
            'payment' => Spp::all(),
            'parents' => ParentModel::where('id_student', $id)->get(),
            'title' => 'Tambah Data Spp Murid',
            'item' => $item,
        ]);
    }

    public function store(Request $request){
        // $data = $request->validate([
        //     'id_student' => 'required|integer',
        // ]);
        $data = $request->all();
        PaymentSpp::create($data);
        return redirect()->route('payment.index', $request->student_id)
            ->with ('success', 'Transaksi berhasil ditambahkan');
        
    }
//     public function edit($id, $id_parent)
//     {
//         return view('pages.admin.payments.edit', [
//             'item' => PaymentSpp::findOrFail($id_parent),
//             'student' =>Student::all($id),
//             'title' => 'Ubah Data Wali murid',
//         ]);
//     }
    
//     public function update(Request $request, $id){
//         $data = $request->all();

       
//         PaymentSpp::findOrFail($id)->update($data);
    

//         return redirect()->route('siswa.index')
//             ->with ('success', 'Siswa Berhasil Diubah');
//     }

    public function destroy($id){
        PaymentSpp::findOrFail($id)->delete();

        return redirect()->back()
            ->with ('success', 'Data Transaksi Berhasil Dihapus');
}

}