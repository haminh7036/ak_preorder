<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\storeSlideImage;
use App\Models\LandingPage;
use App\Models\SlideImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Session;
class SlideImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $data = SlideImage::with('landingPageViaImages')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnDelete = CommonHelper::generateButtonDelete(route('slide-images.destroy', $row->id));
                    return $btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }
        $options = LandingPage::whereNotNull('discount_id')->get(['id','page_name']);

        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.slide_image'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.slide_image'),
                    'active' => true,
                ]
            ]
        ];
        return view('slideimages.index',compact('breadcrumbs','options'));
    }

    public function create(){

        $options = LandingPage::all();

        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.slide_image'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.slide_image'),
                    'active' => true,
                ]
            ]
        ];

        return view('slideimages.create', compact('breadcrumbs','options'));

    }

    protected function store(storeSlideImage $request){


        if($request->hasFile('images')) {
            $allowedfileExtension=['jpg','png','JPG','PNG'];
            $files = $request->file('images');
            $exe_flg = true;
            foreach($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);

                if(!$check) {
                    $exe_flg = false;
                    break;
                }
            }
            if($exe_flg) {
                foreach ($request->images as $image) {
                    $filename = $image->store('photos/slideImages','public');
                    SlideImage::create([
                        'landing_page_id' => $request->landing_page,
                        'images' => $filename,
                    ]);
                }
                Session::flash('flash_message', __('validation.flash_messages.slide-image.created'));
            } else {
                Session::flash('flash_message', __('validation.flash_messages.uploaded'));
            }
        }
        return redirect('pre-order-admin/slide-images');
    }

    public function destroy($id){
        $data = SlideImage::findorFail($id);
        if(Storage::exists($data->images)) {
            Storage::delete($data->images);
        }
        $data->delete();
        Session::flash('flash_message', __('validation.flash_messages.slide-image.deleted'));
        return redirect('/pre-order-admin/slide-images');
    }

}