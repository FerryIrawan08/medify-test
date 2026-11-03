<div id="filter-container">
    <h4 class="fw-bold mb-3">Filter</h4>
    <div class="row g-2 align-items-end">
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label small fw-semibold text-secondary mb-1">Kode</label>
                <input type="text" class="form-control" id="filter-kode" placeholder="Contoh: MED-001">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label small fw-semibold text-secondary mb-1">Nama</label>
                <input type="text" class="form-control" id="filter-nama" placeholder="Contoh: Paracetamol">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label small fw-semibold text-secondary mb-1">Harga Min</label>
                <div class="input-group">
                    <span class="input-group-text fw-bold">Rp</span>
                    <input type="text" class="form-control rupiah-input" id="filter-harga-min" placeholder="0">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-label small fw-semibold text-secondary mb-1">Harga Max</label>
                <div class="input-group">
                    <span class="input-group-text fw-bold">Rp</span>
                    <input type="text" class="form-control rupiah-input" id="filter-harga-max" placeholder="0">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3 d-flex align-items-center gap-2">
        <button class="btn btn-primary btn-get-data px-4">
            <i class="bi bi-funnel me-1"></i> Filter
        </button>
        <button class="btn btn-outline-secondary btn-reset-filter" type="button" id="btn-reset-filter">
            Reset
        </button>
        <span id="loading-filter" class="spinner-border spinner-border-sm text-primary ms-2" style="display: none;" role="status"></span>
    </div>
</div>
