<?php

namespace App\Service;

use App\Enums\UserType;
use App\Jobs\UserJob;
use App\Model\Register;
use App\Repositories\Interfaces\IUserRepository;
use App\Service\Interfaces\IUserService;
use App\User;
use App\Util\FunctionUtil;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    public function __construct(IUserRepository $userRepository) {
        $this->function=new FunctionUtil();
        $this->userRepository = $userRepository;
    }

    public function getByUserType($type){
        return  $this->userRepository->getWhere([['role',$type]]);
    }

    public function getBylimit($limit,$query=[])
    {
        return $this->userRepository->getBylimit($limit,$query);
    }

    public function getUserCount($type){
        return $this->userRepository->getCount([['role',$type]]);
    }

    public function save(Register $user){
        try{
            $password=$user->password;
            DB::beginTransaction();
            $user->status=1;
            $user->password=Hash::make($user->password);
            $user->email_verified_at=now();
            $user->save();
            DB::commit();
            dispatch(new UserJob($user->email,$password));
        }
        catch(\Exception $e){
            DB::rollBack();
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function getById($id){
        try{
            return $this->userRepository->get($id);
        }
        catch(\Exception $e){
            throw new Exception("Service Down! Please try again later");
        }
    }

    public function delete($id){
        try{
            DB::beginTransaction();
            $this->userRepository->delete($id);
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return "Service Down! Please try again later";
        }
    }

    public function update($id,User $data){
        try{
            $filename=null;
            if($data->profile){
                $file = $data->profile;
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =Carbon::now()->timestamp.'.'.$extension;
                $file->move('uploads/profile/', $filename);
                $filename='/uploads/profile/'.$filename;
            }
            DB::beginTransaction();
            $user=$this->userRepository->get($id);
            $user->name=$data->name;
            $user->contact=$data->contact;
            $user->gender=$data->gender;
            $user->country=$data->country;
            if($filename != null){
                $user->profile=$filename;
            }
            $user->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return "Service Down! Please try again later";
        }
    }

    public function password($id,User $data){
        try{
            DB::beginTransaction();
            $user=$this->userRepository->get($id);
            $user->password=Hash::make($data->password);
            $user->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return "Service Down! Please try again later";
        }
    }

    public function status($id){
        try{
            DB::beginTransaction();
            $user=$this->userRepository->get($id);
            if($user->status){
                $user->status=false;
            }
            else{
                $user->status=true;
            }
            $user->save();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return "Service Down! Please try again later";
        }
    }
}
