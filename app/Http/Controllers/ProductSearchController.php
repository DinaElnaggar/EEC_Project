<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductSearchController extends Controller
{
    use Upload_Files, ResponseTrait;


    public function index()
    {
        $products = Product::paginate(20);
        return view('CRUDS.products_search.index',compact('products'));
    }

    public function search(Request $request)
    {

        $query = $request->input('search');

        // Fetch all products if query is empty, else filter by title
        $products = $query
            ? Product::where('title', 'LIKE', "%$query%")->get()
            : Product::paginate(20);

        // Render the table rows
        $html = view('CRUDS.products_search.parts.table', compact('products'))->render();

        return response()->json(['html' => $html]);
    }




    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        $product = Product::with('pharmacies')->findOrFail($id);
        $pharmacies = $product->pharmacies()->paginate(15); // Paginate pharmacies


        return view('CRUDS.products_search.parts.show',compact('product','pharmacies'));
    }


    public function edit($id)
    {
       //
    }


    public function update(Request $request, $id)
    {
      //
    }



    public function destroy($id)
    {
        //
    }
}
