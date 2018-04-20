<?php

namespace App\Http\Controllers\TempBill;

use App\Model\TempBillItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    public function addProduct( Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required',
            'item_type' => 'required',
            'item_quantity' => "required_if:item_type,==,box",
            'item_price' => 'required',
        ]);

        $insert = ['item_name'=>$request->item_name,
            'item_type'=>$request->item_type,
            'item_quantity'=>$request->item_quantity,
            'item_price'=>$request->item_price,
            'created_at'=>Carbon::now()];

        TempBillItem::insert($insert);

        return back()->with('status', 100)->with('message', 'Item added successfully.');
    }
}
