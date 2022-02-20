<form action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <x-adminlte-input name="nama" id="nama_jabatan" label="Nama Pengurus" placeholder="Nama Pengurus" fgroup-class="col-md-6 col-6"/>
            <x-adminlte-input name="nik" id="nik" label="NIK KTP" placeholder="NIK KTP" fgroup-class="col-md-6 col-6"/>
            <x-adminlte-select label="Jenis Kelamin" name="jenis_kelamin" fgroup-class="col-md-6 col-6">
                <option value="1"> Laki-laki </option>
                    <option value="2">Perempuan</option>
            </x-adminlte-select>
            <x-adminlte-select label="Agama" name="agama_id" fgroup-class="col-md-6 col-6">
                <option value="1"> Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">katolik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Budha</option>
            </x-adminlte-select>
            <x-adminlte-input name="tempat_lahir" id="tempat_lahir" label="Tempat Lahir" placeholder="Tempat Lahir" fgroup-class="col-md-6 col-6"/>           
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
            <x-adminlte-date-range name="tanggal_lahir" label="Tanggal Lahir" :config="$config"  fgroup-class="col-md-6 col-6">
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-dark">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                </x-slot>
            </x-adminlte-date-range>
            
            <x-adminlte-input name="alamat" id="alamat" label="Alamat" placeholder="Alamat" fgroup-class="col-md-6 col-6"/>   
            <x-adminlte-input name="telepon" id="telepon" label="No HP" placeholder="No HP" fgroup-class="col-md-6 col-6"/>
            <x-adminlte-input name="pendidikan" id="pendidikan" label="Pendidikan Terakhir" placeholder="Pendidikan Terakhir" fgroup-class="col-md-6 col-6"/>       
            <x-adminlte-select label="Jabatan" name="jabatan_id" fgroup-class="col-md-6 col-6">
                <option value="0"> Pilih Jabatan</option>
                @foreach ($jabatans as $key => $value)
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
            
            <x-adminlte-input name="nomor_registrasi" id="nomor_registrasi" label="Nomor Registrasi" placeholder="Nomor Registrasi" fgroup-class="col-md-6 col-6"/>
        </div>
        <x-adminlte-button class="btn-flat" type="reset" label="Reset" theme="outline-danger" icon="fas  fa-trash"/>
        <x-adminlte-button class="btn-flat" type="submit" label="Simpan" theme="success" icon="fas  fa-save"/>
</form>
@section('plugins.DateRangePicker', true)