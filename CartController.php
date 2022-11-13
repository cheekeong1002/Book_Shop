<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;
use DB;

class CartController extends Controller
{
    function viewCart(){
        $userName=session()->get('LoggedUser');
        $cartInfo=Cart::where('username','=',$userName)->get();     
        $bookData=[];
        $cartItem=[];
        $totalPrice = 0;

        foreach($cartInfo as $cart){
            $bookDetails=Book::where('ISBN','=',$cart->ISBN)->first();
            $isbn=$bookDetails->ISBN;
            $bookName=$bookDetails->bookName;
            $frontCover=base64_encode($bookDetails->frontCover);
            $bookPrice=$bookDetails->retailPrice;
            $quantity=$cart->quantity;
            $bookData=[$frontCover,$bookName,$bookPrice,$quantity,$isbn];
            array_push($cartItem,$bookData);
            $totalPrice = $totalPrice + ($bookPrice*$quantity);
        }

        return view('cart',['cartItem'=>$cartItem, 'totalPrice'=>$totalPrice]);
    }

    public function deleteBookInCart($isbn){ 
        $userName=session()->get('LoggedUser');
        $bookInfo = Book::where('ISBN', '=', $isbn)->first();
        $deleteFromCart = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->delete();
        if ($deleteFromCart){
            return redirect('/viewCart')->with('success', 'Book with title: "' . $bookInfo->bookName . '" is deleted from cart!');
        }
        else{
            return redirect('/viewCart')->with('fail', 'Book with title: "' . $bookInfo->bookName . '" is not deleted from cart!');
        }
    }

    function incrementBook($isbn){
        $userName=session()->get('LoggedUser');
        $cartInfo = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->first();
        $bookInfo = Book::where('ISBN', '=', $isbn)->first();

        if($bookInfo->quantity>$cartInfo->quantity){
            $incrementBook = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->update(['quantity' => $cartInfo->quantity + 1]);
            if ($incrementBook){
                return back();
            }
            else{
                return back();
            }
        }

        if ($cartInfo->quantity>$bookInfo->quantity){
            $maxQuantity = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->update(['quantity' => $bookInfo->quantity]);
            if ($maxQuantity){
                return back();
            }
            else{
                return back();
            }
        }

        return redirect('/viewCart')->with('fail', 'Book with title: "' . $bookInfo->bookName . '" has reached max quantity available!');
    }

    function decrementBook($isbn){
        $userName=session()->get('LoggedUser');
        $cartInfo = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->first();
        $bookInfo = Book::where('ISBN','=',$isbn)->first();

        if ($cartInfo->quantity>$bookInfo->quantity){
            $maxQuantity = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->update(['quantity' => $bookInfo->quantity]);
            if ($maxQuantity){
                return back();
            }
            else{
                return back();
            }
        }

        if($cartInfo->quantity>1){
            $decrementBook = Cart::where([['username','=',$userName],['ISBN', '=', $isbn]])->update(['quantity' => $cartInfo->quantity - 1]);
            if ($decrementBook){
                return back();
            }
            else{
                return back();
            }
        }

        return back()->with('fail', 'Click the "Delete" button to delete the book from cart!');
    }

    function clearCart(){
        $userName=session()->get('LoggedUser');
        $cartContent= Cart::where('username','=',$userName)->count();
        if ($cartContent>0)
        {
            $userInfo= Cart::where('username','=',$userName)->delete();
            return redirect('')->with('success', 'Successfully clear entire cart!');
        }
        return redirect('')->with('fail', 'Your cart is empty!');

    }
}
