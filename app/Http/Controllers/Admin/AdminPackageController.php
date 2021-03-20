<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Page;
use App\Model\Media;
use App\Model\Course;
use App\Model\Subject;
use GuzzleHttp\Client; 
use App\Model\Company; 
use App\Model\Package;
use App\Model\PageItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;

class AdminPackageController extends Controller
{

//package
    public function addNewPackage()
    {
        menuSubmenu('package','addNewPackage');

        $package = Package::whereStatus('temp')->latest()->first();
        if(!$package)
        {
            $package = new Package;
            $package->addedby_id = Auth::id();
            $package->status = 'temp';
            $package->save();
        }


        return view('admin.packages.addNewPackage',[
            'package'=>$package,
            'courses'=>Course::orderBy('title')->get()
        ]);
    }

    public function updatePackagePost(Package $package, Request $request)
    {
        $msg = $package->status == 'temp' ? 'created' : 'updated';
        $package->title = $request->title;
        $package->description = $request->description;
        // $package->file_name = $request ;
        $package->no_of_courses = $request->no_of_courses;
        $package->no_of_persons = $request->no_of_persons;
        $package->no_of_attempts = $request->no_of_attempts;
        $package->course_level = implode(",",$request->course_levels);
        $package->duration = $request->duration;
        $package->no_of_credits = $request->no_of_credits;
        $package->price = $request->price;
        $package->package_for = $request->package_for;
        $package->package_type = $request->package_type;
        $package->active = $request->status ? 1 : 0;
        $package->status = $request->status ? 'active' : 'inactive';
        $package->addedby_id = Auth::id();
        $package->editedby_id = Auth::id();

        if($request->hasFile('logo'))
        {
            $cp = $request->file('logo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $package->id.'_fi_'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('upload')->put('package/'.$randomFileName, File::get($cp));   
            
            if($package->file_name)
            {
                $f = 'package/'.$package->file_name;
                if(Storage::disk('upload')->exists($f))
                {
                    Storage::disk('upload')->delete($f);
                }
            }          

            $package->file_name = $randomFileName;
        }



        $package->save();

        
        return redirect()->route('admin.allPackages')->with('success', "Package successfully {$msg}");
        // return back()->with('success', "Package successfully {$msg}");

    }

    public function allPackages(Request $request)
    {
        menuSubmenu('package','allPackages');

    $packages = Package::where('status', '<>', 'temp')->orderBy('title')->paginate(50);

        return view('admin.packages.allPackages', ['packages'=>$packages]);
    }

    public function updatePackage(Package $package)
    {
        return view('admin.packages.addNewPackage',['package'=>$package]);
    }

    public function deletePackage(Package $package)
    {
        if($package->file_name)
        {
            $f = 'package/'.$package->file_name;
                if(Storage::disk('upload')->exists($f))
                {
                    Storage::disk('upload')->delete($f);
                }
        }
        foreach ($package->takenPackages as $takenPackage) {
            $takenPackage->takenCourses()->delete();
            $takenPackage->attempts()->delete();
            $takenPackage->attemptItems()->delete();
        }
        $package->takenPackages()->delete();
        $package->delete();

        return back()->with('success', 'Package successfully deleted.');
    }
//package

}
