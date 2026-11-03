<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $.fn.dataTable.ext.errMode = 'none';

    $(document).ready(function() {
        $('#table').DataTable({
            searching: false,
            order: [[0, 'desc']],
            columnDefs: [
                { defaultContent: '', targets: '_all' },
                { orderable: false, targets: [3] }
            ]
        });

        getData();

        // Debounce filter on typing (350ms delay)
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
            getData();
        });
    });

    function getData() {
        $('#loading-filter').show();
        var dataTableObj = $('#table').DataTable();
        var filter_kode = $('#filter-kode').val();
        var filter_nama = $('#filter-nama').val();
        
        dataTableObj.clear().draw();

        $.ajax({
            url: '{{url("kategoris/search")}}',
            dataType: 'json',
            tryCount: 0,
            retryLimit: 3,
            data: {
                kode: filter_kode,
                nama: filter_nama
            },
            success: function(results) {
                var data = results.data || [];
                var rows = [];

                $.each(data, function(index, item) {
                    var kode = item.kode || '';
                    var viewBtn = `<a href="{{url('kategoris/view/')}}/` + kode + `" class="btn btn-primary btn-sm px-3">View</a>`;

                    rows.push([
                        `<strong>${kode}</strong>`,
                        item.nama || '',
                        `<span class="badge bg-secondary">${item.items_count !== undefined ? item.items_count : 0} Item</span>`,
                        `<div class="text-center">${viewBtn}</div>`
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
                alert('Terjadi kesalahan server, tidak dapat mengambil data kategori');
                $('#loading-filter').hide();
            }
        });
    }
</script>
