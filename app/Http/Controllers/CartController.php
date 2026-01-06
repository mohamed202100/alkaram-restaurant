<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(AddToCartRequest $request)
    {

        $item = Item::findOrFail($request->item_id);
        $cart = session()->get('cart', []);
        $quantity = $request->quantity ?? 1;

        if (isset($cart[$item->id])) {
            $cart[$item->id]['quantity'] += $quantity;
        } else {
            $cart[$item->id] = [
                'name' => $item->name,
                'quantity' => $quantity,
                'price' => $item->price,
                'image' => $item->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'تم إضافة الطبق للسلة بنجاح!');
    }

    public function update(UpdateCartRequest $request)
    {

        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:items,id'
        ]);

        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }

    public function checkout(CheckoutRequest $request)
    {
        $cart = session()->get('cart');
        
        if (!$cart) {
            return redirect()->back()->with('error', 'السلة فارغة!');
        }



        $total = 0;
        foreach ($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'address' => $request->address,
                'total_amount' => $total,
                'status' => 'pending',
                'notes' => $request->notes
            ]);

            foreach ($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'item_id' => $id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price']
                ]);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()->route('home')->with('success', 'تم إرسال طلبك بنجاح! رقم الطلب: ' . $order->id);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'حدث خطأ أثناء إرسال الطلب: ' . $e->getMessage());
        }
    }
}
