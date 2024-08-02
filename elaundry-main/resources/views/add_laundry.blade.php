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
      <div class="card-datatable pt-0">
        <div class="row">
            <div class="col"><p>Tambah Laundry</p></div>
        </div>       
       
        <form action="{{url('/laundry')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <hr>
          <div class="form-group">
            <img src="{{url('noimage.jpg')}}" class="rounded-circle mx-auto d-block mb-2 border" id="photopreview" style="width:200px;height:200px;">
            <label class="font-weight-bold">Foto Laundry</label>
            <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
          </div>
          <br>
          <div class="form-group mb-2">
              <label class="font-weight-bold">Nama Laundry</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Laundry" maxlength="200" value="{{old('nama')}}">
          </div>
          <div class="form-group mb-2">
              <label class="font-weight-bold">Desa</label>
              <input type="text" name="desa" class="form-control" placeholder="Desa" maxlength="200" value="{{old('desa')}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Kecamatan</label>
            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" maxlength="200" value="{{old('kecamatan')}}">
        </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Kabupaten</label>
            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten" maxlength="200" value="{{old('kabupaten')}}">
        </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Provinsi</label>
            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" maxlength="200" value="{{old('provinsi')}}">
        </div>
        <div class="form-group mb-2">
          <label class="font-weight-bold">Alamat</label>
          <textarea name="alamat" class="form-control" cols="30" rows="10">{{old('alamat')}}</textarea>
        </div>
        <div class="form-group mb-2">
          <label class="font-weight-bold">Admin</label>
          <select name="id_user" class="form-control select2"
          data-allow-clear="true">
              <option hidden selected value="">--  Admin --</option>
              @foreach ($user as $data)
              <option value="{{$data->id}}">{{$data->email}}</option>
              @endforeach
          </select>
      </div>
        <div class="form-group mb-2">
          <label class="font-weight-bold">Status Laundry</label>
          <select name="status_pengajuan" class="form-control ">
              <option hidden selected value="">-- Status Laundry --</option>
              <option value="0">Close</option>
              <option value="1">Antrian</option>
              <option value="2">Approved</option>
          </select>
      </div>
          <div class="form-group mb-2">
              <label class="font-weight-bold">Hidden Status</label>
              <select name="hidden" class="form-control">
                  <option hidden selected value="">-- Hidden Status --</option>
                  <option value="0">Hidden</option>
                  <option value="1">Show</option>
              </select>
          </div>
      <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary form-control">Tambah Laundry</button>
      </div>
  </form>


      </div>
    </div>

    <!--/ DataTable with Buttons -->
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" style="position: absolute;" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Laundry</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{url('/laundry')}}" method="POST">
            @csrf
            <hr>
            <div class="form-group">
              <img src="{{url('noimage.jpg')}}" class="rounded-circle mx-auto d-block mb-2 border" id="photopreview" style="width:200px;height:200px;">
              <label class="font-weight-bold">Foto Laundry</label>
              <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
            </div>
            <br>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Nama Laundry</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Laundry" maxlength="200" value="{{old('nama')}}">
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Desa</label>
                <input type="text" name="desa" class="form-control" placeholder="Desa" maxlength="200" value="{{old('desa')}}">
            </div>
            <div class="form-group mb-2">
              <label class="font-weight-bold">Kecamatan</label>
              <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" maxlength="200" value="{{old('kecamatan')}}">
          </div>
            <div class="form-group mb-2">
              <label class="font-weight-bold">Kabupaten</label>
              <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten" maxlength="200" value="{{old('kabupaten')}}">
          </div>
            <div class="form-group mb-2">
              <label class="font-weight-bold">Provinsi</label>
              <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" maxlength="200" value="{{old('provinsi')}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Admin</label>
            <select name="id_user" id="select2Basic"
            class="form-control select2"
            data-allow-clear="true">
                <option hidden selected value="">--  Admin --</option>
                @foreach ($user as $data)
                <option value="{{$data->id}}">{{$data->email}}</option>
                @endforeach
            </select>
        </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Status Laundry</label>
            <select name="status" class="form-control ">
                <option hidden selected value="">-- Status Laundry --</option>
                <option value="0">Close</option>
                <option value="1">Antrian</option>
                <option value="2">Approved</option>
            </select>
        </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Hidden Status</label>
                <select name="hidden" class="form-control">
                    <option hidden selected value="">-- Hidden Status --</option>
                    <option value="0">Hidden</option>
                    <option value="1">Show</option>
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
