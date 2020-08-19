<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registrant\storeRegistrantRequest;
use App\Models\ChallengeContent;
use App\Models\Discount;
use App\Models\Interviewer;
use App\Models\LandingPage;
use App\Models\Registrant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use DB;
class LandingPageController extends Controller
{

    public function landing_page_1(){
        $landing_page = LandingPage::find(1);
        $supported_image = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
        );
        $ext = strtolower(pathinfo($landing_page['big_banner'], PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
        if (in_array($ext, $supported_image)) {
            $landing_page['type']= 'image';
        } else {
            $landing_page['type']= 'iframe';
        }
        $interviewers = Interviewer::limit(6)->get();
        $posts = DB::connection('mysql2')
            ->table('eso_vi_news_rows')
            ->join('eso_vi_news_cat', 'eso_vi_news_rows.catid', '=', 'eso_vi_news_cat.catid')
            ->select('id','homeimgfile','eso_vi_news_cat.alias as cat','eso_vi_news_rows.alias','homeimgalt','addtime','eso_vi_news_rows.title','hometext')
            ->where('eso_vi_news_cat.title','Tuyển thủ Việt Nam')
            ->orWhere('eso_vi_news_cat.title','Đồng hồ Casio')
            ->orderBy('eso_vi_news_cat.catid','asc')
            ->orderBy('eso_vi_news_rows.addtime','desc')
            ->limit(6)
            ->get() ;
        $influencers = unserialize($landing_page['influencers']);
        return view('landing_pages.page1', compact('landing_page','interviewers','posts','influencers'));
    }

    public function landing_page_2(){
        $landing_page = LandingPage::find(2);
        $supported_image = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
        );

        $ext = strtolower(pathinfo($landing_page['big_banner'], PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
        if (in_array($ext, $supported_image)) {
            $landing_page['type']= 'image';
        } else {
            $landing_page['type']= 'iframe';
        }
        $interviewers = Interviewer::limit(6)->get();
        $posts = DB::connection('mysql2')
            ->table('eso_vi_news_rows')
            ->join('eso_vi_news_cat', 'eso_vi_news_rows.catid', '=', 'eso_vi_news_cat.catid')
            ->select('id','homeimgfile','eso_vi_news_cat.alias as cat','eso_vi_news_rows.alias','homeimgalt','addtime','eso_vi_news_rows.title','hometext')
            ->where('eso_vi_news_cat.title','Tuyển thủ Việt Nam')
            ->orWhere('eso_vi_news_cat.title','Đồng hồ Casio')
            ->orderBy('eso_vi_news_cat.catid','asc')
            ->orderBy('eso_vi_news_rows.addtime','desc')
            ->limit(6)
            ->get();
        if($landing_page->discount_id != null){
            $discount = Discount::select('product')->where('did',$landing_page->discount_id)->first();
            if($discount != null){
                $array =  array_slice(unserialize($discount['product']), -7);
            }
            else{
                $array = [];
            }
            
            $products = DB::connection('mysql2')
                ->table('eso_shops_rows')
                ->join('eso_shops_catalogs', 'eso_shops_rows.listcatid', '=', 'eso_shops_catalogs.catid')
                ->select('product_code','homeimgfile','product_price','eso_shops_catalogs.vi_alias as catalias','eso_shops_rows.vi_alias', 'saleprice')
                ->whereIn('id',$array)
                ->orderBy('addtime','desc')
                ->get();
        }
        else{
            $products = DB::connection('mysql2')
                ->table('eso_shops_rows')
                ->join('eso_shops_catalogs', 'eso_shops_rows.listcatid', '=', 'eso_shops_catalogs.catid')
                ->select('product_code','homeimgfile','product_price','eso_shops_catalogs.vi_alias as catalias','eso_shops_rows.vi_alias', 'saleprice')
                ->where('eso_shops_rows.listcatid','=','6')
                ->orderBy('addtime','desc')
                ->limit(6)
                ->get();
        }
        if($landing_page['influencers'] != null){
            $influencers = unserialize($landing_page['influencers']);
        }
        else{
            $influencers['name']=[];
        }
        return view('landing_pages.page2', compact('landing_page','interviewers','posts','products','influencers'));
    }

    public function landing_page_3(){
        $landing_page = LandingPage::findorFail(3);
        $supported_image = array(
            'gif',
            'jpg',
            'jpeg',
            'png'
        );
        $ext = strtolower(pathinfo($landing_page['big_banner'], PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
        if (in_array($ext, $supported_image)) {
            $landing_page['type']= 'image';
        } else {
            $landing_page['type']= 'iframe';
        }
        
        if($landing_page->discount_id != null){
            $discount = Discount::select('product')->where('did',$landing_page->discount_id)->first();
            if($discount != null){
                $array =  array_slice(unserialize($discount['product']), -7);
            }
            else{
                $array = [];
            }
            
            $products = DB::connection('mysql2')
                ->table('eso_shops_rows')
                ->join('eso_shops_catalogs', 'eso_shops_rows.listcatid', '=', 'eso_shops_catalogs.catid')
                ->select('product_code','homeimgfile','product_price','eso_shops_catalogs.vi_alias as catalias','eso_shops_rows.vi_alias', 'saleprice')
                ->whereIn('id',$array)
                ->orderBy('addtime','desc')
                ->get();
        }
        else{
            $products = DB::connection('mysql2')
                ->table('eso_shops_rows')
                ->join('eso_shops_catalogs', 'eso_shops_rows.listcatid', '=', 'eso_shops_catalogs.catid')
                ->select('product_code','homeimgfile','product_price','eso_shops_catalogs.vi_alias as catalias','eso_shops_rows.vi_alias', 'saleprice')
                ->where('eso_shops_rows.listcatid','=','43')
                ->orderBy('addtime','asc')
                ->limit(6)
                ->get();
        }

        $posts = DB::connection('mysql2')
            ->table('eso_vi_news_rows')
            ->join('eso_vi_news_cat', 'eso_vi_news_rows.catid', '=', 'eso_vi_news_cat.catid')
            ->select('id','homeimgfile','eso_vi_news_cat.alias as cat','eso_vi_news_rows.alias','homeimgalt','addtime','eso_vi_news_rows.title','hometext')
            ->where('eso_vi_news_cat.title','Người nổi tiếng')
            ->orWhere('eso_vi_news_cat.title','Đồng hồ Casio')
            ->orderBy('eso_vi_news_cat.catid','asc')
            ->orderBy('eso_vi_news_rows.addtime','desc')
            ->limit(6)
            ->get() ;
        return view('landing_pages.page3', compact('landing_page','products','posts'));
    }

    public function store(storeRegistrantRequest $request){

        $request->validated();

        $data = $request->all();
        $registrant = new Registrant();
        $registrant->name = $data['name'];
        $registrant->phone= $data['phone'];
        $registrant->email= $data['email'];
        $registrant->password= bcrypt($data['password']);
        $registrant->save();
        $challenge_content = new ChallengeContent();
        $challenge_content->content = $data['content'];
        if(!empty($data['option'])){
            $challenge_content->options= $data['option'];
        }
        else{
            $challenge_content->options= '';
        }
        $challenge_content->registrant_id=$registrant['id'];
        $challenge_content->save();

        Session::flash('flash_message', __('validation.flash_messages.slide-image.created'));
        return redirect('/landing-page-1');
    }

}