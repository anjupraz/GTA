<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\Model\Register;
use App\Service\Interfaces\IUserService;
use App\User;
use App\Util\FunctionUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function __construct(IUserService $userService) {
        $this->function=new FunctionUtil();
        $this->userService = $userService;
    }


    public function menu()
    {
        return view('backend.users.menu');
    }

    public function admin()
    {
        $userList= $this->userService->getByUserType(UserType::Admin);
        $userType='Admin';
        return view('backend.users.index',compact('userList','userType'));
    }

    public function staff()
    {
        $userList= $this->userService->getByUserType(UserType::Staff);
        $userType='Staff';
        return view('backend.users.index',compact('userList','userType'));
    }

    public function createAdmin()
    {
        $userType='Admin';
        return view('backend.users.create',compact('userType'));
    }

    public function createStaff()
    {
        $userType='Staff';
        return view('backend.users.create',compact('userType'));
    }

    public function storeAdmin(UserRequest $request)
    {
        try{

            $user =new Register();
            $user=$this->function->getObject($user,$request);
            $user->role=UserType::Admin;
            $this->userService->save($user);
            toastr()->success('Admin has been added.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add admin.'.$e,'Failed');
        }
        return redirect()->route('users.admin');
    }

    public function storeStaff(UserRequest $request)
    {
        try{

            $user =new Register();
            $user=$this->function->getObject($user,$request);
            $user->role=UserType::Staff;
            $this->userService->save($user);
            toastr()->success('Staff has been added.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to add staff.'.$e,'Failed');
        }
        return redirect()->route('users.staff');
    }

    public function edit()
    {
        $user=$this->userService->getById(Auth::user()->id);
        if(Auth::user()->role == UserType::Staff){
            return view('frontend.dashboard.profile',compact('user'));
        }
        return view('backend.users.edit',compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        try{
            $user=new User();
            $user=$this->function->getObject($user,$request);
            $this->userService->update(Auth::user()->id,$user);
            toastr()->success('Profile updated.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to update profile.','Failed');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        try{
            if(Auth::user()->id != $id){
                $this->userService->delete($id);
                toastr()->success('User deleted successfully.','Success');
            }
            else{
                toastr()->warning('You are trying to delete yourself.','Failed');
            }

        }
        catch(\Exception $e){
            toastr()->error('Failed to delete user.','Failed');
        }
        return redirect()->back();
    }

    public function password()
    {
        if(Auth::user()->role == UserType::Staff){
            return view('frontend.dashboard.password');
        }
        return view('backend.users.password');
    }

    public function changePassword(PasswordRequest $request)
    {
        try{
            $user=new User();
            $user=$this->function->getObject($user,$request);
            $this->userService->password(Auth::user()->id,$user);
            toastr()->success('Password has been changed.','Success');
        }
        catch(\Exception $e){
            toastr()->error('Failed to change password.','Failed');
        }
        return redirect()->back();
    }

    public function status($id)
    {
        try{
            if(Auth::user()->id != $id){
                $this->userService->status($id);
                toastr()->success('User status updated.','Success');
            }
            else{
                toastr()->warning('You cannot change your status.','Failed');
            }

        }
        catch(\Exception $e){
            toastr()->error('Failed to update user status.','Failed');
        }
        return redirect()->back();
    }
}
