<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use Upload_Files, ResponseTrait;


    public function index()
    {
        $products = Product::paginate(20); // Adjust the number of items per page
        return view('CRUDS.product.index',compact('products'));
    }


    public function create()
    {

        return view('CRUDS.product.parts.create');

    }



    public function store(ProductRequest $request)
    {
        try {
            $data = $request->validated();

            // Handle file upload
            if ($request->hasFile('image')) {
                $data['image'] = $this->uploadFiles('products', $request->file('image'), null);
            }

            // Save the product
            Product::create([
                'image' => $data['image'] ?? null,
                'title' => $data['title'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'desc' => $data['desc'],
            ]);

            if ($request->ajax()) {
                return response()->json(['status' => true, 'message' => 'Product created successfully!']);
            }

            return redirect()->route('products.index')->with('success', 'Product created successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['status' => false, 'message' => 'An error occurred. Please try again.'], 500);
            }

            return redirect()->route('products.index')->with('error', 'An error occurred. Please try again.');
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = Product::findOrFail($id);
        return view('CRUDS.product.parts.edit',compact('row'));

    }


    public function update(ProductRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $product = Product::findOrFail($id);

            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                // Upload the new image
                $data['image'] = $this->uploadFiles('products', $request->file('image'), null);
            }

            // Update the product
            $product->update([
                'image' => $data['image'] ?? $product->image,
                'title' => $data['title'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'desc' => $data['desc'],
            ]);

            if ($request->ajax()) {
                return response()->json(['status' => true, 'message' => 'Product Updated successfully!']);
            }

            return redirect()->route('products.index')->with('success', 'Product Updated successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['status' => false, 'message' => 'An error occurred. Please try again.'], 500);
            }

            return redirect()->route('products.index')->with('error', 'An error occurred. Please try again.');
        }
    }



    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Delete the image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Delete the product
            $product->delete();

            return $this->deleteResponse();
        } catch (\Exception $e) {
            return $this->deleteResponse(false);
        }
    }
}
