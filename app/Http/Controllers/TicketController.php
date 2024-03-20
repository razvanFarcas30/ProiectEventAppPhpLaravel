<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{ 
    public function index()
    {
        $tickets = Ticket::all();
        return view('cos.tickets', compact('tickets'));
    }

    public function cart()
    {
        return view('cos.cart');
    }

    public function addToCart($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if the cart is empty, add the first ticket
        if (!$cart) {
            $cart = [
                $id => [
                    "tip_bilet" => $ticket->tip_bilet . " - " . $ticket->event->nume,
                    "quantity" => 1,
                    "pret" => $ticket->pret,
                    
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'ticket adaugat cu succes in cos!');
        }

        // if the cart is not empty, check if the ticket exists to increment the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'ticket adaugat cu succes in cos!');
        }

        // if the item does not exist in the cart, add it to the cart with quantity = 1
        $cart[$id] = [
            "tip_bilet" => $ticket->tip_bilet,
            "quantity" => 1,
            "pret" => $ticket->pret,
            
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'ticket adaugat cu succes in cos!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cos modificat cu succes');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'ticket sters cu succes!');
        }
    }
}
