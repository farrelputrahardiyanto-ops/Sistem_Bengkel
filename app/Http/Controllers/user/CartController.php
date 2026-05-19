<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\CartsItem;
use App\Models\Sales;
use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CartController extends Controller
{
    // HALAMAN CART
    public function index()
    {
        $cart = Carts::with('items.sparepart')
            ->where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();

        return view('pages.user.cart.index', compact('cart'));
    }

    // ADD TO CART
    public function add(Request $request)
    {
        $request->validate([
            'sparepart_id' => 'required|exists:t_spareparts,id'
        ]);

        $sparepart = Sparepart::findOrFail($request->sparepart_id);

        // cari cart aktif
        $cart = Carts::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'active'
            ]
        );

        // cek item sudah ada?
        $item = CartsItem::where('cart_id', $cart->id)
            ->where('sparepart_id', $sparepart->id)
            ->first();

        if ($item) {

            $item->increment('qty');

        } else {

            CartsItem::create([
                'cart_id'      => $cart->id,
                'sparepart_id' => $sparepart->id,
                'qty'          => 1,
                'price'        => $sparepart->price
            ]);
        }

        return back()->with('success', 'Berhasil ditambahkan ke cart');
    }

    // UPDATE QTY
    public function update(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        $item = CartsItem::findOrFail($id);

        $item->update([
            'qty' => $request->qty
        ]);

        return back();
    }

    // DELETE ITEM
    public function delete($id)
    {
        CartsItem::findOrFail($id)->delete();

        return back()->with('success', 'Item dihapus');
    }

    public function checkout()
{
    $cart = Carts::with('items.sparepart')
        ->where('user_id', Auth::id())
        ->where('status', 'active')
        ->first();

    if (!$cart || !$cart->items->count()) {

        return redirect()
            ->route('cart.index')
            ->with('error', 'Cart kosong');
    }

    $total = 0;

    foreach ($cart->items as $item) {

        $total += $item->qty * $item->price;
    }

    return view('pages.user.checkout.index', compact('cart', 'total'));
}

public function processCheckout()
{
    $cart = Carts::with('items.sparepart')
        ->where('user_id', Auth::user()->id)
        ->where('status', 'active')
        ->first();

    if (!$cart || !$cart->items->count()) {

        return back();
    }

    $total = 0;

    foreach ($cart->items as $item) {

        $total += $item->qty * $item->price;
    }

    // CONFIG MIDTRANS
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = true;
    Config::$is3ds = true;


    // SAVE SALES
    $sale = Sales::create([

        'user_id' => Auth::user()->id,

        'total_parts' => $cart->items->sum('qty'),

        'total_price' => $total,

        'status' => 'pending'
    ]);

    $params = [

        'transaction_details' => [

            'order_id' => 'ORDER-'.$sale->id.'-'.time(),

            'gross_amount' => $total,
        ],

        'customer_details' => [

            'first_name' => Auth::user()->name,

            'email' => Auth::user()->email,
        ],
    ];

    $snapToken = Snap::getSnapToken($params);

    return view('pages.user.checkout.payment', compact('snapToken'));
}
}