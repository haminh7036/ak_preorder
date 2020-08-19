<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\Influencers\storeInfluencerRequest;
use App\Models\LandingPage;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CelebrityController extends Controller
{
    //

    public function index(Request $request){
        $options = LandingPage::whereNotNull('discount_id')->get(['id','page_name']);

        if ($request->ajax()) {
            $data = LandingPage::all();
            foreach ($data as $key=>$value){
                $data[$key]->influencers= unserialize($value->influencers);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        $breadcrumbs = [

            'title' => 'Celebrities',
            'links' => [
                [
                    'text' => 'Celebrities',
                    'active' => true,
                ]
            ]

        ];
        return view('influencers.index',compact('breadcrumbs','options'));
    }
    public function store(storeInfluencerRequest $request){
        $request->validated();
        $request = $request->all();
        $sad = (serialize($request));
        LandingPage::where('id',$request['landing_page'])->update(
            ['influencers'=>$sad]
        );
        return redirect('/admin/celebrity');
    }
}
