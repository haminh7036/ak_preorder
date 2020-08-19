<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Models\Registrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RegistrantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        if ($request->ajax()) {
            $data = Registrant::with('content')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnDelete = CommonHelper::generateButtonDelete(route('registrants.destroy', $row->id));
                    return $btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }

        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.registrant'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.registrant'),
                    'active' => true,
                ]
            ]
        ];
        return view('registrants.index',compact('breadcrumbs'));
    }
    public function destroy($id){
        $data = Registrant::findorFail($id);
        $data->content()->delete();
        $data->delete();

        return redirect(route('registrants.index'));

    }
}
