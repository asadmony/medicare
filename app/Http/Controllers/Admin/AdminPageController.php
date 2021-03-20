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
use GuzzleHttp\Client; 
use App\Model\Company; 
use App\Model\PageItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Model\WebsiteParameter;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;

class AdminPageController extends Controller
{
     
//pages
    
    public function pageAddNewPost(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [
            'page_title' => 'required|max:50|string',
            'route_name' => 'required|max:50|string',
        ]);
        if($validation->fails())
        {
            return back()->withErrors($validation)
            ->withInput()
            ->with('error', 'Something went wrong.');
        }

 
        $page = new Page;
        $page->page_title = $request->page_title;
        $page->title_hide = $request->title_hide ? 1 : 0;
        $page->active = $request->active ? 1 : 0;
        $page->list_in_menu = $request->list_in_menu ? 1 : 0;
        $page->route_name = $request->route_name ? Str::of($request->route_name)->snake()  : null;
        $page->addedby_id = Auth::id();
        $page->save();
 

        return back()->with('success', 'New Page Created Successfully!');
    }

    public function webParams()
    {
        $post = WebsiteParameter::latest()->first();
        return view('admin.websiteParameters',[
            'post'=> $post,
        ]);
    }

    public function webParamsSave(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 

            'meta_keyword' => 'max:255',

        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Worng!');
        }
        $request = request();
        $post = WebsiteParameter::firstOrCreate([]);

        $post->title = $request->title;
        $post->short_title = $request->short_title;
        $post->h1 = $request->h1;
        $post->google_analytics_code = $request->google_analytics_code;
        $post->facebook_pixel_code = $request->facebook_pixel_code;
        $post->meta_author = $request->meta_author;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->slogan = $request->slogan;
        $post->footer_address = $request->footer_address;
        $post->footer_copyright = $request->footer_copyright;
        $post->addthis_url = $request->addthis_url;
        $post->fb_page_link = $request->fb_url;
        $post->contact_mobile = $request->contact_mobile;
        $post->contact_email = $request->contact_email;
        $post->linkedin_url = $request->linkedin_url;
        $post->twitter_url = $request->twitter_url;
        // $post->pinterest_url = $request->pinterest_url;
        // $post->youtube_url = $request->youtube_url;
        // $post->google_plus_url = $request->google_plus_url;
        // $post->google_map_code = $request->google_map_code;
        // $post->main_color = $request->main_color ?: 'default';
        // $post->sub_color = $request->sub_color ?: 'default';
        // $post->header_bg_color = $request->header_bg_color ?: 'default';
        // $post->header_text_color = $request->header_text_color ?: 'default';
        // $post->footer_bg_color = $request->footer_bg_color ?: 'default';
        // $post->footer_text_color = $request->footer_text_color ?: 'default';

        if($request->favicon)
        {
            $file = $request->favicon;
            Storage::disk('upload')->delete('favicon/'.$post->favicon);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('favicon/'.$originalName, File::get($file));
            $post->favicon = $originalName;
        }

        if($request->logo)
        {
            $file = $request->logo;
            Storage::disk('upload')->delete('logo/'.$post->logo);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('logo/'.$originalName, File::get($file));
            $post->logo = $originalName;
        }
        if($request->logo_alt)
        {
            $file = $request->logo_alt;
            Storage::disk('upload')->delete('logo/'.$post->logo_alt);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('logo/'.$originalName, File::get($file));
            $post->logo_alt = $originalName;
        }

        // if($request->android_apk)
        // {
        //     $apk = $request->android_apk;
        //     Storage::disk('upload')->delete('apk/'.$post->android_apk);

        //     $on = $apk->getClientOriginalName();
        //     Storage::disk('upload')->put('apk/'.$on, File::get($apk));
        //     $post->android_apk = $on;
        // }

        $post->save();

        Cache::forget('websiteParameter');

        return back()->with('success', 'Website Parameter Successfully Updated.');
    }

    public function pagesAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'pages','lsbsm'=>'pagesAll']);

        $pages = Page::orderBy('drag_id')->paginate(50);
        return view('admin.pages.pagesAll', ['pages'=> $pages]);
    }

    public function pageSort(Request $request)
    {
        foreach($request->sorted_data as $key => $value)
        {
            $cat = Page::where('id', $value)->first();
            $cat->drag_id = $key;
            $cat->editedby_id = Auth::id();
            $cat->save();
        }
        if($request->ajax())
        {
            return Response()->json([
            'success'=>true,
            ]);
        }
        return back();
    }

    public function pageEdit(Request $request, Page $page)
    {
        return view('admin.pages.pageEdit', ['page'=> $page]);
    }

    public function pageEditPost(Request $request, Page $page)
    {
        $validation = Validator::make($request->all(),
        [
            'page_title' => 'required|max:50|string',
            'route_name' => 'required|max:50|string',
        ]);
        if($validation->fails())
        {
            return back()->withErrors($validation)
            ->withInput()
            ->with('error', 'Something went wrong.');
        }

        $page->page_title = $request->page_title;
        $page->title_hide = $request->title_hide ? 1 : 0;
        $page->active = $request->active ? 1 : 0;
        $page->list_in_menu = $request->list_in_menu ? 1 : 0;
        $page->route_name = $request->route_name ? Str::of($request->route_name)->snake()  : null;
        $page->editedby_id = Auth::id();
        $page->save();
 

        return back()->with('success', 'Page Updated Successfully!');
    }

    public function pageDelete(Request $request, Page $page)
    {
        $page->items()->delete();
        $page->delete();

        return back()->with('success', 'Page Deleted Successfully');
    }

    public function pageItems(Request $request, Page $page)
    {
        $mediaAll = Media::latest()->paginate(200);
        return view('admin.pages.pageItems', [
            'page'=> $page,
            'mediaAll' => $mediaAll
        ]);
    }

    public function pageItemAddPost(Request $request, Page $page)
    {
        $validation = Validator::make($request->all(),
        [
            'title' => 'required|max:50|string',
            'description' => 'required|max:60000|string',
        ]);
        if($validation->fails())
        {
            return back()->withErrors($validation)
            ->withInput()
            ->with('error', 'Something went wrong.');
        }

        $item = new PageItem;
        $item->page_id = $page->id;
        $item->title = $request->title ?: null;
        $item->content = $request->description ?: null;
        $item->editor = $request->editor ? 1 : 0;
        $item->active = $request->active ? 1 : 0;
        $item->addedby_id = Auth::id();
        $item->save();
 

        return back()->with('success', 'Page Item Created Successfully!');
    }

    public function pageItemDelete(Request $request, PageItem $item)
    {
        $item->delete();

        return back()->with('success', 'Part of the Page Deleted Successfully');
    }

    public function pageItemEditEditor(Request $request, PageItem $item)
    {
        if($item->editor)
        {
            $item->editor = false;
        }
        else
        {
            $item->editor = true;
        }
        $item->save();

        return back();
    }

    public function pageItemEdit(Request $request, PageItem $item)
    {
        $mediaAll = Media::latest()->paginate(200);

        return view('admin.pages.pageItemEdit', [
            'it'=> $item,
            'page' => $item->page,
            'mediaAll' => $mediaAll
        ]);
    }

    public function pageItemUpdate(Request $request, PageItem $item)
    {
        $validation = Validator::make($request->all(),
        [
            'title' => 'required|max:50|string',
            'description' => 'required|max:60000|string',
        ]);
        if($validation->fails())
        {
            return back()->withErrors($validation)
            ->withInput()
            ->with('error', 'Something went wrong.');
        }

        $item->title = $request->title ?: null;
        $item->content = $request->description ?: null;
        $item->editor = $request->editor ? 1 : 0;
        $item->active = $request->active ? 1 : 0;
        $item->editedby_id = Auth::id();
        $item->save();
 

        return back()->with('success', 'Page Item Updated Successfully!');
    }


