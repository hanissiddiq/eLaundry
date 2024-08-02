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


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Laundry</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
            <div class="col"><p>Daftar Laundry</p></div>
            <div class="col">
              @php
               $datarole=Auth::user()->role;   
               $hidden_class="";
               if ($datarole==1) {
                $hidden_class="hidden";
               }
              @endphp

                <p align="right" {{$hidden_class}}>  
                  <a href="{{url('laundry/add')}}" class="btn btn-sm btn-primary"><span><i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Laundry Baru</span></span></a>
                </p>
            </div>
        </div>       
       
        <hr>
        <table class="table table-bordered" id="example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Status Pengajuan</th>
              <th>Admin</th>
              <th {{$hidden_class}}>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($laundry as $data)
            @php
                $status_pengajuan=$data->status_pengajuan;
                $tampil_status="";
                $class_status="";
                if ($status_pengajuan==0) {
                    $tampil_status="Close";
                    $class_status="btn-danger";
                }elseif ($status_pengajuan==1) {
                    $tampil_status="Antrian";
                    $class_status="btn-warning";
                }else{
                    $tampil_status="Approved";
                    $class_status="btn-success";
                }
            @endphp
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->alamat}}</td>
                <td><div class="btn {{$class_status}} w-100">{{$tampil_status}}</div></td>
                <td class="text-center"><a class="btn btn-info w-100" href="{{url('pengguna/detail/'.$data->id_user)}}">{{$data->email_admin}}</a></td>
                <td class="text-center" {{$hidden_class}}><a class="btn btn-warning btn-sm mb-1 w-100" href="{{url('laundry/detail/'.$data->id)}}" >Edit</a><br><a class="btn btn-danger btn-sm w-100" href="{{url('laundry/'.$data->id)}}" onclick="return confirm('Yakin Menghapus Data?')">Hapus</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!--/ DataTable with Buttons -->
  </div>
  <script>
    function showPreview(event){
       if(event.target.files.length > 0){
           var src = URL.createObjectURL(event.target.files[0]);
           var preview = document.getElementById("photopreview");
           preview.src = src;
           preview.style.display = "block";
       }
       }
</script>

  @endsection
