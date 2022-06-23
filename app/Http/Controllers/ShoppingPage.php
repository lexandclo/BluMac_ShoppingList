<?php

namespace App\Http\Controllers;

use App\Models\ShoppingItem;
use Illuminate\Http\Request;

class ShoppingPage extends Controller
{   
    /*
    / View all shopping list $shoppingitems
    */
    public function index()
    {
        $shoppingitems = ShoppingItem::all();
        //dd($shoppingitems);
        return view('listpage',compact('shoppingitems'));
    }

    /*
    / validate fields
    / create item 
    / message
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty'  => 'required|integer',
        ]);

        ShoppingItem::create($request->all());

        return redirect('/')
            ->with('success','Shopping item Added successfully.');
    }

    /*
    / delete item 
    */  
    public function destroy(ShoppingItem $shoppingitem)
    {
        $shoppingitem->delete();

        return redirect('/')
            ->with('success','Shopping item  deleted successfully');
    }




}
