<?php

namespace App\Http\Controllers;

use App\Http\Requests\PharmacyRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\Upload_Files;
use App\Models\Pharmacy;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PharmacyController extends Controller
{
    use Upload_Files, ResponseTrait;


    public function index()
    {
        $pharmacies = Pharmacy::paginate(20);
        return view('CRUDS.pharmacy.index',compact('pharmacies'));
    }


    public function create()
    {

        return view('CRUDS.pharmacy.parts.create');

    }



    public function store(PharmacyRequest $request)
    {
        try {
            $data = $request->validated();



            // Save the product
            Pharmacy::create([
                'name' => $data['name'] ,
                'address' => $data['address'],
            ]);

            if ($request->ajax()) {
                return response()->json(['status' => true, 'message' => 'Pharmacy created successfully!']);
            }

            return redirect()->route('pharmacies.index')->with('success', 'Pharmacy created successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['status' => false, 'message' => 'An error occurred. Please try again.'], 500);
            }

            return redirect()->route('pharmacies.index')->with('error', 'An error occurred. Please try again.');
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $row = Pharmacy::findOrFail($id);
        return view('CRUDS.pharmacy.parts.edit',compact('row'));

    }


    public function update(PharmacyRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $pharmacy = Pharmacy::findOrFail($id);

            // Update the product
            $pharmacy->update([
                'name' => $data['name'],
                'address' => $data['address'],
            ]);

            if ($request->ajax()) {
                return response()->json(['status' => true, 'message' => 'Pharmacy Updated successfully!']);
            }

            return redirect()->route('pharmacies.index')->with('success', 'Pharmacy Updated successfully!');
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json(['status' => false, 'message' => 'An error occurred. Please try again.'], 500);
            }

            return redirect()->route('pharmacies.index')->with('error', 'An error occurred. Please try again.');
        }
    }



    public function destroy($id)
    {
        try {
            $pharmacy = Pharmacy::findOrFail($id);

            // Delete the product
            $pharmacy->delete();

            return $this->deleteResponse();
        } catch (\Exception $e) {
            return $this->deleteResponse(false);
        }
    }
}
