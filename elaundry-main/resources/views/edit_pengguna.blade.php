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


    <h4 class="fw-bold py-3 mb-2 mt-0"><span class="text-muted fw-light">Admin /</span> Edit Pengguna</h4>
    <!-- DataTable with Buttons -->
    <div class="card p-4">
      <div class="card-datatable table-responsive pt-0">
        <div class="row">
        </div>       
        
        <form action="{{url('/pengguna/'.$id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          @foreach ($pengguna as $data)
          
          <p class="fw-bold">Foto Profil</p>
          <hr>

          <div class="form-group">
                @php
                    if ($data->foto === null) {
                        $path="noimage.jpg";                                        
                    } else {
                        $path="/storage/".$data->foto;                                        
                    }
                @endphp
               
            <img src="{{url($path)}}" class="rounded-circle mx-auto d-block mb-2 border" id="photopreview" style="width:200px;height:200px;">
            <input type="hidden" name="foto_lama" class="form-control" value="{{$data->foto}}">
            @endforeach
            <input type="file" name="foto" class="form-control mx-auto d-block" onchange="showPreview(event);">
       </div>
       <br><br>

       @php
       $datarole=Auth::user()->role;   
       $hidden_class="";
       if ($datarole==1) {
        $hidden_class="hidden";
       }
      @endphp
       @foreach ($pengguna as $data)
          <p class="fw-bold">Data Diri</p>
          <hr>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" maxlength="200" value="{{$data->nama}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" maxlength="200" value="{{$data->tempat_lahir}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="{{$data->tanggal_lahir}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">E-mail</label>
            <input type="email" name="email" class="form-control bg-secondary text-light" placeholder="E-mail" maxlength="200" value="{{$data->email}}" readonly>
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">No HP</label>
            <input type="number" name="no_hp" class="form-control" placeholder="No HP" maxlength="15" value="{{$data->no_hp}}">
          </div>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Alamat</label>
            <textarea name="alamat" class="form-control" cols="30" rows="10">{{$data->alamat}}</textarea>
          </div>
          <br>  
          <p class="fw-bold">Keamanan</p>
          <hr>
          <div class="form-group mb-2">
            <label class="font-weight-bold">Password</label>
            <input type="hidden" name="password_lama" class="form-control" placeholder="Password" value="{{$data->password}}" maxlength="200">
            <input type="password" name="password" class="form-control" placeholder="Kosongkan Jika Tidak Mengubah Password" maxlength="200">
        </div>
          @endforeach
          <div class="form-group mb-2" {{$hidden_class}}>
              <label class="font-weight-bold">Role</label>
              <select name="role" class="form-control">
                @foreach ($pengguna as $item)
                @php
                    $roles = $data->role;
                    $tampil_role = "";
                    if ($roles==0) {
                      $tampil_role = "Super Admin";
                    }elseif ($roles==1) {
                      $tampil_role = "Admin";
                    }else {
                      $tampil_role = "User";
                    }
                @endphp
                <option selected hidden value="{{$data->role}}">{{$tampil_role}}</option>
                @endforeach
                <option value="0">Super Admin</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
          </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Simpan</button>
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
