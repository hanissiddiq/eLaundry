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


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Tambah Paket Laundry</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
        </div>       
        
        <form action="{{url('/paket')}}" method="POST" enctype="multipart/form-data">
          @csrf          
          <div class="form-group">
            <img src="{{url('noimage.jpg')}}" class="rounded-circle mx-auto d-block mb-2 border" id="photopreview" style="width:200px;height:200px;">
            <label class="font-weight-bold">Foto Paket</label>
            <input type="file" name="foto" class="form-control mx-auto d-block mb-2" onchange="showPreview(event);">
          </div>

          <div class="form-group mb-2">
            <label class="font-weight-bold">Nama Laundry</label>
            <select name="id_toko" class="form-control select2"
            data-allow-clear="true">
                <option hidden selected value="">-- Nama Laundry --</option>
                @foreach ($laundry as $data)
                <option value="{{$data->id}}">{{$data->nama}}</option>
                @endforeach
            </select>

          <div class="form-group mt-2">
              <label class="font-weight-bold">Nama Paket</label>
              <input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" maxlength="200" value="{{old('nama_paket')}}">
          </div>

          <div class="form-group mt-2">
            <label class="font-weight-bold">Harga/Kg</label>
            <input type="number" name="harga" class="form-control" placeholder="Harga/Kg" maxlength="200" value="{{old('harga')}}">
        </div>
          <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary form-control">Tambah Paket</button>
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
