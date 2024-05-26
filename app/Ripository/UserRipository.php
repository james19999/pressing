<?php
namespace App\Ripository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRipository{

  public function get_all_users(){

    return User::all();
  }


  public function get_user($id){
   return User::findOrFail($id);
  }


  public function create_user(array $data){
   $user= User::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password']),
        'roles'=>$data['roles']
    ]);

   $user->syncRoles($data['roles']);

   return redirect('users')->with('success','Utilisateur créer');

  }

  public function update_user(array $data,$id){
    $user=$this->get_user($id);

       if($user){

         $user->update([
               'name'=>$data['name'],
               'email'=>$data['email'],
               'roles'=>$data['roles']

           ]);
           $user->syncRoles($data['roles']);
       }

    return redirect('users')->with('success','Utilisateur modifié');

  }

  public function delete_user($id){
   $user=$this->get_user($id);
   $user->delete();
   return redirect('users')->with('success','Utilisateur supprimé');
  }
}
