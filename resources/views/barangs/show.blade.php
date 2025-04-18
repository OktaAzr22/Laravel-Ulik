@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h4 class="mb-0">Detail Barang</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Kode Barang:</div>
                        <div class="col-md-8">{{ $barang->kode_barang }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nama Barang:</div>
                        <div class="col-md-8">{{ $barang->nama_barang }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Deskripsi:</div>
                        <div class="col-md-8">{{ $barang->deskripsi ?? '-' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Harga:</div>
                        <div class="col-md-8">Rp {{ number_format($barang->harga, 0, ',', '.') }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Stok:</div>
                        <div class="col-md-8">{{ $barang->stok }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Kategori:</div>
                        <div class="col-md-8">{{ $barang->kategori }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Tanggal Dibuat:</div>
                        <div class="col-md-8">{{ $barang->created_at->format('d M Y H:i') }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 font-weight-bold">Terakhir Diupdate:</div>
                        <div class="col-md-8">{{ $barang->updated_at->format('d M Y H:i') }}</div>
                    </div>
                    
                    <div class="mt-4">
                        <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('barangs.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection