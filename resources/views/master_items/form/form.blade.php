<form method="POST" action="{{ $method == 'new' ? url('master-items/form/new') : url('master-items/form/edit/' . ($item->id ?? 0)) }}" enctype="multipart/form-data" id="masterItemForm">
    @csrf

    @if($errors->any())
        <div class="alert alert-danger py-2 px-3 small rounded-3 mb-3">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group mb-2">
        <label class="form-label fw-semibold">Kode Barang</label>
        <input type="text" class="form-control bg-light" name="kode_barang" value="{{ old('kode_barang', $item->kode ?? '') }}" readonly>
        <small class="text-muted">Kode barang di-generate secara otomatis.</small>
    </div>

    <div class="form-group mb-2">
        <label class="form-label fw-semibold">Nama Barang <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nama" required value="{{ old('nama', $item->nama ?? '') }}" placeholder="Contoh: Paracetamol 500mg">
    </div>

    <div class="form-group mb-2">
        <label class="form-label fw-semibold">Harga Beli <span class="text-danger">*</span></label>
        <div class="input-group">
            <span class="input-group-text fw-bold">Rp</span>
            <input type="text" class="form-control" name="harga_beli" id="harga_beli" required placeholder="0" 
                   value="{{ old('harga_beli', !empty($item->harga_beli) ? number_format($item->harga_beli, 0, ',', '.') : '') }}">
        </div>
    </div>

    <div class="form-group mb-2">
        <label class="form-label fw-semibold">Laba (dalam persen) <span class="text-danger">*</span></label>
        <div class="input-group">
            <input type="number" class="form-control" name="laba" id="laba" required min="0" max="1000" value="{{ old('laba', $item->laba ?? '') }}" placeholder="Contoh: 20">
            <span class="input-group-text fw-bold">%</span>
        </div>
        <!-- Real-time Estimation Helper -->
        <div class="mt-2 p-2 bg-light border rounded d-flex align-items-center justify-content-between">
            <span class="small text-secondary">
                <i class="bi bi-calculator me-1"></i> Estimasi Harga Jual:
            </span>
            <span class="fw-bold text-success fs-6" id="preview_harga_jual">Rp 0</span>
        </div>
    </div>

    @php $selectedSupplier = old('supplier', $item->supplier ?? ''); @endphp
    <div class="form-group mb-2">
        <label class="form-label fw-semibold">Supplier <span class="text-danger">*</span></label>
        <select class="form-control" required name="supplier">
            <option value="" @if($selectedSupplier == '') selected @endif>--Pilih Supplier--</option>
            <option value="PT Kimia Farma Tbk" @if($selectedSupplier == 'PT Kimia Farma Tbk') selected @endif>PT Kimia Farma Tbk</option>
            <option value="PT Kalbe Farma Tbk" @if($selectedSupplier == 'PT Kalbe Farma Tbk') selected @endif>PT Kalbe Farma Tbk</option>
            <option value="PT Dexa Medica" @if($selectedSupplier == 'PT Dexa Medica') selected @endif>PT Dexa Medica</option>
            <option value="PT Sanbe Farma" @if($selectedSupplier == 'PT Sanbe Farma') selected @endif>PT Sanbe Farma</option>
            <option value="PT Jayamas Medica Industri (OneMed)" @if($selectedSupplier == 'PT Jayamas Medica Industri (OneMed)') selected @endif>PT Jayamas Medica Industri (OneMed)</option>
            <option value="PT Terumo Indonesia" @if($selectedSupplier == 'PT Terumo Indonesia') selected @endif>PT Terumo Indonesia</option>
            <option value="Tokopaedi" @if($selectedSupplier == 'Tokopaedi') selected @endif>Tokopaedi</option>
            <option value="Bukulapuk" @if($selectedSupplier == 'Bukulapuk') selected @endif>Bukulapuk</option>
            <option value="TokoBagas" @if($selectedSupplier == 'TokoBagas') selected @endif>TokoBagas</option>
            <option value="E Commurz" @if($selectedSupplier == 'E Commurz') selected @endif>E Commurz</option>
            <option value="Blublu" @if($selectedSupplier == 'Blublu') selected @endif>Blublu</option>
        </select>
    </div>

    @php $selectedJenis = old('jenis', $item->jenis ?? ''); @endphp
    <div class="form-group mb-2">
        <label class="form-label fw-semibold">Jenis Barang <span class="text-danger">*</span></label>
        <select class="form-control" required name="jenis">
            <option value="" @if($selectedJenis == '') selected @endif>--Pilih Jenis--</option>
            <option value="Obat" @if($selectedJenis == 'Obat') selected @endif>Obat</option>
            <option value="Alat Kesehatan" @if($selectedJenis == 'Alat Kesehatan' || $selectedJenis == 'Alkes') selected @endif>Alat Kesehatan</option>
            <option value="Bahan Medis Habis Pakai" @if($selectedJenis == 'Bahan Medis Habis Pakai' || $selectedJenis == 'Matkes') selected @endif>Bahan Medis Habis Pakai</option>
            <option value="Suplemen" @if($selectedJenis == 'Suplemen') selected @endif>Suplemen</option>
            <option value="Umum" @if($selectedJenis == 'Umum') selected @endif>Umum</option>
            <option value="ATK" @if($selectedJenis == 'ATK') selected @endif>ATK</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        @if(isset($kategoris) && count($kategoris) > 0)
            <div class="p-2 border rounded bg-light" style="max-height: 180px; overflow-y: auto;">
                @foreach($kategoris as $kategori)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kategori_ids[]" value="{{ $kategori->id }}" id="kategori_{{ $kategori->id }}"
                            @if(in_array($kategori->id, old('kategori_ids', $selected_kategori_ids ?? []))) checked @endif>
                        <label class="form-check-label" for="kategori_{{ $kategori->id }}">
                            <span class="badge bg-secondary me-1">{{ $kategori->kode }}</span> {{ $kategori->nama }}
                        </label>
                    </div>
                @endforeach
            </div>
            <small class="text-muted">Pilih satu atau lebih kategori yang sesuai.</small>
        @else
            <div class="p-2 border rounded bg-light text-muted small">
                Belum ada kategori yang dibuat. <a href="{{ url('kategoris/form/new') }}" target="_blank">Tambah kategori baru</a>
            </div>
        @endif
    </div>

    <div class="form-group mb-4">
        <label class="form-label fw-semibold">Foto</label>
        <input type="file" class="form-control" name="foto" accept="image/*">
        @if(!empty($item->foto))
        <div class="mt-2">
            <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" style="max-height: 120px; border-radius: 6px; border: 1px solid #ddd; padding: 3px;">
            <p class="text-muted small mt-1 mb-0">Foto saat ini</p>
        </div>
        @endif
    </div>

    <div class="d-flex align-items-center gap-2">
        <button type="submit" class="btn btn-primary px-4" id="btnSubmitItem">
            <i class="bi bi-save me-1"></i> Simpan Data
        </button>
        <a href="{{ url('master-items') }}" class="btn btn-outline-secondary">
            Batal
        </a>
    </div>
</form>

<script>
    function updateHargaJualPreview() {
        var rawBeli = ($('#harga_beli').val() || '').toString().replace(/[^0-9]/g, '');
        var beli = parseFloat(rawBeli) || 0;
        var laba = parseFloat($('#laba').val()) || 0;
        var jual = Math.round(beli + (beli * laba / 100));
        $('#preview_harga_jual').text('Rp ' + jual.toLocaleString('id-ID'));
    }

    $(document).ready(function() {
        // Real-time Rupiah input masking
        $('#harga_beli').on('input', function() {
            var raw = $(this).val().replace(/[^0-9]/g, '');
            if (raw) {
                $(this).val(Number(raw).toLocaleString('id-ID'));
            } else {
                $(this).val('');
            }
            updateHargaJualPreview();
        });

        $('#laba').on('input', function() {
            updateHargaJualPreview();
        });

        // Initialize preview on page load
        updateHargaJualPreview();

        // Handle safe form submission
        $('#masterItemForm').on('submit', function() {
            var btn = $('#btnSubmitItem');
            btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menyimpan...');
        });
    });
</script>
