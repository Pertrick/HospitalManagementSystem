<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'userRole' => ['required'],
            'gender' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        /*
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'gender' => $input['gender'],
            'userRoles' => $input['roles'], 
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);

        */

        $user = new User();
      
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->gender = $input['gender'];
        $user->phone = $input['phone'];
        $user->userRole = $input['userRole'];
        $user->address = $input['address'];
        $user->password = Hash::make($input['password']);

        //dd($save);
        
        $user->save();

        $userRole = new UserRole();
        $userRole->user_id = $user->id;
        $userRole->role_id = $input['userRole'];

        $userRole->save();

        if($user->save() && $userRole->save()){
            return $user;
        }

        else{
            return false;
        }




    }
}
