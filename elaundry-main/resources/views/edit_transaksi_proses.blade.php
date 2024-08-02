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


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Edit Transaksi</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
          <div class="col"><p>Edit Transaksi</p></div>
        </div>       
        
        <form action="{{url('/transaksi_proses/'.$id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <hr>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Nama Pelanggan</label>
            <select name="id_user" class="form-control select2"
            data-allow-clear="true">
                @foreach ($transaksi as $data)
                <option value="{{$data->id_user}}">{{$data->nama_user}} ({{$data->email}})</option>
                @endforeach
                @foreach ($user as $data)
                <option value="{{$data->id}}">{{$data->nama}} ({{$data->email}})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-2">
          <label class="font-weight-bold">Nama Laundry</label>
          <select name="id_toko" class="form-control select2"
          data-allow-clear="true">
              @foreach ($transaksi as $data)
              <option value="{{$data->id_toko}}">{{$data->nama_laundry}}</option>
              @endforeach
              @foreach ($laundry as $data)
              <option value="{{$data->id}}">{{$data->nama}}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group mb-2">
        <label class="font-weight-bold">Nama Paket</label>
        <select name="id_paket" class="form-control select2"
        data-allow-clear="true">
            @foreach ($transaksi as $data)
            <option value="{{$data->id_paket}}">{{$data->nama_paket}} ({{$data->nama_laundry}})</option>
            @endforeach
            @foreach ($paket as $data)
            <option value="{{$data->id}}">{{$data->nama_paket}} ({{$data->nama_laundry}})</option>
            @endforeach
        </select>
    </div>
    @foreach ($transaksi as $data)
          <div class="form-group mb-2">
              <label class="font-weight-bold">Berat</label>
              <input type="text" id="berat" name="berat" class="form-control" placeholder="Berat Cucian" maxlength="200" value="{{$data->berat}}">
          </div>
          <div class="form-group mb-2">
              <label class="font-weight-bold">Total Biaya</label>
              <input type="text" id="total" name="total" class="form-control" placeholder="Total Biaya" maxlength="200" value="{{$data->total}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Payment</label>
            <select name="payment" class="form-control select2"
            data-allow-clear="true">
                <option value="Cash">Cash</option>
            </select>
        </div>
        @endforeach
        <div class="form-group mb-2">
          <label class="font-weight-bold">Status</label>
          <select name="status" class="form-control select2"
          data-allow-clear="true">
              @foreach ($transaksi as $data)
              <option value="{{$data->status}}">{{$data->status}}</option>
              @endforeach
              <option value="Antrian">Antrian</option>
              <option value="Pickup">Pickup</option>
              <option value="Cuci">Cuci</option>
              <option value="Antar">Antar</option>
              <option value="Selesai">Selesai</option>
          </select>
      </div>          
          <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary form-control">Edit Transaksi</button>
          </div>
  </form>
       
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
