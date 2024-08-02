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


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Edit Paket Laundry</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
        </div>       
        
        <form action="{{url('/paket/'.$id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          
          <label>Foto Paket Laundry</label>
          <hr>

          <div class="form-group">
            @foreach ($paket as $data)
                @php
                    if ($data->foto === null) {
                        $path="noimage.jpg";                                        
                    } else {
                        $path="/storage/".$data->foto;                                        
                    }
                @endphp
              
            <img src="{{url($path)}}" class="rounded mx-auto d-block mb-2 border" id="photopreview" style="width:300px;height:200px;">
            <input type="hidden" name="foto_lama" class="form-control" value="{{$data->foto}}">
            @endforeach
            <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
          </div>
          <br>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Nama Laundry</label>
            <select name="id_toko" class="form-control select2"
            data-allow-clear="true">
                @foreach ($paket as $data)
                <option hidden selected value="{{$data->id_toko}}">{{$data->nama}}</option>
                @endforeach
                @foreach ($laundry as $data)
                <option value="{{$data->id}}">{{$data->nama}}</option>
                @endforeach
            </select>

            @foreach ($paket as $data)
          <div class="form-group mt-2">
              <label class="font-weight-bold">Nama Paket</label>
              <input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" maxlength="200" value="{{$data->nama_paket}}">
          </div>

          <div class="form-group mt-2">
            <label class="font-weight-bold">Harga/Kg</label>
            <input type="number" name="harga" class="form-control" placeholder="Harga/Kg" maxlength="200" value="{{$data->harga}}">
        </div>
          <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary form-control">Update Paket</button>
          </div>
          @endforeach
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
