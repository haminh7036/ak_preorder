<?php

namespace App\Http\Controllers\PreOrder;

use App\Http\Controllers\Controller;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Models\PreOrder\PreorderOrder;
use Yajra\DataTables\Facades\DataTables;
use Session;

class PreorderOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data =PreorderOrder::with('Product')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnChangeStatus = CommonHelper::generateButtonChangeStatus(route('update_status_deposit_status',$row->id));
                    $btnDelete = CommonHelper::generateButtonDelete(route('order.destroy', $row->id));
                    return $btnChangeStatus.$btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }
        $breadcrumbs = [

            'title' => 'Preorder Order',
            'links' => [
                [
                    'text' => 'Preorder Order',
                    'active' => true,
                ]
            ]

        ];


        return view('preorder.orders.index', compact('breadcrumbs'));
    }
    public function destroy($id)
    {
        $order = PreorderOrder::findOrFail($id);

        $order->delete();

        Session::flash('flash_message', 'Xóa thành công');

        return redirect(route('order.index'));
    }

    public function changeStatus($id){
        $order = PreorderOrder::findorFail($id);
        if($order->Status == 0){
            $order->update([
                'Status'=>1
            ]);
        }
        else{
            $order->update([
                'Status'=>0
            ]);
        }
        Session::flash('flash_message', 'Đã chuyển trạng thái');
        return redirect(route('order.index'));
    }
}
