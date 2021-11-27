<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    private function getProducts()
    {
        $products = DB::table('products')->select()->get();
        return $products;
    }

    private function getCategories()
    {
        $categories = DB::table('categories')->select()->get();
        return $categories;
    }

    /**
     * Show a list of all of the application's product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->getProducts();

        return view('product.product', ['products' => $products]);
    }

    public function dish()
    {
        $products = $this->getProducts();
        $categories = $this->getCategories();

        return view('home.dish', ['products' => $products, 'categories' => $categories]);
    }

    public function details($id)
    {
        $details = DB::table('products')
            ->where('products.id', $id)
            ->join('categories', 'products.Categoria', '=', 'categories.id')
            ->select('products.*', 'categories.Nome as Categoria')
            ->first();

        return view('product.details', ['details' => $details]);
    }

    public function add()
    {
        $categories = DB::table('categories')->select()->get();
        return view('product.add', ['categories' => $categories]);
    }

    public function showUpdate($id)
    {
        $details = DB::table('products')
            ->where('id', $id)
            ->first();

        return view('product.add', ['details' => $details]);
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
            'Immagine' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Categoria' => 'required|integer'
        ]);
        $nome = $request->input('Nome');
        $descrizione = $request->input('Descrizione');
        $prezzo = $request->input('Prezzo');
        $immagine = time() . '.' . $request->Immagine->extension();
        $categoria = $request->input('Categoria');
        $request->Immagine->storeAs('public', $immagine);
        DB::table('products')->insert(['Nome' => $nome, 'Descrizione' => $descrizione, 'Prezzo' => $prezzo, 'Immagine' => $immagine, 'Categoria' => $categoria]);
        unset($request);
        return redirect(route('showProducts'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'Nome' => 'required|string',
            'Descrizione' => 'required|string',
            'Prezzo' => 'required|numeric',
            'Immagine' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Categoria' => 'required|integer'
        ]);
        $id = $request->input('id');
        $nome = $request->input('Nome');
        $descrizione = $request->input('Descrizione');
        $prezzo = $request->input('Prezzo');
        $categoria = $request->input('Categoria');
        $values = ['Nome' => $nome, 'Descrizione' => $descrizione, 'Prezzo' => $prezzo, 'Categoria' => $categoria];
        if ($request->Immagine != null) {
            $immagine = time() . '.' . $request->Immagine->extension();
            $request->Immagine->storeAs('public', $immagine);
            $values['Immagine'] = $immagine;
        }
        DB::table('products')->where('id', $id)->update($values);
        unset($request);
        return redirect(route('showProducts'));
    }

    public function delete($id)
    {
        $details = DB::table('products')
            ->where('id', $id)
            ->first();

        Storage::delete('public/' . $details->Immagine);

        DB::table('products')
            ->where('id', $id)
            ->delete();

        return redirect(route('showProducts'));
    }
}
