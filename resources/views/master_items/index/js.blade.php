<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    // Suppress alert popups and log to console if any DataTables warning occurs
    $.fn.dataTable.ext.errMode = 'none';

    var start_date = '';
    var end_date = '';
    var data_per_fetch = 500;
    var data_fetched = 0;

    // Helper format Rupiah
    function formatRupiah(number) {
        if (number === null || number === undefined || isNaN(number)) return 'Rp 0';
        return 'Rp ' + Number(number).toLocaleString('id-ID');
    }

    $(document).ready(function() {
        $('#table').DataTable({
            searching: false,
            order: [[1, 'desc']], // Order by Kode descending
            columnDefs: [
                { defaultContent: '', targets: '_all' },
                { orderable: false, targets: [0, 7] } // Disable sort on Foto and Aksi
            ]
        });

        getData();

        // Rupiah thousand separator mask on filter inputs
        $(document).on('input', '.rupiah-input', function() {
            var raw = $(this).val().replace(/[^0-9]/g, '');
            if (raw) {
                $(this).val(Number(raw).toLocaleString('id-ID'));
            } else {
                $(this).val('');
            }
        });

        // Debounce Filter on typing (350ms delay)
        var filterDebounceTimer = null;
        $(document).on('input keyup', '.filter-debounce', function() {
            clearTimeout(filterDebounceTimer);
            $('#loading-filter').show();
            filterDebounceTimer = setTimeout(function() {
                getData();
            }, 350);
        });

        // Reset filter button
        $('#btn-reset-filter').click(function() {
            $('#filter-kode').val('');
            $('#filter-nama').val('');
            $('#filter-harga-min').val('');
            $('#filter-harga-max').val('');
            getData();
        });
    });

    function getData() {
        $('#loading-filter').show();
        var dataTableObj = $('#table').DataTable();
        var filter_kode = $('#filter-kode').val();
        var filter_nama = $('#filter-nama').val();
        var filter_harga_min = $('#filter-harga-min').val().replace(/[^0-9]/g, '');
        var filter_harga_max = $('#filter-harga-max').val().replace(/[^0-9]/g, '');
        
        dataTableObj.clear().draw();

        $.ajax({
            url: '{{url("master-items/search")}}',
            dataType: 'json',
            tryCount: 0,
            retryLimit: 3,
            data: {
                kode: filter_kode,
                nama: filter_nama,
                hargamin: filter_harga_min,
                hargamax: filter_harga_max
            },
            success: function(results) {
                var data = results.data || [];
                var rows = [];

                $.each(data, function(index, item) {
                    var beli = Number(item.harga_beli || 0);
                    var laba = Number(item.laba || 0);
                    var harga_jual = Math.round(beli + (beli * laba / 100));
                    var kode = item.kode || '';
                    var itemId = item.id || '';
                    var editUrl = '{{url("master-items/form/edit")}}/' + itemId;
                    var viewUrl = '{{url("master-items/view")}}/' + kode;

                    // Kolom Foto: jika sudah ada gambar tampilkan thumbnail, jika belum tombol + Foto
                    var fotoHtml = '';
                    if (item.foto) {
                        var fotoUrl = '{{ asset("") }}' + item.foto.replace(/^\//, '');
                        fotoHtml = `<a href="${viewUrl}" title="Lihat ${item.nama}">
                            <img src="${fotoUrl}" alt="${item.nama}" style="width: 48px; height: 48px; object-fit: cover; border-radius: 6px; border: 1px solid #dee2e6;">
                        </a>`;
                    } else {
                        fotoHtml = `<a href="${editUrl}" class="btn btn-sm btn-outline-secondary p-1 d-inline-flex flex-column align-items-center justify-content-center text-decoration-none" style="width: 48px; height: 48px; border-radius: 6px;" title="Tambah Foto Barang">
                            <i class="bi bi-camera text-primary" style="font-size: 1.1rem;"></i>
                            <span class="text-secondary" style="font-size: 0.6rem; line-height: 1;">+ Foto</span>
                        </a>`;
                    }

                    var aksiHtml = `<a href="${viewUrl}" class="btn btn-primary btn-sm px-3">View</a>`;

                    rows.push([
                        `<div class="text-center">${fotoHtml}</div>`,
                        `<strong>${kode}</strong>`,
                        item.nama || '',
                        `<span class="badge bg-light text-dark border">${item.jenis || '-'}</span>`,
                        formatRupiah(beli),
                        formatRupiah(harga_jual),
                        item.supplier || '',
                        `<div class="text-center">${aksiHtml}</div>`
                    ]);
                });

                dataTableObj.rows.add(rows).draw();
                $('#loading-filter').hide();
            },
            error: function(xhr, textStatus, errorThrown) {
                this.tryCount++;
                if (this.tryCount <= this.retryLimit) {
                    $.ajax(this);
                    return;
                }
                alert('Terjadi kesalahan server, tidak dapat mengambil data');
                $('#loading-filter').hide();
                return;
            }
        });
    }
</script>
