<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Seller;

use App\Models\Property;
use App\Models\Category;
use App\Models\Tags;
use App\Models\Status;
use App\Models\CategoryTags;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('seller')->get();
        return view('seller.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $tags = Tags::getTags();
        $selectedTags = old('tags', []);
        

        

        return view('seller.create', compact('tags','selectedTags'));
    }

    public function createSellerAccount()
    {
        $users = auth()->user();
       

        $seller = Seller::Where('user_id', $users->id)->first();

        if($seller)
        {
            return redirect()->route('home')->with('error', 'You already have a seller account');
        }

        $users = User::find(auth()->user()->id);

        return view('seller.account',compact('users'));
    }

    public function storeSellerAccount(Request $request)
    {
        $seller = new Seller([
            'user_id' => auth()->user()->id
        ]);

        $seller->save();
        return redirect('/seller');
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    // dd($request->all());
      
        // Validation rules
        $rules = [
            'name' => 'required|string',
            'county' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
            'category_type' => 'required|in:rent,hire',
            'price' => 'required|string',
            'duration' => 'required|string',
            'tags' => 'nullable|array', // Assuming tags is an array
        ];
        // Validate the request data


        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
       
        // Handle image upload
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        } else {
            return redirect()->back()->with('error', 'Please select an image to upload.');
        }
        $user = Auth::user();

        if($user->seller){
            $sellerId = $user->seller->id;
        }

        // Create a property
        // $property = new Property([
        //     'user_id' => auth()->user()->id,
        //     'seller_id' => $sellerId,
        //     'name' => $request->input('name'),
        //     'size' => $request->input('size'),
        //     'county' => $request->input('county'),
        //     'description' => $request->input('description'),
        //     'image_path' => $newImageName
            
        // ]);

        // $property->save();
        $properties = Property::create([
            'user_id' => auth()->user()->id,
            'seller_id' =>$sellerId,
            'name' => $request->input('name'),
            'county' => $request->input('county'),
            'size' =>$request->input('size'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            
        ]);

        // Create a category
        $propertyId = $properties->id;

        $status = new Status();
        $status->property_id = $propertyId;
        $status->save();
       
        
        
        $selectedCategory = $request->input('category_type');
        $dataToInsert = [
            'seller_id' => $sellerId,
            'property_id' => $propertyId,
            'rent' => $selectedCategory === 'rent',
            'hire' => $selectedCategory === 'hire',
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
            
        ];
        $categories = Category::create($dataToInsert);

        // Attach tags (assuming you have a many-to-many relationship)
        $adjustedTagsArray = $request->input('tags', []);
        $adjustedTagsArray = array_map(function ($id){
            return $id + 1;
        }, $adjustedTagsArray);
      
        $categories->tags()->sync($adjustedTagsArray);

        return redirect('home');

    }

    public function showProperties()
    {
        $properties = auth()->user()->properties;

        return view('seller.show', ['properties' => $properties]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::find($id);
        $tags = Tags::getTags();
        $selectedTags = [];

        if ($property->category) {
            $selectedTags = $property->category->tags->pluck('id')->toArray();
        }


        return view('seller.edit', compact('property', 'tags', 'selectedTags'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Handle image upload (similar to the create method)
    
        $property = Property::find($id);
    
        $property->update([
            'name' => $request->input('name'),
            'size' => $request->input('size'),
            'county' => $request->input('county'),
            'description' => $request->input('description'),
           
        ]);
    
        $selectedCategory = $request->input('category_type');
    
        $property->category->update([
            'rent' => $selectedCategory === 'rent',
            'hire' => $selectedCategory === 'hire',
            'price' => $request->input('price'),
            'duration' => $request->input('duration'),
        ]);
    
        // Attach tags (similar to the create method)
    
        $adjustedTagsArray = $request->input('tags', []);
        $adjustedTagsArray = array_map(function ($id){
            return $id + 1;
        }, $adjustedTagsArray);
    
        $property->tags()->sync($adjustedTagsArray);
    
        return redirect()->route('seller.dashboard')->with('success', 'Property updated successfully');
    }
    
    
    
    
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
