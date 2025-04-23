<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Simple Blog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Toastr CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      
        <div class="container">
            <a class="navbar-brand" href="/">Simple Blog</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('barangs.index') }}">
                      <i class="fas fa-box"></i> Barang
                  </a>
              </li>
              <li class="nav-item">
               <a class="nav-link" href="{{ route('tokos.index') }}">
                   <i class="fas fa-store"></i> Toko
               </a>
           </li>
            </div>
        </div>
        <button id="theme-toggle" type="button" class="p-2 rounded-full">
         <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
             <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
         </svg>
         <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
             <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path>
         </svg>
     </button>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
    <!-- jQuery (required by Toastr) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
   <!-- Toastr JS -->
   

  
   <!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script untuk notifikasi -->
<script>
    @if(Session::has('success'))
    Swal.fire({
    icon: 'success',
    title: 'Sukses!',
    text: '{{ Session::get('success') }}',
    timer: 3000,
    timerProgressBar: true,
    showConfirmButton: false,
    toast: true,
    
    background: '#f8f9fa',
    iconColor: '#28a745',
    color: '#343a40'
});
    @endif
</script>
<script>
   // Konfirmasi sebelum menghapus
   document.addEventListener('DOMContentLoaded', function() {
       const deleteForms = document.querySelectorAll('.delete-form');
       
       deleteForms.forEach(form => {
           form.addEventListener('submit', function(e) {
               e.preventDefault();
               
               Swal.fire({
                   title: 'Apakah Anda yakin?',
                   text: "Data yang dihapus tidak dapat dikembalikan!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Ya, hapus!',
                   cancelButtonText: 'Batal'
               }).then((result) => {
                   if (result.isConfirmed) {
                       form.submit();
                   }
               });
           });
       });
   });
</script>

<script>
   // Check for saved theme preference
   const themeToggle = document.getElementById('theme-toggle');
   const darkIcon = document.getElementById('theme-toggle-dark-icon');
   const lightIcon = document.getElementById('theme-toggle-light-icon');

   if (localStorage.getItem('color-theme') === 'dark' || 
       (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
       document.documentElement.classList.add('dark');
       lightIcon.classList.remove('hidden');
   } else {
       document.documentElement.classList.remove('dark');
       darkIcon.classList.remove('hidden');
   }

   // Toggle button click event
   themeToggle.addEventListener('click', function() {
       // Toggle icons
       darkIcon.classList.toggle('hidden');
       lightIcon.classList.toggle('hidden');
       
       // Toggle theme
       if (document.documentElement.classList.contains('dark')) {
           document.documentElement.classList.remove('dark');
           localStorage.setItem('color-theme', 'light');
       } else {
           document.documentElement.classList.add('dark');
           localStorage.setItem('color-theme', 'dark');
       }
   });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>