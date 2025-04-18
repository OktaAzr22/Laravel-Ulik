@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manajemen Toko</h1>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tokoModal">
        Tambah Toko
    </button>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Pemilik</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tokos as $key => $toko)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $toko->nama_toko }}</td>
                        <td>{{ $toko->pemilik }}</td>
                        <td>{{ $toko->alamat }}</td>
                        <td>{{ $toko->telepon }}</td>
                        <td>
                            <button class="btn btn-warning edit-btn" 
                                    data-id="{{ $toko->id }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#tokoModal">
                                Edit
                            </button>
                            <button class="btn btn-danger delete-btn" 
                                    data-id="{{ $toko->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tokoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Toko</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="tokoForm">
                <div class="modal-body">
                    <input type="hidden" id="toko_id" name="toko_id">
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label">Nama Toko</label>
                        <input type="text" class="form-control" id="nama_toko" name="nama_toko" required>
                    </div>
                    <div class="mb-3">
                        <label for="pemilik" class="form-label">Pemilik</label>
                        <input type="text" class="form-control" id="pemilik" name="pemilik" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Reset form saat modal ditutup
        $('#tokoModal').on('hidden.bs.modal', function() {
            $('#tokoForm')[0].reset();
            $('#modalTitle').text('Tambah Toko');
            $('#toko_id').val('');
        });

        // Tambah/Edit Toko
        $('#tokoForm').submit(function(e) {
    e.preventDefault();
    console.log('Form submitted'); // Debug 1
    
    let formData = $(this).serialize();
    console.log('Form data:', formData); // Debug 2
    
    let url = $('#toko_id').val() ? `/tokos/${$('#toko_id').val()}` : '/tokos';
    let method = $('#toko_id').val() ? 'PUT' : 'POST';
    
    console.log('URL:', url, 'Method:', method); // Debug 3
    
    $.ajax({
        url: url,
        type: method,
        data: formData,
        success: function(response) {
            console.log('Success:', response); // Debug 4
            $('#tokoModal').modal('hide');
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: response.success,
                timer: 2000,
                showConfirmButton: false
            }).then(() => {
                location.reload();
            });
        },
        error: function(xhr) {
            console.log('Error:', xhr); // Debug 5
            let errors = xhr.responseJSON.errors;
            let errorMessages = '';
            $.each(errors, function(key, value) {
                errorMessages += value[0] + '<br>';
            });
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: errorMessages
            });
        }
    });
});

        // Edit Toko
        $('.edit-btn').click(function() {
            let id = $(this).data('id');
            $.get(`/tokos/${id}/edit`, function(data) {
                $('#modalTitle').text('Edit Toko');
                $('#toko_id').val(data.id);
                $('#nama_toko').val(data.nama_toko);
                $('#pemilik').val(data.pemilik);
                $('#alamat').val(data.alamat);
                $('#telepon').val(data.telepon);
                $('#email').val(data.email);
            });
        });

        // Hapus Toko
        $('.delete-btn').click(function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data toko akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/tokos/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush