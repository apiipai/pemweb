@extends('layouts.adminnav')

@section('title', 'Landing Page')

@section('content')
    <header style="max-height: 125px">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            
          
    </header>
    <section id="manageOrders" class="text-center mt-5" style="margin-bottom: 450px">
        <div class="container">
            <h2>Daftar Pesanan</h2>

            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Pesanan</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody">
                    @foreach ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $pesanan->id }}</td>
                            <td>{{ $pesanan->full_name }}</td>
                            <td>{{ $pesanan->address }}</td>
                            <td>
                                @foreach ($pesanan->details as $detail)
                                    {{ $detail->item_name }} x{{ $detail->quantity }}<br>
                                @endforeach
                            </td>
                            <td>
                                @if ($pesanan->status_pembayaran == 'pending')
                                    <span class="status-box status-pending">Pending</span>
                                @elseif ($pesanan->status_pembayaran == 'success')
                                    <span class="status-box status-success">Success</span>
                                @else
                                    <span class="status-box">Unknown</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('kelola-pesanan.edit', $pesanan->id) }}" method="GET" style="display: inline-block;">
                                    <button type="submit" class="btn btn-warning btn-sm" {{ $pesanan->status_pembayaran == 'success' ? 'disabled' : '' }}>Edit</button>
                                </form>
                                <form action="{{ route('kelola-pesanan.destroy', $pesanan->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <form action="{{ route('kelola-pesanan.update-payment-status', $pesanan->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to mark this order as paid?');" {{ $pesanan->status_pembayaran == 'success' ? 'disabled' : '' }}>
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm" {{ $pesanan->status_pembayaran == 'success' ? 'disabled' : '' }}>
                                        Mark as Paid
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
