<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class KelolaPesananController extends Controller
{
    
    public function index()
    {
        $pesanans = Pesanan::with('details')->get();
        return view('kelola-pesanan', compact('pesanans'));
    }

    public function tambah()
    {
        return view('tambah-pesanan');
    }

    public function create()
    {
        return view('kelola-pesanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'quantities' => 'required|array',
            'quantities.*' => 'nullable|integer|min:0',
            'item_names' => 'required|array',
            'prices' => 'required|array',
        ]);

        try {
            // Create a new Pesanan
            $pesanan = Pesanan::create([
                'full_name' => $request->input('fullName'),
                'address' => $request->input('address'),
                'status_pembayaran' => 'success',
            ]);

            // Create related DetailPesanans
            $quantities = $request->input('quantities');
            $item_names = $request->input('item_names');
            $prices = $request->input('prices');
            $orderDetails = '';

            foreach ($quantities as $menu_id => $quantity) {
                if ($quantity !== null && $quantity > 0) {
                    DetailPesanan::create([
                        'pesanan_id' => $pesanan->id,
                        'item_name' => $item_names[$menu_id],
                        'quantity' => $quantity,
                        'price' => $prices[$menu_id],
                    ]);

                    $orderDetails .= "Item: " . $item_names[$menu_id] . ", Quantity: " . $quantity . ", Price: " . $prices[$menu_id] . "\n";
                }
            }

            return redirect()->route('kelola-pesanan')->with('success', 'Pesanan created successfully.');
        } catch (\Exception $e) {
            // Store error message in session
            return back()->withErrors(['msg' => 'Failed to place order: ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $pesanan = Pesanan::with('details')->findOrFail($id);
        // dd($pesanan);
        return view('edit-pesanan', compact('pesanan'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'quantities' => 'required|array',
            'item_names' => 'required|array',
            'prices' => 'required|array',
        ]);

        // Update data pesanan
        $pesanan->update([
            'full_name' => $request->input('full_name'),
            'address' => $request->input('address'),
        ]);

        // Hapus detail pesanan yang sudah ada
        $pesanan->details()->delete();

        // Buat kembali detail pesanan yang baru
        foreach ($request->input('quantities') as $key => $quantity) {
            // Buat detail pesanan hanya jika kuantitas lebih dari 0
            if ($quantity > 0) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'item_name' => $request->input('item_names')[$key],
                    'quantity' => $quantity,
                    'price' => $request->input('prices')[$key],
                ]);
            }
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->route('kelola-pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('kelola-pesanan')->with('success', 'Pesanan deleted successfully.');
    }

    public function updatePaymentStatus($id)
    {
        $order = Pesanan::find($id);
        if ($order) {
            $order->status_pembayaran = 'success';
            $order->save();

            return redirect()->route('kelola-pesanan')->with('success', 'Payment status updated to success.');
        }

        return redirect()->route('kelola-pesanan')->with('error', 'Order not found.');
    }
}
