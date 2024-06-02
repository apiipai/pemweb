<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <img src="{{ asset('asset/image/logo.png') }}" alt="Logo" class="logo">
        
        <ul>
            <a type="button" class="btn btn-primary" href="{{ route('kelola-pesanan') }}">
                Kelola Order
            </a>
            <a type="button" class="btn btn-primary" style="margin-left: 20px" href="{{ route('tambah-pesanan') }}">
                Tambah Order
            </a>
           
            <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-end" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" style="margin-left: 20px" >Logout</button>
            </form>
        </ul>
    </nav>
    
    <script>
        // Script untuk animasi scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
    
                const target = document.querySelector(this.getAttribute('href'));
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
    

    @yield('content')

</body>
</html>