//pages


//media
    public function mediaAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'media','lsbsm'=>'mediaAll']);
        $mediaAll = Media::latest()->paginate(50);
        return view('admin.media.mediaAll',['mediaAll'=>$mediaAll]);
    }

    public function mediaUploadPost(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [ 
            'files.*' => 'image'
        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->hasFile('files'))
            {
                foreach($request->file('files') as $file)
                {
                    $originalName = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $mime = $file->getClientMimeType();
                    $size =$file->getSize();
                    $fileNewName = str_random(4).date('ymds').'.'.$ext;
                    // $fileNewName = str_random(6).time().'.'.$ext;
                    // $fileNewName = Auth::id().'_'.date('ymdhis').'_'.rand(11,99).'.'.$ext;
                    list($width,$height) = getimagesize($file);                    

                    Storage::disk('upload')
                    ->put('media/image/'.$fileNewName, File::get($file));

                    $file_new_url = 'storage/media/image/'.$fileNewName;

                    $media = new Media;                    
                    $media->file_name = $fileNewName;
                    $media->file_original_name = $originalName;
                    $media->file_mime = $mime;
                    $media->file_ext = $ext;
                    $media->file_size = $size;
                    
                    $media->width = $width;
                    $media->height = $height;
                    $media->file_url = $file_new_url;
                    $media->addedby_id = Auth::id();
                    if($mime == 'image/gif' or $mime == 'image/png' or $mime == 'image/jpeg' or $mime == 'image/bmp')
                    {
                        $media->file_type = 'image';
                    }
                    //image/gif, image/png, image/jpeg, image/bmp, image/webp

                    $media->save();

                }
            }
        

        return back();
    }

    public function mediaDelete(Media $media,Request $request)
    {
        if($media->file_type == 'image')
        {
            Storage::disk('upload')->delete('media/image/'.$media->file_name);
            $media->delete();
        }

        return back()->with('info','Media successfully deleted.');
        
    }
//media


}
