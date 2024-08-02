<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page'] = "Laundry";
        $data['sub'] = "";
        
        // $data['user'] = User::all();

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
            $data['laundry'] = DB::table('laundries')
            ->join('users', 'laundries.id_user', '=', 'users.id')
            ->select('users.email as email_admin','laundries.*')
            ->get();       
            return view('laundry',$data); 
        }else{
            $data['laundry'] = DB::table('laundries')
            ->join('users', 'laundries.id_user', '=', 'users.id')
            ->select('users.email as email_admin','laundries.*')
            ->where('laundries.id_user',$id_user)
            ->get();       
            return view('laundry',$data); 
        }

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['page'] = "Laundry";
        $data['sub'] = "";
        $data['user'] = User::all();
        $data['laundry'] = DB::table('laundries')
        ->join('users', 'laundries.id_user', '=', 'users.id')
        ->select('users.email as email_admin','laundries.*')
        ->get();
        return view('add_laundry',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'foto' => 'required|mimes:jpg,jpeg,png',
                'id_user' => 'required',
                'status_pengajuan' => 'required',
                'hidden' => 'required',
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'desa.required' => 'Desa Wajib Diisi',
                'kecamatan.required' => 'Kecamatan Wajib Diisi',
                'kabupaten.required' => 'Kabupaten Wajib Diisi',
                'provinsi.required' => 'Provinsi Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'foto.required' => 'Foto Laundry Wajib Diisi',
                'id_user.required' => 'Admin Wajib Diisi',
                'status_pengajuan.required' => 'Status Laundry Wajib Diisi',
                'hidden.required' => 'Hidden Status Wajib Diisi',               
            ]
        );

        $validated['foto'] = $request->file('foto')->store('foto_laundry');
        Laundry::create($validated);
        return redirect('/laundry')->withSuccess(['Berhasil Menambahkan Data!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page'] = "Laundry";
        $data['sub'] = "";        
        $data['id'] = $id;
        $data['user'] = User::all();
        $data['laundry'] = DB::table('laundries')
        ->join('users', 'laundries.id_user', '=', 'users.id')
        ->select('users.email as email_admin','laundries.*')
        ->where('laundries.id',$id)
        ->get();
        return view('edit_laundry',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'alamat' => 'required',
                'foto' => 'mimes:jpg,jpeg,png',
                'id_user' => 'required',
                'status_pengajuan' => 'required',
                'hidden' => 'required',
            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'desa.required' => 'Desa Wajib Diisi',
                'kecamatan.required' => 'Kecamatan Wajib Diisi',
                'kabupaten.required' => 'Kabupaten Wajib Diisi',
                'provinsi.required' => 'Provinsi Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'id_user.required' => 'Admin Wajib Diisi',
                'status_pengajuan.required' => 'Status Laundry Wajib Diisi',
                'hidden.required' => 'Hidden Status Wajib Diisi',               
            ]
        );
        $validated['foto'] = $request->file('foto');
        if ($validated['foto']===null) {
            $validated['foto']=$request->input('foto_lama');
        }else{
            $validated['foto'] = $request->file('foto')->store('foto_laundry');
        }

        $data = Laundry::find($id);
        $data->update($validated);
        return redirect('/laundry')->withSuccess(['Berhasil Update Data!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Laundry::find($id);
        $data->delete();
        return redirect('/laundry')->withSuccess(['Berhasil Hapus Data!']);
    }
}
