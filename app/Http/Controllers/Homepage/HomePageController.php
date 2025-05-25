<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\HomepageSlider;
use App\Models\PrivacyPolcy;
use App\Models\PropertyListing;
use App\Models\Settings;
use App\Models\TermsConditions;
use App\Models\TourBooking;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

        $data['title'] = 'Welcome to OCHeaven Homes';
        $data['slider'] = HomepageSlider::findOrFail(1);
        $data['settings'] = Settings::findOrFail(1);
        $data['properties'] = PropertyListing::where('status', 1)
            ->limit(3)
            ->latest()
            ->get();
        $data['category'] = Category::where('status', 1)->get();
        $data['about'] = AboutUs::findOrFail(1);
        $data['gallery'] = Gallery::findOrFail(1);
        $data['project'] = Counter::latest()->paginate(5);
        Counter::increment('views');
        return view('homepages.index', $data);
    }

    public function aboutUs(){

        $data['title'] = 'About Us';
        $data['settings'] = Settings::findOrFail(1);
        $data['about'] = AboutUs::findOrFail(1);
        return view('homepages.about-us', $data);
    }

    public function contactUs(){

        $data['title'] = 'Contact Us';
        $data['settings'] = Settings::findOrFail(1);
        $data['about'] = AboutUs::findOrFail(1);
        return view('homepages.contact-us', $data);
    }


    public function propertyPage(){

        $propertyCount = PropertyListing::where('status', 1)->count();
        //count propery image in property_images for each property images
        $data['properties'] = PropertyListing::withCount('PropertyImages')
            ->where('status', 1)
            ->latest()
            ->paginate(9);
        $about = AboutUs::findOrFail(1);
        $data['title'] = 'Our Property Listing';
        $data['propertyCount'] = $propertyCount;
        $data['settings'] = Settings::findOrFail(1);
        $data['category'] = Category::where('status', 1)->get();
        $data['about'] = $about;
        return view('homepages.property', $data);
    }


    public function propertyDetailsPage(string $catslug, string $propertyslug)
    {
        $category = Category::where('slug', $catslug)->where('status', 1)->first();

        if ($category) {
            $data['property'] = PropertyListing::with('PropertyImages')
                ->where('catId', $category->id)
                ->where('slug', $propertyslug)
                ->where('status', 1)
                ->first(); // first() to get a single property

            if (!$data['property']) {
                return redirect()->back()->with('error', 'Property not found');
            }

            $data['title'] = 'Property Details';
            $data['about'] = AboutUs::findOrFail(1);
            $data['settings'] = Settings::findOrFail(1);
            $data['category'] = $category;

            return view('homepages.property-details', $data);
        } else {
            return redirect()->back()->with('error', 'Category not found');
        }
    }

    // Store tour book request
    public function storeTourBooking(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Sanitize inputs
        $validated['name'] = strip_tags($validated['name']);
        $validated['phone'] = strip_tags($validated['phone']);
        $validated['email'] = strip_tags($validated['email']);
        $validated['message'] = strip_tags($validated['message']);

        TourBooking::create($validated);

        return redirect()->back()->with('message', 'Tour request sent successfully!');
    }



    public function filter(Request $request)
    {
        $query = PropertyListing::withCount(['PropertyImages', 'category'])->where('status', 1);

        // Handle category by slug
        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->where('status', 1)->first();
            if ($category) {
                $query->where('catId', $category->id);
            }
        }

        if ($request->filled('state')) {
            $query->where('state', strtolower($request->state));
        }

        if ($request->filled('type')) {
            $query->where('type', strtolower($request->type));
        }

        if ($request->filled('rooms_num')) {
            $query->where('rooms_num', $request->rooms_num);
        }

        $properties = $query->latest()->paginate(9);
        $propertyCount = $properties->count();

        $category = Category::where('status', 1)->get();
        $settings = Settings::first();
        $about = AboutUs::findOrFail(1);

        $data['properties'] = $properties;
        $data['propertyCount'] = $propertyCount;
        $data['category'] = $category;
        $data['settings'] = $settings;
        $data['about'] = $about;
        $data['title'] = 'Search Results';

        return view('homepages.property', $data);
    }


    public function PrivacyPolicy(){
        $data['title'] = 'Privacy Policy';
        $data['settings'] = Settings::findOrFail(1);
        $data['privacyPolicy'] = PrivacyPolcy::findOrFail(1);
        $data['about'] = AboutUs::findOrFail(1);
        return view('homepages.privacy-policy', $data);
    }


    public function termsPage(){
        $data['title'] = 'Terms & Conditions';
        $data['about'] = AboutUs::findOrFail(1);
        $data['settings'] = Settings::findOrFail(1);
        $data['terms'] = TermsConditions::findOrFail(1);
        return view('homepages.terms-condition', $data);
    }


    public function agreementPage(){

        $data['title'] = 'Agreement Policies';

        return view('homepages.agreement', $data);
    }








}
