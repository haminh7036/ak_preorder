<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        $breadcrumbs = [
            'title' => __('layouts_admin.navigation.profile'),
            'links' => [
                [
                    'text' => __('layouts_admin.navigation.profile'),
                    'active' => true,
                ]
            ]
        ];
        $member = Auth::user();
        return view('members.profile',compact('breadcrumbs','member'));
    }

    protected function updateProfile(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $requestData =$req->all();
        $member = Auth::user()->update($requestData);
        return redirect('my-profile');
    }

}
