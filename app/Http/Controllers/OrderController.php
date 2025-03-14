<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function allOrders(){
        $orders = Order::all();
        return view('order', compact('orders'));
    }

    public function store(){
        if(Auth::check())
            $userId = session()->get('user_id');
        else
            redirect('/register');

        $ord1 = new Order(['user_id' => 1, 'prix_order' => 199.99, 'number_items' => 3, 'addres_id' => 1]);
        $ord1->save();
        $ord1->id;
        $paniy = session()->get('paniy');
        $ord1 = Order::find(1);
        $ord1->products()->attach([7,6]);
    
    }
}
