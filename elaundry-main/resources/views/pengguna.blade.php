@extends('template/frame')
@section('content-wrapper')


    <div class="container-xxl flex-grow-1">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal Menambahkan Data!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
                      @if (is_array(session('success')))
                            @foreach (session('success') as $message)
                                {{ $message }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </button>
                        @else
                            {{ session('success') }}
                        @endif
                    </div>
                @endif

                @php
               $datarole=Auth::user()->role;   
               $hidden_class="";
               $hidden_style="";
               if ($datarole==1) {
                $hidden_class="hidden";
                $hidden_style="d-none";
               }
              @endphp


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Pengguna</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
            <div class="col"><p>Daftar Pengguna Aplikasi</p></div>
            <div class="col">
                <p align="right" {{$hidden_class}}>  
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span><i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah User Baru</span></span></button>
                </p>
            </div>
        </div>       
       
        <hr>
        <table class="table table-bordered" id="example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor HP</th>
              <th {{$hidden_class}}>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengguna as $data)
                @php
                 $roles=$data->role;
                 $tampil_role="";
                 $tampil_class="";
                 if ($roles==0) {
                    $tampil_role="Super Admin";
                 }elseif ($roles==1) {
                    $tampil_role="Admin";
                 }else{
                    $tampil_role="User";
                 }   
                 if ($roles==0) {
                    $tampil_class="btn btn-sm btn-danger";
                 }elseif ($roles==1) {
                    $tampil_class="btn btn-sm btn-success";
                 }else{
                    $tampil_class="";
                 }   

                @endphp
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->no_hp}}</td>
                <td {{$hidden_class}} class="text-center"><div class="w-100 {{$tampil_class}}">{{$tampil_role}}</div></td>
                <td class="text-center"><a class="btn btn-warning btn-sm mb-1 w-100" href="{{url('pengguna/detail/'.$data->id)}}" >Edit</a><br><a class="btn btn-danger btn-sm w-100 {{$hidden_style}}" href="{{url('pengguna/'.$data->id)}}" onclick="return confirm('Yakin Menghapus Data?')">Hapus</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!--/ DataTable with Buttons -->
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{url('/pengguna')}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label class="font-weight-bold">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="200" value="{{old('nama')}}">
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail" maxlength="200" value="{{old('email')}}">
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">No HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="No HP" maxlength="15" value="{{old('no_hp')}}" minlength="10">
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" maxlength="200">
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Role</label>
                <select name="role" class="form-control">
                    <option hidden selected value="">-- Role --</option>
                    <option value="0">Super Admin</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @endsection
