@extends('template/frame')
@section('content-wrapper')

@php
$datarole=Auth::user()->role;   
$hidden_class="";
$hidden_style="";
$text="";
  if ($datarole==0) {
    $text="Cek Orderan Semua Toko Disini";
  }else{
    $text="Ayo cek orderan di tokomu sekarang";
    $hidden_class="hidden";
    $hidden_style="d-none";
  }
@endphp

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row gy-4">
    <!-- Gamification Card -->
    <div class="col-md-12 col-lg-12">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-md-6 order-2 order-md-1">
            <div class="card-body">
              <h4 class="card-title pb-xl-2">Selamat Datang <strong> {{Auth::user()->nama}}!</strong></h4>
              <p class="mb-2">{{$text}}</p>
              <a href="{{url('/transaksi_baru')}}" class="btn btn-primary">Cek Orderan</a>
            </div>
          </div>
          <div class="col-md-6 text-center text-md-end order-1 order-md-2">
            <div class="card-body pb-0 px-0 px-md-4 ps-0">
           </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Gamification Card -->

    <!-- Statistics Total Order -->
    <div class="col-lg-3 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-swap-horizontal mdi-24px"></i>
              </div>
            </div>
          </div>
          <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
            <h5 class="mb-2">{{$total}}</h5>
            <p class="text-muted mb-lg-2 mb-xl-3">Total Orderan</p>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Total Order -->

     <!-- Statistics Total Order -->
     <div class="col-lg-3 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-washing-machine mdi-24px"></i>
              </div>
            </div>
          </div>
          <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
            <h5 class="mb-2">{{$baru}}</h5>
            <p class="text-muted mb-lg-2 mb-xl-3">Orderan Baru</p>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Total Order -->

      <!-- Statistics Total Order -->
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-washing-machine mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              <h5 class="mb-2">{{$proses}}</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">Orderan Dalam Proses</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->

       <!-- Statistics Total Order -->
       <div class="col-lg-3 col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-check-circle mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              <h5 class="mb-2">{{$selesai}}</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">Orderan Selesai</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->

    <!-- Statistics Total Order -->
      <div class="col-lg-3 col-sm-6 {{$hidden_style}}">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-account mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              <h5 class="mb-2">{{$jmluser}}</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">Jumlah Pengguna</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->
      
      

  </div>

  @endsection
