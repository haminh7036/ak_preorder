<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\Posts\storePostRequest;
use App\Http\Requests\Posts\updatePostRequest;
use App\Models\LandingPage;
use App\Models\Post;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Session;
class PostController extends Controller
{

    public function index(Request $request){
        $options = LandingPage::whereNotNull('discount_id')->get(['id','page_name']);
        if ($request->ajax()) {
            $data = Post::with('landingPageViaPost')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnEdit = CommonHelper::generateButtonEdit(route('posts.edit', $row->id));
                    $btnDelete = CommonHelper::generateButtonDelete(route('posts.destroy', $row->id));
                    return $btnEdit . $btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }
        $breadcrumbs = [
            'title' => __('Nội dung'),
            'links' => [
                [
                    'text' => __('Nội dung'),
                    'active' => true,
                ]
            ]
        ];
        return view('posts.index', compact('breadcrumbs','options'));
    }

    public function create(){

        $breadcrumbs = [
            'title' => __('Nội dung'),
            'links' => [
                [
                    'text' => __('Nội dung'),
                    'active' => true,
                ]
            ]
        ];
        $position= Post::TYPES;
        $landing_page = LandingPage::all();
        return view('posts.create', compact('breadcrumbs','position','landing_page'));
    }
    public function store(storePostRequest $request){
        $request->validated();
        $data = $request->all();
        if($request->hasFile('img')){
            $slug = SlugService::createSlug(Post::class, 'img',pathinfo($data['img']->getClientOriginalName(), PATHINFO_FILENAME));
            if(pathinfo($data['img']->getClientOriginalName(),PATHINFO_EXTENSION)=='mp4'){
                $request['img']->storeAs('videos/info',$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION),'public');
                $data['img'] = 'videos/info/'.$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION);
            }
            else{
                $request['img']->storeAs('photos/banner',$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION),'public');
                $data['img'] = 'photos/banner/'.$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION);
            }
        }
        $data['title'] = preg_replace("/\r\n|\r|\n/", '<br/>', $data['title']);
        $data['position']= Post::TYPES[$data['position']];
        Post::create($data);
        return redirect(route('posts.index'));
    }

    public function edit($id){
        $post= Post::findorFail($id);
        $position= Post::TYPES;
        $landing_page = LandingPage::all();
        $breadcrumbs = [
            'title' => __('Nội dung'),
            'links' => [
                [
                    'text' => __('Nội dung'),
                    'active' => true,
                ]
            ]
        ];
        return view('posts.edit', compact('post','breadcrumbs','position','landing_page'));
    }
    protected function update(updatePostRequest $request,$id){
        $ob = Post::findorFail($id);
        $data = $request->all();
        if($request->hasFile('img')){
            if(Storage::exists($ob->img)) {
                Storage::delete($ob->img);
            }
            $slug = SlugService::createSlug(Post::class, 'img',pathinfo($data['img']->getClientOriginalName(), PATHINFO_FILENAME));
            if(pathinfo($data['img']->getClientOriginalName(),PATHINFO_EXTENSION)=='mp4'){
                $request['img']->storeAs('videos/info',$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION),'public');
                $data['img'] = 'videos/info/'.$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION);
            }
            else{
                $request['img']->storeAs('photos/banner',$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION),'public');
                $data['img'] = 'photos/banner/'.$slug.'.'.pathinfo($data['img']->getClientOriginalName(), PATHINFO_EXTENSION);
            }
        }
        $data['position']= Post::TYPES[$data['position']];
        $ob->update($data);
        return redirect(route('posts.index'));
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();
        Session::flash('flash_message', 'Xóa thành công');
        return redirect(route('posts.index'));
    }
}
