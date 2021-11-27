<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show a list of all of the application's product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::select('select * from products');

        return view('product', ['products' => $products]);
    }

    public function details($id)
    {
        // $details = // Product::where(function ($query) {
        $details=DB::table('products')
                ->where('id', $id)
                ->first();
        // })->get();

        return view('details', ['details' => $details]);
    }

    /**
     * Store a new product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'Nome' => 'required|string',
        //     'Descrizione' => 'required|string',
        //     'Prezzo' => 'required|string|regex:/^(?:d*.d{1,2}|d+)$/',
        //     'Immagine' => 'required|string',
        // ]);
        DB::insert('insert into products (Nome, Descrizione, Prezzo, Immagine) values (?, ?, ?, ?)', ['Carbonara', 'Piatto bello', 17.45, 'Percorso immagine']);



        //
    }
}
