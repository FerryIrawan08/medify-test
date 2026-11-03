@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group mb-2 d-flex justify-content-end">
                <a href="{{url('master-items')}}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar Item
                </a>
            </div>
            <div class="card">
                <div class="card-header">Master Item</div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width: 150px;">Nama</th>
                            <td style="width: 20px;">:</td>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <th>Harga Beli</th>
                            <td>:</td>
                            <td class="fw-bold">Rp {{ number_format($data->harga_beli, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Laba</th>
                            <td>:</td>
                            <td>{{$data->laba}} %</td>
                        </tr>
                        <tr>
                            <th>Harga Jual</th>
                            <td>:</td>
                            <td class="fw-bold text-success">Rp {{ number_format($data->harga_beli + ($data->harga_beli * $data->laba / 100), 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td>:</td>
                            <td>{{$data->supplier}}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>:</td>
                            <td>{{$data->jenis}}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>:</td>
                            <td>
                                @if(isset($data->kategoris) && $data->kategoris->count() > 0)
                                    @foreach($data->kategoris as $kategori)
                                        <a href="{{ url('kategoris/view/' . $kategori->kode) }}" class="badge bg-primary text-decoration-none me-1">
                                            {{ $kategori->nama }} ({{ $kategori->kode }})
                                        </a>
                                    @endforeach
                                @else
                                    <span class="text-muted">Tidak ada kategori</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>:</td>
                            <td>
                                @if(!empty($data->foto))
                                    <img src="{{ asset($data->foto) }}" alt="{{ $data->nama }}" style="max-height: 200px; max-width: 100%; border-radius: 8px; border: 1px solid #ddd; padding: 4px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div class="d-flex justify-content-end align-items-center gap-2 mt-4 pt-3 border-top">
                        <a class="btn btn-info text-white" href="{{url('master-items/form/edit')}}/{{$data->id}}">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-delete" href="{{url('master-items/delete')}}/{{$data->id}}" data-confirm-text="Item '{{ $data->nama }}' akan dipindahkan ke tempat sampah.">
                            <i class="bi bi-trash me-1"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection