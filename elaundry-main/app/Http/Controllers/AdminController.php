<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page'] = "Beranda";
        $data['sub'] = "";

        $role=Auth::user()->role;
        $id_user=Auth::user()->id;

        if ($role=='0') {
        $data['total']=Transaksi::all()->count();
        $data['baru']=Transaksi::where('status', 'Antrian')->count();
        $data['proses'] = DB::table('transaksis')
        ->select('transaksis.*')
        ->whereNot('transaksis.status','Antrian')
        ->whereNot('transaksis.status','Selesai')
        ->count();
        $data['selesai']=Transaksi::where('status', 'Selesai')->count();
        $data['jmluser']=User::all()->count();
        return view('dashboard_admin',$data);
        }
        else{
            $data['total'] = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->select('transaksis.*')
            ->where('laundries.id_user',$id_user)
            ->count();

            $data['baru'] = DB::table('transaksis')
            ->select('transaksis.*')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->where('transaksis.status','Antrian')
            ->where('laundries.id_user',$id_user)
            ->count();
            
            $data['proses'] = DB::table('transaksis')
            ->select('transaksis.*')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->whereNot('transaksis.status','Antrian')
            ->whereNot('transaksis.status','Selesai')
            ->where('laundries.id_user',$id_user)
            ->count();

            $data['selesai'] = DB::table('transaksis')
            ->join('users', 'transaksis.id_user', '=', 'users.id')
            ->join('laundries', 'transaksis.id_toko', '=', 'laundries.id')
            ->select('transaksis.*')
            ->where('laundries.id_user',$id_user)
            ->where('transaksis.status','Selesai')
            ->count();

            $data['jmluser']=User::all()->count();
            return view('dashboard_admin',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
