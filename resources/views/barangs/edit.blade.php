@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0">Edit Data Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" class="form-control" 
                                   id="kode_barang" name="kode_barang" 
                                   value="{{ $barang->kode_barang }}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" 
                                   id="nama_barang" name="nama_barang" 
                                   value="{{ $barang->nama_barang }}" required>
                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">
                                {{ $barang->deskripsi }}
                            </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                                   id="harga" name="harga" 
                                   value="{{ $barang->harga }}" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" 
                                   id="stok" name="stok" 
                                   value="{{ $barang->stok }}" required>
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" id="kategori" name="kategori" required>
                                <option value="Elektronik" {{ $barang->kategori == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                <option value="Pakaian" {{ $barang->kategori == 'Pakaian' ? 'selected' : '' }}>Pakaian</option>
                                <option value="Makanan" {{ $barang->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                <option value="Minuman" {{ $barang->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                <option value="Alat Tulis" {{ $barang->kategori == 'Alat Tulis' ? 'selected' : '' }}>Alat Tulis</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-warning mt-3">
                            <i class="fas fa-save"></i> Update
                        </button>
                        <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection