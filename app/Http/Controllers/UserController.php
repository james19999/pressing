<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ripository\RoleRipository;
use App\Ripository\UserRipository;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
     public function __construct(protected UserRipository $userRipository,protected RoleRipository $roleRipository){
      $this->userRipository=$userRipository;
      $this->roleRipository=$roleRipository;
     }
    public function index(){
      $users=$this->userRipository->get_all_users();
     return view('users.index',compact('users'));
    }

    public function create(){
     $roles=$this->roleRipository->get_all_role();
     return view('users.create',compact('roles'));
    }

     public function edit($id){
      $users= $this->userRipository->get_user($id);
      $roles=$this->roleRipository->get_all_role();
      $userRoles=$users->roles->pluck('name','name')->all();
      return view('users.edit',compact('roles','users' ,'userRoles'));
     }
    public function store(UserCreateRequest $userCreateRequest){

        return $this->userRipository->create_user($userCreateRequest->all());
    }

     public function update(UserUpdateRequest $userUpdateRequest,$id)
    {
     return $this->userRipository->update_user($userUpdateRequest->all(),$id);
    }

    public function destroy($id)
    {
    # code...
    return $this->userRipository->delete_user($id);
    }
}
