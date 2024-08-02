<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laundry;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;



class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page'] = "Paket";
        $data['sub'] = "";
        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('laundries.nama','pakets.*')
        ->get();
        return view('paket',$data);
        }
        else{
            $data['paket'] = DB::table('pakets')
            ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
            ->select('laundries.nama','pakets.*')
            ->where('laundries.id_user',$id_user)
            ->get();
            return view('paket',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['page'] = "Paket";
        $data['sub'] = "";
        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['laundry'] = Laundry::all();
        return view('add_paket',$data);
        }
        else{
        $data['laundry'] = Laundry::where('id_user', $id_user)->get();
        return view('add_paket',$data);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'id_toko' => 'required',
                'nama_paket' => 'required',
                'harga' => 'required',
                'foto' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'nama_paket.required' => 'Nama Paket Wajib Diisi',
                'harga.required' => 'Harga Wajib Diisi',
                'foto.required' => 'Foto Paket Laundry Wajib Diisi',
            ]
        );

        $validated['foto'] = $request->file('foto')->store('foto_paket');
        Paket::create($validated);
        return redirect('/paket')->withSuccess(['Berhasil Menambahkan Paket Laundry!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['page'] = "Paket";  
        $data['sub'] = "";
        $role=Auth::user()->role;
        $id_user=Auth::user()->id;
        $data['id'] = $id;

        if ($role=='0') {
        $data['laundry'] = Laundry::all();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('pakets.*','laundries.nama')
        ->where('pakets.id',$id)
        ->get();
        return view('edit_paket',$data);
        }
        else{
        $data['laundry'] = Laundry::where('id_user', $id_user)->get();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('pakets.*','laundries.nama')
        ->where('pakets.id',$id)
        ->get();
        return view('edit_paket',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'id_toko' => 'required',
                'nama_paket' => 'required',
                'harga' => 'required',
            ],
            [
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'nama_paket.required' => 'Nama Paket Wajib Diisi',
                'harga.required' => 'Harga Wajib Diisi',
            ]
        );

        $validated['foto'] = $request->file('foto');
        if ($validated['foto']===null) {
            $validated['foto']=$request->input('foto_lama');
        }else{
            $validated['foto'] = $request->file('foto')->store('foto_paket');
        }

        $data = Paket::find($id);
        $data->update($validated);
        return redirect('/paket')->withSuccess(['Berhasil Update Paket Laundry!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Paket::find($id);
        $data->delete();
        return redirect('/paket')->withSuccess(['Berhasil Hapus Paket!']);
    }
}
