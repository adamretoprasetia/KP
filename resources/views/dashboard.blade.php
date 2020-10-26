<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PT. PALEM MEKAR UTAMA </title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{ asset ('dashboard/plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('dashboard/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset ('dashboard/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('navbar.navbar')

        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12 col-lg-12 col-sm-12">
                        @include('flash-message')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Tambah Data Karyawan
                        </button> <br><br>
                        <div class="white-box">

                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Nama</th>                                           
                                            <th class="border-top-0">NIK</th>
                                            <th class="border-top-0">Tanggal Lahir</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Jabatan</th>
                                            <th class="border-top-0">Gaji Pokok</th>
                                            <th class="border-top-0">Tanggal Masuk</th>
                                            <th class="border-top-0">Tanggal Keluar</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                    </thead>
                                        @foreach($karyawan as $userkaryawan)
                                    <tbody>
                                        
                                        <td>{{ $userkaryawan->id }}</td>
                                        <td> {{ $userkaryawan->name }} </td>
                                        <td>{{ $userkaryawan->nomor_induk }}</td>
                                        <td>{{ $userkaryawan->tanggal_lahir }} </td>
                                        <td>{{ $userkaryawan->alamat }}</td>
                                        <td>{{ $userkaryawan->jabatan }}</td>
                                        <td>Rp. {{  number_format($userkaryawan->gaji_pokok,2,',','.') }}</td>
                                        <td>{{ $userkaryawan->tanggal_masuk }} </td>
                                        <td>{{ $userkaryawan->tanggal_keluar }} </td>
                                        <td>{{ $userkaryawan->status }} </td>

                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <footer class="footer text-center"> 2020 © PT. PALEM MEKAR UTAMA </footer>
        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->

<form action=" {{ route('addDataKaryawan')}} " method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-row">


                <div class="form-group col-md-6">
                  <label for="nama">Nama Karyawan</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Karyawan">
                </div>

                <div class="form-group col-md-6">
                  <label for="nama">Email Karyawan</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>

                <div class="form-group col-md-6">
                  <label for="nik">Nomor Induk Karyawan</label>
                  <input type="text" class="form-control" name="nik" id="nik" placeholder="Nomor Induk Karyawan">
                </div>

                <div class="form-group col-md-6">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="tanggal_lahir">
                </div>

                <div class="form-group col-md-6">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="jalan nomor rt rw kec kel km prov">
                </div> 

                <div class="form-group col-md-6">
                  <label for="jabatan">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="jabatan">
                </div>

                <div class="form-group col-md-6">
                  <label for="gaji_pokok">Gaji Pokok</label>
                  <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Rp.">
                </div>

                <div class="form-group col-md-6">
                  <label for="tanggal_masuk">Tanggal Masuk</label>
                  <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="tanggal_masuk">
                </div>

                <div class="form-group col-md-6">
                  <label for="tanggal_keluar">Tanggal Keluar</label>
                  <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" placeholder="tanggal_keluar">
                </div>   
              </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    </form>


    <script src="{{ asset ('dashboard/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ ('dashboard/plugins/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ ('dashboard/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ ('dashboard/js/app-style-switcher.js') }}"></script>
    <script src="{{ ('dashboard/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ ('dashboard/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ ('dashboard/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ ('dashboard/js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ ('dashboard/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ ('dashboard/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ ('dashboard/js/pages/dashboards/dashboard1.js') }}"></script>
</body>

</html>