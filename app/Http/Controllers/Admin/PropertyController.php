<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Category;
use App\Models\PropertyImage;
use App\Models\PropertyListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PropertyController extends Controller
{
    public function index()
    {
        $data['title'] = 'OCHeaven Home Properties';
        $data['property'] = PropertyListing::latest()->get();
        return view('admin.property.index', $data);
    }

    public function CreateProperty(){
        $user = Auth::user();
        $userId = $user->id;
        $data['title'] = 'Create New Property';
        $data['userId'] = $userId;
        $data['category'] = Category::orderBy('id', 'ASC')->where('status','1')->get();
        return view('admin.property.create', $data);
    }

    public function StoreProperty(PropertyFormRequest $request){
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['catId']);
        $property= $category->property()->create([
            'catId' => $validatedData['catId'],
            'userId' => $validatedData['userId'],
            'property_name' => $validatedData['property_name'],
            'slug' => Str::slug($validatedData['slug']),
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'type' => $validatedData['type'],
            'square_ft' => $validatedData['square_ft'],
            'address' => $validatedData['address'],
            'country' => $validatedData['country'],
            'state' => $validatedData['state'],
            'city' => strtolower($validatedData['city']),
            'master_bedrooms_num' => $validatedData['master_bedrooms_num'],
            'bathrooms_num' => $validatedData['bathrooms_num'],
            'rooms_num' => $validatedData['rooms_num'],
            'service_charge' => $validatedData['service_charge'],
            'listing' => $request->has('listing') ? '1' : '0',
            'status' => $request->has('status') ? '1' : '0',
            'availability' => $request->input('availability'),
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if($request->hasFile('image'))
        {
            $uploadPath = 'uploads/property';

            $j = 1;
            foreach($request->file('image') as $ImageFile){
                $extension = $ImageFile->getClientOriginalExtension();
                $filename = time().$j++.'.'.$extension;
                $ImageFile->move($uploadPath,$filename);
                $finalImagePathName = $filename;

                $property->PropertyImages()->create([
                    'propertyId' => $property->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect()->route('admin.properties')->with('message', 'Property Added Successfully');
    }



    //function to edit products
    public function EditProperty(int $propertyId){
        $property=$data['property'] = PropertyListing::findOrFail($propertyId);
        $user = Auth::user();
        $userId = $user->id;
        if($property){
            $data['title'] = 'Edit/Update Property';
            $data['userId'] = $userId;
            $data['category'] = Category::where('status','1')->get();
            return view('admin.property.edit', $data);
        }
        else{
            return redirect()->back()->with('error', 'ID not Found');
        }
    }


    //Update the property
    public function UpdateProperty(PropertyFormRequest $request, int $propertyId){
        $validatedData = $request->validated();

        $property = PropertyListing::findOrFail($propertyId);;
        if($property){
            $property->update([
                'catId' => $validatedData['catId'],
                'userId' => $validatedData['userId'],
                'property_name' => $validatedData['property_name'],
                'slug' => Str::slug($validatedData['property_name']),
                'price' => $validatedData['price'],
                'description' => $validatedData['description'],
                'type' => $validatedData['type'],
                'square_ft' => $validatedData['square_ft'],
                'address' => $validatedData['address'],
                'country' => $validatedData['country'],
                'state' => $validatedData['state'],
                'city' => strtolower($validatedData['city']),
                'master_bedrooms_num' => $validatedData['master_bedrooms_num'],
                'bathrooms_num' => $validatedData['bathrooms_num'],
                'rooms_num' => $validatedData['rooms_num'],
                'service_charge' => $validatedData['service_charge'],
                'listing' => $request->has('listing') ? '1' : '0',
                'status' => $request->has('status') ? '1' : '0',
                'availability' => $request->input('availability'),
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);


            if($request->hasFile('image'))
            {
                $uploadPath = 'uploads/property';

                $j = 1;
                foreach($request->file('image') as $ImageFile){
                    $extension = $ImageFile->getClientOriginalExtension();
                    $filename = time().$j++.'.'.$extension;
                    $ImageFile->move($uploadPath,$filename);
                    $finalImagePathName = $filename;

                    $property->PropertyImages()->create([
                        'propertyId' => $property->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            return redirect()->back()->with('message', 'Property Updated Successfully');

        }
        else{
            return redirect()->route('admin.properties')->with('error', 'Property ID Not Found');
        }
    }


     //Delete property image
     public function DestroyPropertyImage(int $productImageId){
        $propertyImage = PropertyImage::findOrFail($productImageId);
        if(File::exists($propertyImage->image)){
            File::delete($propertyImage->image);
        }
        $propertyImage->delete();
        return redirect()->back()->with('message', 'Image Deleted Successfully');
    }



    public function DestroyProperty(int $propertyId){
        $property = PropertyListing::findOrFail($propertyId);
        if($property->PropertyImages){
            foreach($property->PropertyImages as $image){
                $imagePath = public_path('uploads/property/' . $image->image);
                if(File::exists($imagePath)){
                    File::delete($imagePath);
                }
            }
        }
        $property->delete();
        return redirect()->back()->with('message', 'Property Data Deleted Successfully');

    }

}
