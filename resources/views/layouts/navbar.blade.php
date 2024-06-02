<nav class="navbar">
    <img src="{{ asset('asset/image/logo.png') }}" alt="Logo" class="logo">
    
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="/login">Login</a></li>   
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
