<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Seller;
use App\Models\Category;
use App\Models\Status;
use App\Models\Tags;
use App\Models\CategoryTags;
use Illuminate\Support\Facades\Auth; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index()
    {   
        $properties = Property::whereHas('status', function($query){
            $query->whereNotIn('status', ['bought','unavailable']);
        })->with('propertyCategory', 'status')
        ->paginate(10);

        // dd($properties);
        return view('properties.index',[
            'properties' => $properties,
            
        ]);
    }

    public function showProperties(string $id)
    {   
       
        $properties = Property::find($id);
       

        return view('properties.show-properties')->with('property', $properties);
    }
     

    public function filterProperties(Request $request)
    {
        $filterValue = $request->input('filter_value');

        // Query the properties based on the filter value
        $properties = Property::where('category', 'like', "%$filterValue%")
            ->orWhere('tags', 'like', "%$filterValue%")
            ->orWhere('price', 'like', "%$filterValue%")
            ->orWhere('county', 'like', "%$filterValue%")
            ->get();

        return view ('properties.index', compact('properties'));








   
}}


    /**
     * Show the form for creating a new resource.
     */
   
