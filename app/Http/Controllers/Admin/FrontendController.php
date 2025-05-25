<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Gallery;
use App\Models\HomepageSlider;
use App\Models\PrivacyPolcy;
use App\Models\TermsConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function galleryPagx(){
        $data['title'] = 'Property Gallery Settings';
        $data['gallery'] = Gallery::find(1);
        return view('admin.gallery.index', $data);
    }

    //Gallery settings
    public function Store(Request $request)
    {
        $images = ['image1', 'image2', 'image3', 'image4', 'image5', 'image6'];

        // Validate
        $rules = array_fill_keys($images, 'nullable|image|mimes:jpeg,png,jpg|max:2048');
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }

        $gallery = Gallery::find(1) ?? new Gallery();

        foreach ($images as $imageField) {
            if ($request->hasFile($imageField)) {
                // Delete old file if exists
                if ($gallery->exists && $gallery->$imageField) {
                    $oldPath = 'uploads/gallery/' . $gallery->$imageField;
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }

                // Upload new file
                $file = $request->file($imageField);
                $filename = $imageField . time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/gallery/', $filename);

                // Update model
                $gallery->$imageField = $filename;
            }
        }

        $gallery->save();

        return redirect()->back()->with('message', $gallery->wasRecentlyCreated
            ? 'Gallery Created Successfully'
            : 'Gallery Updated Successfully');
    }

    //Hero slider settings
    public function sliderPage(){
        $data['title'] = 'Hero Slider Settings';
        $data['slider'] = HomepageSlider::find(1);
        return view('admin.slider.index', $data);
    }


    public function StoreTopSlider(Request $request)
    {
        $rules = [];
        foreach ([1, 2, 3] as $i) {
            $rules["slider{$i}_h5"] = 'nullable|string';
            $rules["slider{$i}_h1"] = 'required|string';
            $rules["slider{$i}_quick_info"] = 'required|string';
            $rules["slider{$i}_image"] = 'nullable|mimes:png,jpg,jpeg';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }

        $settings = HomepageSlider::firstOrNew(['id' => 1]);

        foreach ([1, 2, 3] as $i) {
            foreach (['h5', 'h1', 'quick_info'] as $note) {
                $field = "slider{$i}_{$note}";
                if ($request->has($field)) {
                    $settings->$field = $request->$field;
                }
            }

            if ($request->hasFile("slider{$i}_image")) {
                $oldImage = $settings->{"slider{$i}_image"};
                $destinationPath = public_path("uploads/slider/{$oldImage}");
                if ($oldImage && File::exists($destinationPath)) {
                    File::delete($destinationPath);
                }

                $file = $request->file("slider{$i}_image");
                $filename = "slider_image_{$i}_" . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/slider'), $filename);
                $settings->{"slider{$i}_image"} = $filename;
            }
        }

        $settings->save();

        return redirect()->back()->with('message', $settings->wasRecentlyCreated ? 'Slider Settings Created Successfully' : 'Slider Settings Updated Successfully');
    }


    //ABOUT US PAGE BEGINS HERE
    public function AboutusPage(){
        $data['title'] = 'About Us';
        $data['about'] = AboutUs::find(1);
        return view('admin.about.index', $data);
    }

    public function StoreAbout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_img' => 'mimes:png,jpg,jpeg',
            'banner_title' => 'required',
            'about_title' => 'required',
            'about_text' => 'required',
            'our_vision' => 'required',
            'our_mission' => 'required',
            'side1_img' => 'mimes:png,jpg,jpeg',
            'side2_img' => 'mimes:png,jpg,jpeg',
            'mv_img' => 'mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }

        $about = AboutUs::firstOrNew(['id' => 1]);

        $about->banner_title = $request->banner_title;
        $about->about_title = $request->about_title;
        $about->about_text = $request->about_text;
        $about->our_vision = $request->our_vision;
        $about->our_mission = $request->our_mission;

        $imageFields = [
            'banner_img' => 'banner_img',
            'side1_img' => 'side1_img',
            'side2_img' => 'side2_img',
            'mv_img' => 'mv_img',
        ];

        foreach ($imageFields as $formField => $dbField) {
            if ($request->hasFile($formField)) {
                if (!empty($about->$dbField)) {
                    $oldPath = 'uploads/about/' . $about->$dbField;
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    }
                }

                $file = $request->file($formField);
                $filename = $dbField . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/about/', $filename);
                $about->$dbField = $filename;
            }
        }

        $about->save();

        $message = $about->wasRecentlyCreated ? 'About created successfully' : 'About updated successfully';
        return redirect()->back()->with('message', $message);
    }


      //Privacy and Policy
      public function PrivacyPolicy()
      {
          $data['title'] = 'Privacy & Policy';
          $data['privacy'] = PrivacyPolcy::find(1);
          return view('admin.privacy.index', $data);
      }

      //store Privacy Policy
      public function StorePrivacy(Request $request)
      {
          $validator = Validator::make($request->all(),[
              'title' => 'required|string',
              'sub_title' => 'required|max:200',
              'details' => 'required'
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{
            $PrivacyContent = PrivacyPolcy::firstOrNew(['id' => 1]);

            $PrivacyContent->title = $request->title;
            $PrivacyContent->sub_title = $request->sub_title;
            $PrivacyContent->details = $request->details;
            $PrivacyContent->save();

            $message = $PrivacyContent->wasRecentlyCreated ? 'Privacy created successfully' : 'Privacy updated successfully';
            return redirect()->back()->with('message', $message);
        }
    }


      //Terms and conditions page
    public function TermsServices()
    {
        $data['title'] = 'Terms & Condition';
        $data['terms'] = TermsConditions::find(1);
        return view('admin.terms.index', $data);
    }

    //store terms and conditons
    public function StoreTerms(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string',
            'disclaimer' => 'required|max:200',
            'details' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{
            $TermsContent = TermsConditions::firstOrNew(['id' => 1]);
            $TermsContent->title = $request->title;
            $TermsContent->disclaimer = $request->disclaimer;
            $TermsContent->details = $request->details;
            $TermsContent->save();
            $message = $TermsContent->wasRecentlyCreated ? 'Terms created successfully' : 'Terms updated successfully';
            return redirect()->back()->with('message', $message);
        }
    }


    //Agreement Document page
    public function agreementDoc()
    {
        $data['title'] = 'OcHeaven Homes Agreement Document';
        $data['terms'] = TermsConditions::find(1);
        return view('admin.agreement.index', $data);
    }




}
