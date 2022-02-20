<div class="col-4 col-sm-4">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST" id="form-kategori">
                @csrf
                <div class="row">
                <x-adminlte-input name="nama" id="nama" label="Nama Kategori" placeholder="placeholder" fgroup-class="col-md-12 col-12" disable-feedback/>
                <x-adminlte-select id="sort" name="sort" label="Jenis Kategori"
                                    fgroup-class="col-md-12 col-12" disable-feedback>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-red">
                                        <i class="fas fa-list"></i>
                                    </div>
                                </x-slot>
                                <option value="1">Berita</option>
                                <option value="2">Kegiatan</option>
                            </x-adminlte-select>    
                    </div>
                    <button type="button" class="btn btn-secondary">Batal</button>
                    <button type="submit" onclick="submitForm()" class="btn btn-primary">Simpan</button> 
            </form>
        </div>
    </div>
</div>