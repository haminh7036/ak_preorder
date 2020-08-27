<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\Pages\updatePageRequest;
use App\Models\Discount;
use App\Models\LandingPage;
use App\Models\SlideImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Session;
use DB;
class PagesController extends Controller
{

    public function index(Request $request){
        $options = LandingPage::all();
        $data = LandingPage::all();
        foreach ($data as $key=>$value){
            if(!empty($data[$key]->discount_id)){
                $discount = Discount::findorFail($data[$key]->discount_id);
                $data[$key]->discount = $discount;

            }


        }
        
        if ($request->ajax()) {
            $url = ['g-shock-dream-challenge','thong-tin-su-kien-g-shock-dream-challenge','baby-ba-130'];
            $data = LandingPage::all();
            foreach ($data as $key=>$value){
                if(!empty($data[$key]->discount_id)){
                    $discount = Discount::findorFail($data[$key]->discount_id);
                    $data[$key]->discount = $discount;
                    
                }
                $data[$key]->url = $url[$key];
            }
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnEdit = CommonHelper::generateButtonEdit(route('pages.edit', $row->id));
                    return $btnEdit;
                })
                ->addIndexColumn()
                ->make(true);
        }

        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.pages'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.pages'),
                    'active' => true,
                ]
            ]
        ];

        return view('pages.index',compact('breadcrumbs','options'));
    }

    public function edit($id){
        $data= LandingPage::select('big_banner','keywords', 'title','description')->find($id);
        $data['discount']= Discount::all()->where('activeall', 1);
        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.pages'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.pages'),
                    'active' => true,
                ]
            ]
        ];
        return view('pages.edit',compact('breadcrumbs','id','data'));

    }

    protected function update(updatePageRequest $request,$id){
        $request->validated();
        $data = LandingPage::findorFail($id);
        if($request->hasFile('big_banner')) {
            if(Storage::exists($data->big_banner)) {
                Storage::delete($data->big_banner);
            }
            $file = $request->big_banner;
            $filename = $file->store('photos/big_banner','public');
            if(!empty($request['discount_id'])){
                LandingPage::findorFail($id)->update([
                    'big_banner' => $filename,
                    'discount_id' => $request['discount_id'],
                    'keywords' => $request['keywords'],
                    'title' => $request['title'],
                    'description' => $request['description']
                ]);
            }
            else{
                LandingPage::findorFail($id)->update([
                    'big_banner' => $filename,
                    'keywords' => $request['keywords'],
                    'title' => $request['title'],
                    'description' => $request['description']
                ]);
            }

            Session::flash('flash_message', __('validation.flash_messages.slide-image.created'));
        } elseif($request->has('big_banner')){
            $frame = $request->big_banner;
            LandingPage::findorFail($id)->update([
                'big_banner' => $frame,
                'discount_id' => $request['discount_id'],
                'keywords' => $request['keywords'],
                'title' => $request['title'],
                'description' => $request['description']
            ]);
            Session::flash('flash_message', __('validation.flash_messages.slide-image.created'));
        }
        else{
            LandingPage::findorFail($id)->update([
                'keywords' => $request['keywords'],
                'title' => $request['title'],
                'description' => $request['description']
            ]);
            Session::flash('flash_message', __('validation.flash_messages.slide-image.cant_delete'));
        }

//        dd($request->file());

        return redirect('/admin/pages');
    }

}