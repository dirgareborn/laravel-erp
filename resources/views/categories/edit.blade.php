
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Perbaharui Data Kategori
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit">
                
                    <x-adminlte-input type="hidden" name="id2" id="id2" value=""/>
                    <x-adminlte-input name="nama2" id="nama2"  value="" label="Nama Kategori" fgroup-class="col-md-12 col-12"/>
                    <x-adminlte-select id="sort2" name="sort2" value="" label="Jenis Kategori" fgroup-class="col-md-12 col-12" disable-feedback>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-list"></i>
                            </div>
                        </x-slot>
                        <option value="1">Berita</option>
                        <option value="2">Kegiatan</option>
                    </x-adminlte-select> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
            </div>
        </div>
    </div>