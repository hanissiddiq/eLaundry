<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{url('admin/assets')}}"
  data-template="{{url('admin/html/vertical-menu-template')}}">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{$page}} - E-Laundry</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('favicon.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{url('admin/assets/vendor/fonts/materialdesignicons.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/fonts/fontawesome.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{url('admin/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{url('admin/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/swiper/swiper.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
    

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{url('admin/assets/vendor/css/pages/cards-statistics.css')}}" />
    <link rel="stylesheet" href="{{url('admin/assets/vendor/css/pages/cards-analytics.css')}}" />
    <!-- Helpers -->
    <script src="{{url('admin/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{url('admin/assets/vendor/js/template-customizer.js')}}"></script>
  
    <script src="{{url('admin/assets/js/config.js')}}"></script>

    <link href="{{url('DataTables/Buttons-2.4.2/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="{{url('DataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('zindex.css')}}" rel="stylesheet">


  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{url('/user')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                 <img src="{{url('favicon.png')}}" class="img-fluid" width="20px">
                </span>
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2">Admin Area</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                  fill="currentColor"
                  fill-opacity="0.6" />
                <path
                  d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                  fill="currentColor"
                  fill-opacity="0.38" />
              </svg>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{$page == 'Beranda'?'active':''}}">
                <a href="{{url('user')}}" class="menu-link">
                  <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                  <div data-i18n="Beranda">Beranda</div>
                </a>
              </li>

            <!-- Apps & Pages -->
            <li class="menu-header fw-light mt-4">
              <span class="menu-header-text">Pengaturan Toko &amp; Transaksi</span>
            </li>
            <li class="menu-item {{$page == 'Laundry'?'active':''}}">
              <a href="{{url('laundry')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-office-building-outline"></i>
                <div data-i18n="Laundry">Laundry</div>
              </a>
            </li>
            <li class="menu-item {{$page == 'Paket'?'active':''}}">
              <a href="{{url('/paket')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-cash"></i>
                <div data-i18n="Paket Laundry">Paket Laundry</div>
              </a>
            </li>
            <li class="menu-item {{$page == 'Transaksi'?'open':''}}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-swap-horizontal"></i>
                <div data-i18n="Transaksi">Transaksi</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{$sub == 'Transaksi Baru'?'active':''}}">
                  <a href="{{url('/transaksi_baru')}}" class="menu-link">
                    <div data-i18n="Baru">Baru</div>
                  </a>
                </li>
                <li class="menu-item {{$sub == 'Transaksi Proses'?'active':''}}">
                  <a href="{{url('/transaksi_proses')}}" class="menu-link">
                    <div data-i18n="Proses">Proses</div>
                  </a>
                </li>
                <li class="menu-item {{$sub == 'Transaksi Selesai'?'active':''}}">
                  <a href="{{url('/transaksi_selesai')}}" class="menu-link">
                    <div data-i18n="Selesai">Selesai</div>
                  </a>
                </li>
              
              </ul>
            </li>
          

            <!-- Components -->
            <li class="menu-header fw-light mt-4 ">
              <span class="menu-header-text">Pengguna</span>
            </li>

            <!-- Icons -->
            <li class="menu-item {{$page == 'Pengguna'?'active':''}}">
              <a href="{{url('pengguna')}}" class="menu-link ">
                <i class="menu-icon tf-icons mdi mdi-account-outline"></i>
                <div data-i18n="Pengguna">Pengguna</div>
              </a>
            </li>

         

        
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="mdi mdi-menu mdi-24px"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <p class="fst-italic">E-Laundry Kabupaten Bireuen</p>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{url('storage/'.Auth::user()->foto)}}" alt class="w-px-40 h-px-40 rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="{{url('pengguna/detail/'.Auth::user()->id)}}">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{url('storage/'.Auth::user()->foto)}}" alt class="w-px-40 h-px-40 rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            @php
                                $cek_role = Auth::user()->role;
                                $tampil_role_user="";
                                if($cek_role==0){
                                  $tampil_role_user="Super Admin";
                                }else{
                                  $tampil_role_user="Admin";
                                }
                            @endphp
                            <span class="fw-semibold d-block">{{Auth::user()->nama;}}</span>
                            <small class="text-muted">{{$tampil_role_user}}</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('pengguna/detail/'.Auth::user()->id)}}">
                        <i class="mdi mdi-account-outline me-2"></i>
                        <span class="align-middle">Profil Saya</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('logout')}}">
                        <i class="mdi mdi-logout me-2"></i>
                        <span class="align-middle">Logout</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input container-xxl border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="mdi mdi-close search-toggler cursor-pointer"></i>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            @yield('content-wrapper')          
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                  <div class="mb-2 mb-md-0">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    E-Laundry Kabupaten Bireuen
                  </div>
                 
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{url('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>

    <script src="{{url('admin/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{url('admin/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/node-waves/node-waves.js')}}"></script>

    <script src="{{url('admin/assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

    <script src="{{url('admin/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="{{url('admin/assets/vendor/libs/select2/select2.js')}}"></script> --}}
    <script src="{{url('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/swiper/swiper.js')}}"></script>

    <!-- Main JS -->
    <script src="{{url('admin/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{url('admin/assets/js/dashboards-analytics.js')}}"></script>




    <script src="{{url('DataTables/datatables.min.js')}}"></script>
    <script src="{{url('DataTables/DataTables-1.13.8/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{url('DataTables/Buttons-2.4.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('DataTables/Buttons-2.4.2/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{url('DataTables/JSZip-3.10.1/jszip.min.js')}}"></script>
    <script src="{{url('DataTables/pdfmake-0.2.7/pdfmake.min.js')}}"></script>
    <script src="{{url('DataTables/pdfmake-0.2.7/vfs_fonts.js')}}"></script>
    <script src="{{url('DataTables/Buttons-2.4.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('DataTables/Buttons-2.4.2/js/buttons.print.min.js')}}"></script>
    <script src="{{url('DataTables/Buttons-2.4.2/js/buttons.colVis.min.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/select2/select2.js')}}"></script>
    <script src="{{url('admin/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>


    <script>
      $(document).ready(function() {
        $('.select2').select2();
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-container--open .select2-search__field').focus();
    });
    </script>

    <script>
     var table = $('#example').DataTable( {
        dom: '<<"row"<"col"B><"col"f>>>rtip',
        buttons: [ {
          extend: 'excel',
          text: 'Unduh Excel',       
          className: 'btn btn-sm',  
        },
        {
          extend: 'pdf',
          text: 'Unduh PDF',
          className: 'btn btn-sm',  
        },
      ]  
    } );
    </script>
  </body>
</html>
