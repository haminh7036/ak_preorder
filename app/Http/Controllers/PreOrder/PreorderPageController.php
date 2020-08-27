<?php

namespace App\Http\Controllers\PreOrder;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Models\PreOrder\PreorderPage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PreorderPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data=PreorderPage::all('id','name_page');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnShow = CommonHelper::generateButtonShow(route('pre-order-page.show', $row->id));
                    return $btnShow;
                })
                ->addIndexColumn()
                ->make(true);
        }

        $breadcrumbs = [

            'title' => 'Trang Pre-Order',
            'links' => [
                [
                    'text' => 'Trang Pre-Order',
                    'active' => true,
                ]
            ]

        ];
        return  view('preorder.pages.index',compact('breadcrumbs'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumbs = [

            'title' => 'Xem chi tiết Trang Pre-Order',
            'links' => [
                [
                    'text' => 'Xem chi tiết Pre-Order',
                    'active' => true,
                ]
            ]

        ];
        $page = PreorderPage::findorFail($id);
        return view('preorder.pages.show',compact('page','breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = PreorderPage::findorFail($id);
        $breadcrumbs = [

            'title' => 'Sửa Trang Pre-Order',
            'links' => [
                [
                    'text' => 'Sửa Trang Pre-Order',
                    'active' => true,
                ]
            ]

        ];
        return view('preorder.pages.edit',compact('breadcrumbs','page'));
    }

    public function update(Request $request, $id)
    {
        $page = PreorderPage::findorFail($id);
        $data = $request->all();
        if($request->hasFile('big_banner')){
            $file = $request->big_banner;
            $filename = $file->store('photos/big_banner','public');
            $data['big_banner'] = $filename;
        }
        $page->update($data);
        return redirect(route('pre-order-page.show',$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
