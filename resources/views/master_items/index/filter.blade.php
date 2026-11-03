<div id="filter-container" class="p-3 mb-3 bg-light rounded-3 border">
    <div class="row g-2 align-items-center">
        <!-- Search Nama -->
        <div class="col-12 col-md-4">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white text-muted border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control border-start-0 filter-debounce" id="filter-nama" placeholder="Cari nama barang...">
            </div>
        </div>

        <!-- Search Kode -->
        <div class="col-6 col-md-2">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white text-muted border-end-0">
                    <i class="bi bi-upc-scan"></i>
                </span>
                <input type="text" class="form-control border-start-0 filter-debounce" id="filter-kode" placeholder="Kode...">
            </div>
        </div>

        <!-- Harga Min -->
        <div class="col-6 col-md-3">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white text-muted">Rp Min</span>
                <input type="text" class="form-control rupiah-input filter-debounce" id="filter-harga-min" placeholder="0">
            </div>
        </div>

        <!-- Harga Max & Action -->
        <div class="col-12 col-md-3">
            <div class="d-flex align-items-center gap-1">
                <div class="input-group input-group-sm flex-grow-1">
                    <span class="input-group-text bg-white text-muted">Rp Max</span>
                    <input type="text" class="form-control rupiah-input filter-debounce" id="filter-harga-max" placeholder="0">
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary px-2 text-nowrap" id="btn-reset-filter" title="Reset Filter">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </button>
                <div id="loading-filter" class="spinner-border spinner-border-sm text-primary flex-shrink-0" style="display: none;" role="status" title="Mencari...">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
