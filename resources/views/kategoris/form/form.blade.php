<form method="POST">
    @csrf
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group mb-3">
        <label>Kode Kategori</label>
        <input type="text" class="form-control" name="kode" value="{{ old('kode', $item->kode ?? '') }}" placeholder="{{ $method == 'new' ? 'Otomatis di-generate jika dikosongkan' : '' }}" @if($method == 'edit') readonly @endif>
        <small class="text-muted">Format contoh: KAT-0001 (opsional saat baru, akan di-generate otomatis)</small>
    </div>

    <div class="form-group mb-3">
        <label>Nama Kategori <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nama" required value="{{ old('nama', $item->nama ?? '') }}" placeholder="Contoh: Obat Generik">
    </div>

    <div class="d-flex justify-content-end align-items-center gap-2 mt-4 pt-3 border-top">
        <a href="{{ url('kategoris') }}" class="btn btn-outline-secondary px-3">
            Batal
        </a>
        <button type="submit" class="btn btn-primary px-4" id="btnSubmitKategori">
            <i class="bi bi-save me-1"></i> Simpan Data
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                var nama = document.querySelector('input[name="nama"]');
                if (nama && nama.value.trim() !== '') {
                    Swal.fire({
                        title: 'Menyimpan Kategori...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
            });
        }
    });
</script>

