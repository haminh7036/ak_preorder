<?php

namespace App\Http\Controllers\PreOrder;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreOrder\Order\storeOrderRequest;
use App\Models\ContactLocation;
use App\Models\Location;
use App\Models\PreOrder\PreorderOrder;
use App\Models\PreOrder\PreorderPage;
use App\Models\PreOrder\PreorderProduct;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;
use Session;
class PreOrderMainController extends Controller
{
    //

    public function index(){
        $products = PreorderProduct::all();
        $Page = PreorderPage::findorFail(1);
        $Orders = PreorderOrder::all();
        $posts = DB::connection('mysql2')
            ->table('eso_vi_news_rows')
            ->join('eso_vi_news_cat', 'eso_vi_news_rows.catid', '=', 'eso_vi_news_cat.catid')
            ->select('id','homeimgfile','eso_vi_news_cat.alias as cat','eso_vi_news_rows.alias','homeimgalt','addtime','eso_vi_news_rows.title','hometext')
            ->where('eso_vi_news_cat.title','Đồng hồ Casio')
            ->orderBy('eso_vi_news_cat.catid','asc')
            ->orderBy('eso_vi_news_rows.addtime','desc')
            ->limit(6)
            ->get() ;



        return view('preorder.preorder_pages.index',compact('products','Page','Orders','posts'));
    }

    public function order($slug){

        $cities = Location::all()->where('parentid',0);
        $product = PreorderProduct::where('Product_Code','=', $slug)->first();
        return view('preorder.preorder_pages.order', compact('product','cities'));
    }

    public function province(Request $request){
        $province = Location::where('title',$request['proviceId'])->first();
        if($request->ajax()){
            $cities = Location::all()->where('parentid',$province['id']);
            return $cities;
        }
    }
    public function shops(Request $request){

        if($request->ajax()){
            $array= ['Quận','Huyện','Xã','Thị Xã'];
            $address = str_replace($array,'', $request['proviceId']);
            $shops = ContactLocation::where('district', 'like',  '%' .$address)->get();
            return $shops;
        }
    }
    public function comfirm_order(storeOrderRequest $request, $slug){
        $request->validated();
        $product = PreorderProduct::where('Product_Code','=', $slug)->first();
        $request = $request->all();
        if(!empty($request['city']) && !empty($request['wards']) && !empty($request['Payment']) =="Đặt cọc tại cửa hàng") {
            if(empty($request['detail_address'])){
                $validator = \Illuminate\Support\Facades\Validator::make([], []); // Empty data and rules fields
                $validator->errors()->add('detail_address', 'This is the error message');
                throw new ValidationException($validator);
            }
            $Address = $request['detail_address'];
        }
        else{
            $Address = "";
        }
        $request['preorder_product_id'] = $product['id'];
        $request['Address'] = $Address;
        $create = PreorderOrder::create($request);

        if($create){
            $product['Quantity'] = $product['Quantity'] - 1;
            if($product['Quantity'] == 0){
                $product['status'] = 1;
            }
            $product->save();
        }
        return(redirect(route('preorder_store_success',['status'=>'success','cid'=> $request['_token']])));
    }

    public function success(Request $request){
        if($request['status'] == 'success' && !empty($request['cid'])){
            return view('preorder.status_pages.success');
        }
        else{
            abort(404);
        }
    }

}