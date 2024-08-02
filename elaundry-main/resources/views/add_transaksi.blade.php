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
      <div class="card-datatable pt-0">
        <div class="row">
            <div class="col"><p>Tambah Transaksi</p></div>
        </div>       
       
        <form action="{{url('/transaksi')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <hr>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Nama Pelanggan</label>
            <select name="id_user" class="form-control select2"
            data-allow-clear="true">
                <option hidden value="">-- Nama Pelanggan --</option>
                @foreach ($user as $data)
                <option value="{{$data->id}}">{{$data->nama}} ({{$data->email}})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
          <label class="font-weight-bold">Nama Laundry</label>
          <select name="id_toko" class="form-control select2"
          data-allow-clear="true">
          <option hidden value="">-- Nama Laundry --</option>
              @foreach ($laundry as $data)
              <option value="{{$data->id}}">{{$data->nama}}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group mb-2">
        <label class="font-weight-bold">Nama Paket</label>
        <select name="id_paket" class="form-control select2"
        data-allow-clear="true">
        <option hidden value="">-- Nama Paket --</option>
            @foreach ($paket as $data)
            <option value="{{$data->id}}">{{$data->nama_paket}} ({{$data->nama_laundry}})</option>
            @endforeach
        </select>
    </div>
          <div class="form-group mb-2">
              <label class="font-weight-bold">Berat</label>
              <input type="text" id="berat" name="berat" class="form-control" placeholder="Berat Cucian" maxlength="200" value="{{old('nama')}}">
          </div>
          <div class="form-group mb-2">
              <label class="font-weight-bold">Total Biaya</label>
              <input type="text" id="total" name="total" class="form-control" placeholder="Total Biaya" maxlength="200" value="{{old('desa')}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Payment</label>
            <select name="payment" class="form-control select2"
            data-allow-clear="true">
                <option value="Cash">Cash</option>
            </select>
        </div>
        <div class="form-group mb-2">
          <label class="font-weight-bold">Status</label>
          <select name="status" class="form-control select2"
          data-allow-clear="true">
              <option value="Antrian">Antrian</option>
              <option value="Pickup">Pickup</option>
              <option value="Cuci">Cuci</option>
              <option value="Antar">Antar</option>
              <option value="Selesai">Selesai</option>
          </select>
      </div>
      <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary form-control">Tambah Transaksi Baru</button>
      </div>
  </form>


      </div>
    </div>

    <!--/ DataTable with Buttons -->
  </div>


  @endsection
