<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\InterviewUpdateRequest;
use App\Http\Requests\StoreInterviewerRequest;
use App\Models\Interviewer;
use App\Models\Registrant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Session;
class InterviewerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $data =Interviewer::all('id','name', 'address','avatar', 'content');
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btnEdit = CommonHelper::generateButtonEdit(route('interviewers.edit', $row->id));
                    $btnDelete = CommonHelper::generateButtonDelete(route('interviewers.destroy', $row->id));
                    return $btnEdit . $btnDelete;
                })
                ->addIndexColumn()
                ->make(true);
        }

        $breadcrumbs = [

            'title' => __('layouts_admin.navigation.interviewer'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.interviewer'),
                    'active' => true,
                ]
            ]

        ];

        return view('interviewers.index', compact('breadcrumbs'));
    }



    public function edit($id){
        $interviewer = Interviewer::findOrFail($id);
        $breadcrumbs = [
            'title' => __('layouts_admin.sidebar.interviewer'),
            'links' => [
                [
                    'text' => __('layouts_admin.sidebar.interviewer'),
                    'active' => true,
                ],
//
//            [
//                'href' => url('members'),
//                'text' => __('layouts.sidebar.members')
//            ],
//            [
//                'href' => url('members', [$id, 'edit']),
//                'text' => $user->email
//            ],
            ]
        ];
        $isMyProfile = false;
        return view('interviewers.edit', compact('breadcrumbs', 'interviewer', 'isMyProfile'));
    }

    protected function updateInterviewer(InterviewUpdateRequest $request,$id){

        $request->validated();
        $request= $request->all();
        if(!empty($request['avatar'])){
            $avatarName = $id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request['avatar']->storeAs('avatars',$avatarName,'public');
            $request['avatar']=$avatarName;
            Interviewer::findOrFail($id)->update([
                'name'=>$request['name'],
                'address'=>$request['address'],
                'content'=>$request['content'],
                'avatar'=>$request['avatar']]);
        }
        else{
            Interviewer::findOrFail($id)->update([
                'name'=>$request['name'],
                'address'=>$request['address'],
                'content'=>$request['content'],
                ]);
        }
        return redirect('pre-order-admin/interviewers');
    }

    public function destroy($id){
        Interviewer::findOrFail($id)->delete();
        Session::flash('flash_message', __('validation.flash_messages.user.deleted'));
        return redirect('pre-order-admin/interviewers');
    }


    public function create(){

        $breadcrumbs = [

            'title' => __('layouts_admin.navigation.interviewer'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.interviewer'),
                    'active' => true,
                ]
            ]

        ];
        return view('interviewers.create',compact('breadcrumbs'));
    }

    protected function storeInterviewer(StoreInterviewerRequest $request){

        $request->validated();

        $data = $request->all();
        if(!empty($request['avatar'])){
            $avatarName = 'interviewer_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();
            $data['avatar']->storeAs('avatars',$avatarName,'public');
            $data['avatar']=$avatarName;
        }
        Interviewer::create($data);
        Session::flash('flash_message', __('validation.flash_messages.user.created'));
        return redirect('pre-order-admin/interviewers');

    }




}