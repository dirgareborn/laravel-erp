@extends('adminlte::page')

@section('title', 'Pengurus')

@section('content_header')
<div class="row mb-2">
  <div class="col-sm-6">
    <h1>Detail Data Pengurus DPD</h1>
  </div>
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active">Detail Data Pengurus DPD</li>
    </ol>
  </div>
</div>
@stop
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ is_foto($pengurus->foto , $pengurus->jenis_kelamin) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $pengurus->nama}}</h3>

                <p class="text-muted text-center">{{ $pengurus->jabatan->nama_jabatan}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>No. Registrasi</b> <a class="float-right">{{ $pengurus->nomor_registrasi}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>No. HP</b> <a class="float-right">{{ $pengurus->telepon }}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tentang {{ $pengurus->nama}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>

                <p class="text-muted">
                {{ $pengurus->pendidikan}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">{{ $pengurus->alamat}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Biodata</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ is_foto($pengurus->foto , $pengurus->jenis_kelamin) }}" alt="user image">
                        <span class="username">
                          <a href="#">{{ $pengurus->nama}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Jabatan : {{ $pengurus->jabatan->nama_jabatan }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Tempat / Tanggal Lahir : {{ $pengurus->tempat_lahir}}, {{ format_date($pengurus->tanggal_lahir)}} <br>
                        NIK  : {{ $pengurus->nik }} <br>
                        Jenis Kelamin : {{ is_sex($pengurus->jenis_kelamin) }} <br>
                        Agama : {{ is_religion($pengurus->agama_id) }} <br>
                        Alamat : {{ $pengurus->alamat }} <br>
                      </p>

                    
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop