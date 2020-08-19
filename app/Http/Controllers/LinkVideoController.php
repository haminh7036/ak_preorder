<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\LinkVideo\storeLinkVideoRequest;
use App\Models\LandingPage;
use App\Models\LinkVideo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
class LinkVideoController extends Controller
{
    public function index(Request $request){
        $options = LandingPage::whereNotNull('discount_id')->get(['id','page_name']);
        if ($request->ajax()) {
            $data = LinkVideo::with('landingPageViaVideos')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnDelete = CommonHelper::generateButtonDelete(route('link-videos.destroy', $row->id));
                    return $btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }

        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.link_video'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.link_video'),
                    'active' => true,
                ]
            ]
        ];

        return view('linkvideos.index',compact('breadcrumbs','options'));
    }

    public function create(){
        $options = LandingPage::all('id','page_name');
        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.link_video'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.link_video'),
                    'active' => true,
                ]
            ]
        ];
        return view('linkvideos.create',compact('breadcrumbs','options'));
    }

    protected function store(storeLinkVideoRequest $request){

        $request->validated();
        $data= $request->all();
        LinkVideo::create($data);
        Session::flash('flash_message', __('validation.flash_messages.link-video.created'));
        return redirect(route('link-videos.index'));
    }

    protected function destroy($id){
        LinkVideo::findOrFail($id)->delete();
        Session::flash('flash_message', __('validation.flash_messages.link-video.deleted'));
        return redirect(route('link-videos.index'));
    }
}
