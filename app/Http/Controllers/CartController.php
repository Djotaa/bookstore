<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    public  function index(Request $request) {

                if(session()->has('user') && session()->get('user')->role->role_name == 'user'){
                    try {
                        $bookId = $request->get("bookId");

                        if(!$request->session()->has("cart")) {
                            $request->session()->put("cart", []);
                        }

                        $book = Book::find($bookId);
                        $cart = $request->session()->get("cart");

                        if(isset($cart[$bookId])) {
                            $alreadyInCart = $cart[$bookId];

                            $alreadyInCart->quantity++;

                            $cart[$bookId] = $alreadyInCart;
                        } else {
                            $item = new \stdClass();
                            $item->bookId = $bookId;
                            $item->quantity = 1;
                            $item->price = $book->price;
                            $item->image = $book->image;
                            $item->name = $book->book_name;
                            $cart[$bookId] = $item;
                        }

                        $request->session()->put("cart", $cart);
                        Activity::create([
                            'type'=>'Added item to cart',
                            'user_name'=>session()->get('user')->name
                        ]);
                        echo "uspeh";

                    } catch(\Exception $e) {
                        echo "greska";
                    }
                }
                elseif(session()->has('user') && session()->get('user')->role->role_name == 'admin'){
                    echo 'adminje';
                }
                else{
                    echo 'gostje';
                }

    }

    public  function adjustQuantity(Request $request) {
        if(session()->get('user')->role->role_name == 'admin'){
            return redirect()->back();
        }
        $bookId = $request->get("bookId");
        $quantity = $request->get("quantity");

        $cart = $request->session()->get("cart");

        if(isset($cart[$bookId])) {
            $alreadyInCart = $cart[$bookId];

            $alreadyInCart->quantity = $quantity;

            $cart[$bookId] = $alreadyInCart;

            $request->session()->put("cart", $cart);
        }

    }

    public function get(Request $request) {
        if(session()->get('user')->role->role_name == 'admin'){
            return redirect()->back();
        }
        $cart = $request->session()->get("cart");
        if(!$cart) {
            $cart = [];
        }

        return view("pages.books.cart", [
            "cartItems" => $cart ]);
    }

    public  function remove($bookId, Request  $request) {
        if(session()->get('user')->role->role_name == 'admin'){
            return redirect()->back();
        }
        $cart = $request->session()->get("cart");
        if(isset($cart[$bookId])) {
            unset($cart[$bookId]);
            Activity::create([
                'type'=>'Removed item from cart',
                'user_name'=>session()->get('user')->name
            ]);
            $request->session()->put("cart", $cart);
        }
    }

    public function checkout(){
        if(session()->get('user')->role->role_name == 'admin'){
            return redirect()->back();
        }
        Activity::create([
            'type'=>'Checked out',
            'user_name'=>session()->get('user')->name
        ]);
        session()->forget('cart');
        return redirect()->back()->with('msg','true');
    }
}
