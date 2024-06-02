@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')
    <header style="max-height: 125px">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </header>

    <section id="menu" class="text-center mt-5">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            
        <form id="orderForm" action="{{ route('pesanan.store') }}" method="POST">
            @csrf
            <div id="menuItems" class="menu-container">
                <div class="menu-item">
                    <img src="asset/image/menu1.png" style="width: 150px;" alt="Menu 1" class="menu-image">
                    <div class="menu-details">
                        <h3>Tobread Orisinil</h3>
                        <p>Description: Toast bread, roasted butter sugar, with milk kental.</p>
                        <p>Price: 12K</p>
                        <input type="number" name="quantities[1]" class="menu-quantity" data-price="12000" min="0">
                        <input type="hidden" name="item_names[1]" value="Tobread Orisinil">
                        <input type="hidden" name="prices[1]" value="12000">
                    </div>
                </div>
                <div class="menu-item">
                    <img src="asset/image/menu2.png" style="width: 150px;" alt="Menu 2" class="menu-image">
                    <div class="menu-details">
                        <h3>Tobread Nyoklay</h3>
                        <p>Description: Toast bread, roasted butter sugar, with milk kental, and slay nyoklat.</p>
                        <p>Price: 12K</p>
                        <input type="number" name="quantities[2]" class="menu-quantity" data-price="12000" min="0">
                        <input type="hidden" name="item_names[2]" value="Tobread Nyoklay">
                        <input type="hidden" name="prices[2]" value="12000">
                    </div>
                </div>
                <div class="menu-item">
                    <img src="asset/image/menu3.png" style="width: 150px;" alt="Menu 3" class="menu-image">
                    <div class="menu-details">
                        <h3>Tobread Stobelly</h3>
                        <p>Description: Toast bread, roasted butter sugar, with milk kental, and slay strobelly.</p>
                        <p>Price: 12K</p>
                        <input type="number" name="quantities[3]" class="menu-quantity" data-price="12000" min="0">
                        <input type="hidden" name="item_names[3]" value="Tobread Stobelly">
                        <input type="hidden" name="prices[3]" value="12000">
                    </div>
                </div>
                <div class="menu-item">
                    <img src="asset/image/menu4.png" style="width: 150px;" alt="Menu 4" class="menu-image">
                    <div class="menu-details">
                        <h3>Tobread Blebercis</h3>
                        <p>Description: Toast bread, roasted butter sugar, with milk kental, and slay blueberry krimcis.</p>
                        <p>Price: 12K</p>
                        <input type="number" name="quantities[4]" class="menu-quantity" data-price="12000" min="0">
                        <input type="hidden" name="item_names[4]" value="Tobread Blebercis">
                        <input type="hidden" name="prices[4]" value="12000">
                    </div>
                </div>
            </div>

            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required><br/>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br/>
            
            <button type="submit" id="checkout" style="margin-bottom: 100px;">Checkout</button>
        </form> 
    </section>    
    
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('orderForm');

            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault(); // Prevent form submission
                    form.reportValidity(); // Show validation messages
                }
            });
        });
    </script>
@endsection
