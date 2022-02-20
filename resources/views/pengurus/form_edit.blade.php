<form action="{{ route('pengurus.update' , $pengurus->id )}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row">
            <x-adminlte-input name="nama" id="nama_jabatan" label="Nama Pengurus" value="{{ $pengurus->nama }}" fgroup-class="col-md-6 col-6"/>
            <x-adminlte-input name="nik" id="nik" label="NIK KTP" value="{{ $pengurus->nik }}" fgroup-class="col-md-6 col-6"/>
            <x-adminlte-select label="Jenis Kelamin" name="jenis_kelamin" fgroup-class="col-md-6 col-6">
                <option value="1"> Laki-laki </option>
                    <option value="2">Perempuan</option>
            </x-adminlte-select>
            <x-adminlte-select label="Agama" name="agama_id" fgroup-class="col-md-6 col-6">
            <option value="{{ $pengurus->agama_id }}"> {{ $pengurus->agama_id  }}</option>
                <option value="1"> Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Hindu</option>
                    <option value="4">Budha</option>
            </x-adminlte-select>
            <x-adminlte-input name="tempat_lahir" id="tempat_lahir" label="Tempat Lahir" value="{{ $pengurus->tempat_lahir }}" fgroup-class="col-md-6 col-6"/>           
            @php
            $config = [
                "singleDatePicker" => true,
                "showDropdowns" => true,
                "startDate" => "js:moment()",
                "minYear" => 2000,
                "maxYear" => "js:parseInt(moment().format('YYYY'),10)",
                "timePicker" => true,
                "timePicker24Hour" => true,
                "timePickerSeconds" => true,
                "cancelButtonClasses" => "btn-danger",
                "locale" => ["format" => "YYYY-MM-DD HH:mm:ss"],
            ];
            @endphp
            <x-adminlte-date-range name="tanggal_lahir" label="Tanggal Lahir" :config="$config" value="{{ $pengurus->tanggal_lahir }}" fgroup-class="col-md-6 col-6">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </x-slot>
            </x-adminlte-date-range>
            
            <x-adminlte-input name="alamat" id="alamat" label="Alamat" value="{{ $pengurus->alamat }}" fgroup-class="col-md-6 col-6"/>   
            <x-adminlte-input name="telepon" id="telepon" label="No HP" value="{{ $pengurus->telepon }}" fgroup-class="col-md-6 col-6"/>
            <x-adminlte-input name="pendidikan" id="pendidikan" label="Pendidikan Terakhir" value="{{ $pengurus->pendidikan }}" fgroup-class="col-md-6 col-6"/>       
            <x-adminlte-select label="Jabatan" name="jabatan_id" fgroup-class="col-md-6 col-6">
                <option value="{{ $pengurus->jabatan_id }}"> {{ $pengurus->jabatan->nama_jabatan }}</option>
                @foreach ($jabatan as $key => $value)
                    <option value="{{ $key}}">{{$value}}</option>
                    @endforeach
                </x-adminlte-select>
            <x-adminlte-input-file name="foto" label="Foto" fgroup-class="col-md-6 col-6" placeholder="Choose a file...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
            
            <x-adminlte-input name="nomor_registrasi" id="nomor_registrasi" label="Nomor Registrasi" value="{{ $pengurus->nomor_registrasi }}" fgroup-class="col-md-6 col-6"/>
        </div>
        <a href="{{ route('pengurus.index')}}" class="btn btn-flat btn-danger" theme="outline-danger"> <i class="fa fa-back"></i> Kembali</a>
        <x-adminlte-button class="btn-flat" type="submit" label="Update" theme="info" icon="fas  fa-save"/>
</form>
@section('plugins.DateRangePicker', true)