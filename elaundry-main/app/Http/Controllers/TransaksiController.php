<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Laundry;
use App\Models\User;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;





class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page'] = "Transaksi";
        $data['sub'] = "Transaksi Baru";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['transaksi'] = DB::table('transaksis')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
        ->select('laundries.nama as nama_laundry','users.nama as nama_user','pakets.nama_paket','transaksis.*')
        ->where('transaksis.status','Antrian')
        ->get();
        return view('transaksi',$data);
        }
        else{
            $data['transaksi'] = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
            ->select('laundries.nama as nama_laundry','users.nama as nama_user','pakets.nama_paket','transaksis.*')
            ->where('laundries.id_user',$id_user)
            ->where('transaksis.status','Antrian')
            ->get();
            return view('transaksi',$data);
        }
    }

    public function proses()
    {
        $data['page'] = "Transaksi";
        $data['sub'] = "Transaksi Proses";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['transaksi'] = DB::table('transaksis')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
        ->select('laundries.nama as nama_laundry','users.nama as nama_user','pakets.nama_paket','transaksis.*')
        ->whereNot('transaksis.status','Antrian')
        ->whereNot('transaksis.status','Selesai')
        ->get();
        return view('transaksi_proses',$data);
        }
        else{
            $data['transaksi'] = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
            ->select('laundries.nama as nama_laundry','users.nama as nama_user','pakets.nama_paket','transaksis.*')
            ->whereNot('transaksis.status','Antrian')
            ->whereNot('transaksis.status','Selesai')
            ->where('laundries.id_user',$id_user)
            ->get();
            return view('transaksi_proses',$data);
        }
    }

    public function selesai()
    {
        $data['page'] = "Transaksi";
        $data['sub'] = "Transaksi Selesai";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['transaksi'] = DB::table('transaksis')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
        ->select('laundries.nama as nama_laundry','users.nama as nama_user','pakets.nama_paket','transaksis.*')
        ->where('transaksis.status','Selesai')
        ->get();
        return view('transaksi_selesai',$data);
        }else{
            $data['transaksi'] = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
            ->select('laundries.nama as nama_laundry','users.nama as nama_user','pakets.nama_paket','transaksis.*')
            ->where('transaksis.status','Selesai')
            ->where('laundries.id_user',$id_user)
            ->get();
            return view('transaksi_selesai',$data);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page'] = "Transaksi";
        $data['sub'] = "Transaksi Baru";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['user'] = User::all();
        $data['laundry'] = Laundry::all();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('laundries.nama as nama_laundry','pakets.*')
        ->get();
        return view('add_transaksi',$data);
        }else{
        $data['user'] = User::where('role', '>', 0)->get();
        $data['laundry'] = Laundry::where('id_user', $id_user)->get();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('laundries.nama as nama_laundry','pakets.*')
        ->where('laundries.id_user',$id_user)
        ->get();
        return view('add_transaksi',$data);
        }




    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'id_user' => 'required',
                'id_toko' => 'required',
                'id_paket' => 'required',
                'berat' => 'required',
                'total' => 'required',
                'payment' => 'required',
                'status' => 'required'
            ],
            [
                'id_user.required' => 'Nama Pelanggan Wajib Diisi',
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'id_paket.required' => 'Paket Wajib Diisi',
                'berat.required' => 'Berat Cucian Wajib Diisi',
                'total.required' => 'Total Biaya Wajib Diisi',
                'payment.required' => 'Metode Pembayaran Wajib Diisi',
                'status.required' => 'Status Wajib Diisi'          
            ]
        );

        Transaksi::create($validated);
        return redirect('/transaksi_baru')->withSuccess(['Berhasil Menambahkan Transaksi!']);
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
        $data['page'] = "Transaksi";
        $data['sub'] = "Transaksi Baru";        
        $data['id'] = $id;

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['user'] = User::all();
        $data['laundry'] = Laundry::all();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('laundries.nama as nama_laundry','pakets.*')
        ->get();

        $data['transaksi'] = DB::table('transaksis')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
        ->select('laundries.nama as nama_laundry','users.nama as nama_user','users.email','pakets.nama_paket','transaksis.*')
        ->where('transaksis.id',$id)
        ->get();
        return view('edit_transaksi',$data);
        }
        else{
        $data['user'] = User::where('role', '>', 0)->get();
        $data['laundry'] = Laundry::where('id_user', $id_user)->get();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('laundries.nama as nama_laundry','pakets.*')
        ->where('laundries.id_user',$id_user)
        ->get();

        $data['transaksi'] = DB::table('transaksis')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
        ->select('laundries.nama as nama_laundry','users.nama as nama_user','users.email','pakets.nama_paket','transaksis.*')
        ->where('transaksis.id',$id)
        ->get();
        return view('edit_transaksi',$data);
        }

    }

    public function editProses(string $id)
    {
        $data['page'] = "Transaksi";
        $data['sub'] = "Transaksi Proses";        
        $data['id'] = $id;

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['user'] = User::all();
        $data['laundry'] = Laundry::all();
        $data['paket'] = DB::table('pakets')
        ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
        ->select('laundries.nama as nama_laundry','pakets.*')
        ->get();

        $data['transaksi'] = DB::table('transaksis')
        ->join('users', 'transaksis.id_user', '=', 'users.id')
        ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
        ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
        ->select('laundries.nama as nama_laundry','users.nama as nama_user','users.email','pakets.nama_paket','transaksis.*')
        ->where('transaksis.id',$id)
        ->get();
        return view('edit_transaksi_proses',$data);
        }
        else{
            $data['user'] = User::where('role', '>', 0)->get();
            $data['laundry'] = Laundry::where('id_user', $id_user)->get();
            $data['paket'] = DB::table('pakets')
            ->join('laundries', 'pakets.id_toko', '=', 'laundries.id')
            ->select('laundries.nama as nama_laundry','pakets.*')
            ->where('laundries.id_user',$id_user)
            ->get();
    
            $data['transaksi'] = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->join('pakets', 'transaksis.id_paket', '=', 'pakets.id')
            ->select('laundries.nama as nama_laundry','users.nama as nama_user','users.email','pakets.nama_paket','transaksis.*')
            ->where('transaksis.id',$id)
            ->get();
            return view('edit_transaksi_proses',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'id_user' => 'required',
                'id_toko' => 'required',
                'id_paket' => 'required',
                'berat' => 'required',
                'total' => 'required',
                'payment' => 'required',
                'status' => 'required'
            ],
            [
                'id_user.required' => 'Nama Pelanggan Wajib Diisi',
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'id_paket.required' => 'Paket Wajib Diisi',
                'berat.required' => 'Berat Cucian Wajib Diisi',
                'total.required' => 'Total Biaya Wajib Diisi',
                'payment.required' => 'Metode Pembayaran Wajib Diisi',
                'status.required' => 'Status Wajib Diisi'          
            ]
        );

        $data = Transaksi::find($id);
        $data->update($validated);
        return redirect('/transaksi_baru')->withSuccess(['Berhasil Update Transaksi!']);
    }


    public function updateProses(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'id_user' => 'required',
                'id_toko' => 'required',
                'id_paket' => 'required',
                'berat' => 'required',
                'total' => 'required',
                'payment' => 'required',
                'status' => 'required'
            ],
            [
                'id_user.required' => 'Nama Pelanggan Wajib Diisi',
                'id_toko.required' => 'Nama Laundry Wajib Diisi',
                'id_paket.required' => 'Paket Wajib Diisi',
                'berat.required' => 'Berat Cucian Wajib Diisi',
                'total.required' => 'Total Biaya Wajib Diisi',
                'payment.required' => 'Metode Pembayaran Wajib Diisi',
                'status.required' => 'Status Wajib Diisi'          
            ]
        );

        $data = Transaksi::find($id);
        $data->update($validated);
        return redirect('/transaksi_proses')->withSuccess(['Berhasil Update Transaksi!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Transaksi::find($id);
        $data->delete();
        return redirect('/transaksi_baru')->withSuccess(['Berhasil Hapus Transaksi!']);
    }
}
