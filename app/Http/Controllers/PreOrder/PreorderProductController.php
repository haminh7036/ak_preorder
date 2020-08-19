<?php

namespace App\Http\Controllers\PreOrder;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PreOrder\Product\storePreorderProductRequest;
use App\Http\Requests\PreOrder\Product\updatePreorderProductRequest;
use App\Models\PreOrder\PreorderImage;
use App\Models\PreOrder\PreorderPage;
use App\Models\PreOrder\PreorderProduct;
use App\Models\PreOrder\PreorderSpecifications;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Session;

class PreorderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data=PreorderProduct::all('id','Product_Name','status','Quantity');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnChangeStatus = CommonHelper::generateButtonChangeStatus(route('update_status_product',$row->id));
                    $btnShow = CommonHelper::generateButtonShow(route('product.show', $row->id));
                    $btnDelete = CommonHelper::generateButtonDelete(route('product.destroy', $row->id));
                    return $btnChangeStatus.$btnShow.$btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }
        $breadcrumbs = [

            'title' => 'Preorder Products',
            'links' => [
                [
                    'text' => 'Preorder Product',
                    'active' => true,
                ]
            ]

        ];
        return view('preorder.products.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = PreorderPage::all();
        $breadcrumbs = [

            'title' => 'Tạo sản phẩm Preorder',
            'links' => [
                [
                    'text' => 'Tạo sản phẩm Preorder',
                    'active' => true,
                ]
            ]

        ];
        return view('preorder.products.create', compact('breadcrumbs','page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePreorderProductRequest $request)
    {
        $request->validated();
        if($request->hasFile('images')){
            foreach ($request->images as $image) {
                $slug = SlugService::createSlug(PreorderImage::class,'Images',pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
                $filename =$image->storeAs('photos/products/images',$slug.'.'.pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION),'public');
                $image = PreorderImage::create([
                    'Images' => $filename,
                ]);
                $data[] = $image->id;
            }
        }
        $request = $request->all();
        if (!empty($request['Gift'])){
            $request['Gift'] = (serialize($request['Gift']));
        }
        $product = PreorderProduct::create($request);
        $info_product = PreorderProduct::findorFail($product->id);
        if(!empty($data)){
            $info_product->Image()->sync($data);
        }
        $request['preorder_product_id'] = $product->id;
        PreorderSpecifications::create($request);
        return redirect(route('product.show',$product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = PreorderProduct::findorFail($id);
        $breadcrumbs = [

            'title' => 'Chi tiết sản phẩm',
            'links' => [
                [
                    'text' => 'Chi tiết sản phẩm',
                    'active' => true,
                ]
            ]

        ];
        return view('preorder.products.show',compact('breadcrumbs','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = PreorderProduct::findorFail($id);
        $breadcrumbs = [

            'title' => 'Chỉnh sửa sản phẩm',
            'links' => [
                [
                    'text' => 'Chỉnh sửa sản phẩm',
                    'active' => true,
                ]
            ]

        ];
        return view('preorder.products.edit',compact('breadcrumbs','product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePreorderProductRequest $request, $id)
    {
        $request->validated();
        $product= PreorderProduct::findorFail($id);
        if($request->hasFile('images')){
            if(!empty($product->Image)){
                foreach ($product->Image as $item){
                    if(Storage::exists($item->Images)){
                        Storage::delete($item->Images);
                        $product->Image()->detach();
                    }
                }
            }
            foreach ($request->images as $image) {
                $slug = SlugService::createSlug(PreorderImage::class,'Images',pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
                $filename =$image->storeAs('photos/products/images',$slug.'.'.pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION),'public');
                $image = PreorderImage::create([
                    'Images' => $filename,
                ]);
                $data[] = $image->id;
            }
        }
        $request = $request->all();
        if (!empty($request['Gift'])){
            $request['Gift'] = (serialize($request['Gift']));
        }
        else{
            $request['Gift'] ='';
        }
        $product->update($request);
        if(!empty($data)){
            $product->Image()->sync($data);
        }
        $product->Specification->update($request);
        return redirect(route('product.show', $product->id));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PreorderProduct::findorFail($id);
        $data->Image()->detach();
        $data->Image()->delete();
        $data->Specification()->delete();
        $data->delete();
        Session::flash('flash_message', 'Xóa thành công');
        return redirect(route('product.index'));
    }

    protected function changeStatus($id){
        $product = PreorderProduct::findorFail($id);
        if($product->Quantity == 0){
            Session::flash('flash_error', 'Sản phẩm đã hết số lượng');
            return redirect(route('product.index'));
        }
        if($product->status == 0){
            $product->update([
                'status'=>1
            ]);
            Session::flash('flash_message', 'Vô hiệu hóa thành công');
        }
        else{
            $product->update([
                'status'=>0
            ]);
            Session::flash('flash_message', 'Sản phẩm đã active');
        }
        return redirect(route('product.index'));
    }
}
