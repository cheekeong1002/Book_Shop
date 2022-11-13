<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Cart;
use DB;

class BookController extends Controller
{
    function getBookData(){
        if (session()->has('bookSearched')){
            session()->remove('bookSearched');
        }

        $isbn = "";
        $rowNum = 1;
        $bookCount = Book::where('quantity', '>=', '0')->get();
        $maxPageNum = (count($bookCount) / 5);
        if (is_int($maxPageNum)){
            $maxPageNum = intdiv(count($bookCount), 5);
        }else{
            $maxPageNum = intdiv(count($bookCount), 5) + 1;
        }

        $bookInfos = Book::where('quantity', '>=', '0')->take(5)->get();

        foreach ($bookInfos as $bookInfo){
            $bookInfo->frontCover = base64_encode($bookInfo->frontCover);
            $isbn = "isbn" . $rowNum;
            session()->put($isbn, $bookInfo->ISBN);
            $rowNum++;
        }
        
        session()->put('currentPage', '1');
        session()->put('maxPageNum', $maxPageNum);

        $cartIconInfo = $this->getCartIconInfo();

        return view('home', ['data'=>$bookInfos, 'cartIconInfo'=>$cartIconInfo]);
    }

    function getNextPage(){
        $isbn = "";
        $rowNum = 1;
        $currentPage = session()->get('currentPage') + 1;

        if (session()->has('bookSearched')){
            $bookCount = Book::where([['quantity', '>=', '0'], ['bookName', '=', session()->get('bookSearched')]])->get();
        }else{
            $bookCount = Book::where('quantity', '>=', '0')->get();
        }

        $maxPageNum = (count($bookCount) / 5);
        if (is_int($maxPageNum)){
            $maxPageNum = intdiv(count($bookCount), 5);
        }else{
            $maxPageNum = intdiv(count($bookCount), 5) + 1;
        }

        if ($currentPage > $maxPageNum){
            session()->put('currentPage', 1);
            session()->put('maxPageNum', $maxPageNum);
            
            return redirect('/displayCurrentPage');

        }else{
            session()->put('currentPage', $currentPage);
            session()->put('maxPageNum', $maxPageNum);
            
            return redirect('/displayCurrentPage');
        }
    }

    function getPreviousPage(){
        $isbn = "";
        $rowNum = 1;
        $currentPage = session()->get('currentPage') - 1;

        if (session()->has('bookSearched')){
            $bookCount = Book::where([['quantity', '>=', '0'], ['bookName', '=', session()->get('bookSearched')]])->get();
        }else{
            $bookCount = Book::where('quantity', '>=', '0')->get();
        }

        $maxPageNum = (count($bookCount) / 5);
        if (is_int($maxPageNum)){
            $maxPageNum = intdiv(count($bookCount), 5);
        }else{
            $maxPageNum = intdiv(count($bookCount), 5) + 1;
        }

        if ($currentPage <= 0){
            session()->put('currentPage', $maxPageNum);
            session()->put('maxPageNum', $maxPageNum);
            
            return redirect('/displayCurrentPage');

        }else{
            session()->put('currentPage', $currentPage);
            session()->put('maxPageNum', $maxPageNum);
    
            return redirect('/displayCurrentPage');
        }
    }

    function addToCart1(){
        return $this->storeAddToCartDetails(session()->get('isbn1'));
    }

    function addToCart2(){
        return $this->storeAddToCartDetails(session()->get('isbn2'));
    }

    function addToCart3(){
        return $this->storeAddToCartDetails(session()->get('isbn3'));
    }

    function addToCart4(){
        return $this->storeAddToCartDetails(session()->get('isbn4'));
    }

    function addToCart5(){
        return $this->storeAddToCartDetails(session()->get('isbn5'));
    }

    function storeAddToCartDetails($isbn){
        $bookInfo = Book::where('ISBN', '=', $isbn)->first();
        $cartInfo = Cart::where([
            ['username', '=', session()->get('LoggedUser')],
            ['ISBN', '=', $isbn]
        ])->first();
            
        //book already added before
        if ($cartInfo){
            if ($cartInfo->quantity >= $bookInfo->quantity){
                return redirect('/displayCurrentPage')->with('fail', "Failed to add book: You have added the maximum quantity available for this book!");
            }else{
                DB::table('carts')
            ->where([['username', '=', session()->get('LoggedUser')], ['ISBN', '=', $isbn]])
            ->update(['quantity' => $cartInfo->quantity + 1]);
            
            return redirect('/displayCurrentPage')->with('success', 'Book with title: "' . $bookInfo->bookName . '" Added to cart!');
            }

        }else{ //before has not been added before
            $cart = new Cart;
            $cart->username = session()->get('LoggedUser');
            $cart->ISBN = $isbn;
            $cart->quantity = 1;
            $save = $cart->save();

            if($save){
                return redirect('/displayCurrentPage')->with('success', 'Book with title: "' . $bookInfo->bookName . '" Added to cart!');
            }else{
                return redirect('/displayCurrentPage')->with('fail', 'Book failed to be added!');
            }
        }
    }

    function displayCurrentPage(){
        $isbn = "";
        $rowNum = 1;

        $counter = '0';
        $bookInfo = [];

        if (session()->has('bookSearched')){
            $bookInfos = Book::where([['quantity', '>=', '0'], ['bookName', '=', session()->get('bookSearched')]])->get();
        }else{
            $bookInfos = Book::where('quantity', '>=', '0')->get();
        }
        
        foreach ($bookInfos as $book){
            $counter++;
            if ($counter > ((session()->get('currentPage') - 1) * 5) && ($counter <= (session()->get('currentPage') * 5))){
                $book->frontCover = base64_encode($book->frontCover);
                array_push($bookInfo, $book);
                $isbn = "isbn" . $rowNum;
                session()->put($isbn, $book->ISBN);
                $rowNum++;
            }
        }

        $cartIconInfo = $this->getCartIconInfo();

        return view('home', ['data'=>$bookInfo, 'cartIconInfo'=>$cartIconInfo]);
    }

    function getCartIconInfo(){
        $totalQuantity = 0;
        $totalPrice = 0;
        $userCartInfo = Cart::where('username', '=', session()->get('LoggedUser'))->get();
        
        foreach ($userCartInfo as $cartDetail){
            $bookInfo = Book::where('ISBN', '=', $cartDetail->ISBN)->first();
            $totalQuantity = $totalQuantity + $cartDetail->quantity;
            $totalPrice = $totalPrice + ($cartDetail->quantity * $bookInfo->retailPrice);
        }

        $cartIconInfo = [$totalQuantity, $totalPrice];

        return ($cartIconInfo);
    }

    function searchBook(Request $request){      
        $bookName = $request->bookName;

        $isbn = "";
        $currentPage = 1;
        $bookCount = Book::where('bookName', '=', $bookName)->get();
        $maxPageNum = (count($bookCount) / 5);
        if (is_int($maxPageNum)){
            $maxPageNum = intdiv(count($bookCount), 5);
        }else{
            $maxPageNum = intdiv(count($bookCount), 5) + 1;
        }

        session()->put('currentPage', 1);
        session()->put('maxPageNum', $maxPageNum);
        session()->put('bookSearched', $bookName);
        return redirect('/displayCurrentPage');
    }
}
