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
        $products = DB::table('products')->select()->get();

        return view('product', ['products' => $products]);
    }

    public function details($id)
    {
        $details = DB::table('products')
            ->where('id', $id)
            ->first();

        return view('details', ['details' => $details]);
    }

    public function add()
    {
        return view('add');
    }

    /**
     * Store a new product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string',
            'Descrizione' => 'required|string',
            'Prezzo' => 'required|numeric',
            'Immagine' => 'required|string',
        ]);
        $nome = $request->input('Nome');
        $descrizione = $request->input('Descrizione');
        $prezzo = $request->input('Prezzo');
        $immagine = $request->input('Immagine');
        DB::table('products')->insert(['Nome' => $nome, 'Descrizione' => $descrizione, 'Prezzo' => $prezzo, 'Immagine' => $immagine]);
        unset($request);
        return redirect(route('showProducts'));
    }
}
