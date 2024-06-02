<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('details')->get();
        return view('pesanan', compact('pesanans'));
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

            // Format WhatsApp message
            $whatsappMessage = urlencode("New Order:\nName: " . $request->input('fullName') . "\nAddress: " . $request->input('address') . "\n\nOrder Details:\n" . $orderDetails);

            // Redirect to WhatsApp URL with the formatted message
            return redirect()->away("https://wa.me/+628977915369?text=$whatsappMessage");
        } catch (\Exception $e) {
            // Store error message in session
            return back()->withErrors(['msg' => 'Failed to place order: ' . $e->getMessage()]);
        }
    }

}
