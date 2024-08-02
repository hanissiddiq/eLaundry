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


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Transaksi</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
            <div class="col"><p>Daftar Transaksi Laundry</p></div>
            <div class="col">
                <p align="right">  
                  <a href="{{url('transaksi/add')}}" class="btn btn-sm btn-primary"><span><i class="mdi mdi-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Transaksi Baru</span></span></a>
                </p>
            </div>
        </div>       
       
        <hr>
        <table class="table table-bordered" id="example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama User</th>
              <th>Nama Laundry</th>
              <th>Nama Paket</th>
              <th>Berat</th>
              <th>Total</th>
              <th>Payment</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transaksi as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama_user}}</td>
                <td>{{$data->nama_laundry}}</td>
                <td>{{$data->nama_paket}}</td>
                <td>{{$data->berat}} Kg</td>
                <td>Rp. {{$data->total}}</td>
                <td>{{$data->payment}}</td>
                <td class="text-center"><a class="btn btn-warning btn-sm mb-1 w-100" href="{{url('transaksi/detail/'.$data->id)}}" >Edit</a><br><a class="btn btn-danger btn-sm w-100" href="{{url('transaksi/'.$data->id)}}" onclick="return confirm('Yakin Menghapus Data?')">Hapus</a></td>
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
