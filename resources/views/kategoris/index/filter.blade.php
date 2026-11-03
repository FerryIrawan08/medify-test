<div id="filter-container" class="p-3 mb-3 bg-light rounded-3 border">
    <div class="row g-2 align-items-center">
        <!-- Search Nama Kategori -->
        <div class="col-12 col-md-7">
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white text-muted border-end-0">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" class="form-control border-start-0 filter-debounce" id="filter-nama" placeholder="Cari nama kategori...">
            </div>
        </div>

        <!-- Search Kode Kategori & Actions -->
        <div class="col-12 col-md-5">
            <div class="d-flex align-items-center gap-1">
                <div class="input-group input-group-sm flex-grow-1">
                    <span class="input-group-text bg-white text-muted border-end-0">
                        <i class="bi bi-tag"></i>
                    </span>
                    <input type="text" class="form-control border-start-0 filter-debounce" id="filter-kode" placeholder="Kode...">
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
