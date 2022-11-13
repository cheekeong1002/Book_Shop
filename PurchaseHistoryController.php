<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Cart;
use App\Models\PurchaseHistory;
use DB;

class PurchaseHistoryController extends Controller
{
    //
    function viewPurchaseHistory() {
        $userName=session()->get('LoggedUser');
        $purchaseHistoryInfo = PurchaseHistory::where('username', '=', $userName)->get();
        $purchaseHistoryData = [];
        $purchaseHistoryItem = [];
        $temp_id = '';

        foreach($purchaseHistoryInfo as $purchaseHistory){
            $bookName = $purchaseHistory->bookName;
            $quantity = $purchaseHistory->quantity;
            $date = $purchaseHistory->created_at;
            $previousID = $temp_id;
            $purchaseHistoryData = [$bookName, $quantity, $date, $previousID];
            array_push($purchaseHistoryItem,$purchaseHistoryData);
            $temp_id = $purchaseHistory->created_at;
        }

        return view('purchaseHistory', ['purchaseHistory'=>$purchaseHistoryItem]);
    }
}
