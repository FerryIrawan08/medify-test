<form method="POST" enctype="multipart/form-data">
    @csrf
    @if($method == 'edit')
    <div class="form-group mb-2">
        <label>Kode Barang</label>
        <input type="text" class="form-control" name="kode_barang" required readonly value="{{$item->kode ?? ''}}">
    </div>
    @endif

    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" required value="{{$item->nama ?? ''}}" placeholder="Contoh: Paracetamol 500mg">
    </div>

    <div class="form-group mb-2">
        <label>Harga Beli</label>
        <div class="input-group">
            <span class="input-group-text fw-bold">Rp</span>
            <input type="text" class="form-control" id="harga_beli_display" required placeholder="0" 
                   value="{{ !empty($item->harga_beli) ? number_format($item->harga_beli, 0, ',', '.') : '' }}">
            <input type="hidden" name="harga_beli" id="harga_beli" value="{{ $item->harga_beli ?? '' }}">
        </div>
    </div>

    <div class="form-group mb-2">
        <label>Laba (dalam persen)</label>
        <div class="input-group">
            <input type="number" class="form-control" name="laba" id="laba" required min="0" max="1000" value="{{$item->laba ?? ''}}" placeholder="Contoh: 20">
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

    @php $selected = $item->supplier ?? ''; @endphp
    <div class="form-group mb-2">
        <label>Supplier</label>
        <select class="form-control" required name="supplier">
            <option @if($selected == '') selected @endif value="">--Pilih--</option>
            <option @if($selected == 'PT Kimia Farma Tbk') selected @endif>PT Kimia Farma Tbk</option>
            <option @if($selected == 'PT Kalbe Farma Tbk') selected @endif>PT Kalbe Farma Tbk</option>
            <option @if($selected == 'PT Dexa Medica') selected @endif>PT Dexa Medica</option>
            <option @if($selected == 'PT Sanbe Farma') selected @endif>PT Sanbe Farma</option>
            <option @if($selected == 'PT Jayamas Medica Industri (OneMed)') selected @endif>PT Jayamas Medica Industri (OneMed)</option>
            <option @if($selected == 'PT Terumo Indonesia') selected @endif>PT Terumo Indonesia</option>
            <option @if($selected == 'Tokopaedi') selected @endif>Tokopaedi</option>
            <option @if($selected == 'Bukulapuk') selected @endif>Bukulapuk</option>
            <option @if($selected == 'TokoBagas') selected @endif>TokoBagas</option>
            <option @if($selected == 'E Commurz') selected @endif>E Commurz</option>
            <option @if($selected == 'Blublu') selected @endif>Blublu</option>
        </select>
    </div>

    @php $selected = $item->jenis ?? ''; @endphp
    <div class="form-group mb-2">
        <label>Jenis</label>
        <select class="form-control" required name="jenis">
            <option @if($selected == '') selected @endif value="">--Pilih--</option>
            <option @if($selected == 'Obat') selected @endif>Obat</option>
            <option @if($selected == 'Alat Kesehatan' || $selected == 'Alkes') selected @endif>Alat Kesehatan</option>
            <option @if($selected == 'Bahan Medis Habis Pakai' || $selected == 'Matkes') selected @endif>Bahan Medis Habis Pakai</option>
            <option @if($selected == 'Suplemen') selected @endif>Suplemen</option>
            <option @if($selected == 'Umum') selected @endif>Umum</option>
            <option @if($selected == 'ATK') selected @endif>ATK</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Kategori</label>
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

    <div class="form-group mb-3">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto" accept="image/*">
        @if(!empty($item->foto))
        <div class="mt-2">
            <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" style="max-height: 120px; border-radius: 6px; border: 1px solid #ddd; padding: 3px;">
            <p class="text-muted small mt-1 mb-0">Foto saat ini</p>
        </div>
        @endif
    </div>

    <button class="btn btn-primary mt-3">Submit</button>
</form>

<script>
    function updateHargaJualPreview() {
        var rawBeli = $('#harga_beli').val();
        var beli = parseFloat(rawBeli) || 0;
        var laba = parseFloat($('#laba').val()) || 0;
        var jual = Math.round(beli + (beli * laba / 100));
        $('#preview_harga_jual').text('Rp ' + jual.toLocaleString('id-ID'));
    }

    $(document).ready(function() {
        // Real-time Rupiah input masking
        $('#harga_beli_display').on('input', function() {
            var raw = $(this).val().replace(/[^0-9]/g, '');
            if (raw) {
                $(this).val(Number(raw).toLocaleString('id-ID'));
                $('#harga_beli').val(raw);
            } else {
                $(this).val('');
                $('#harga_beli').val('');
            }
            updateHargaJualPreview();
        });

        $('#laba').on('input', function() {
            updateHargaJualPreview();
        });

        // Initialize preview on page load
        updateHargaJualPreview();
    });
</script>
