<?php

namespace App\Repositories\Frontend\Auth;

use App\Repositories\BaseRepository;
use App\Models\Business;
use App\Models\Auth\User;
use DB;

class BusinessRepository extends BaseRepository 
{
    public function __construct(User $userModel, Business $businessModel)
    {
        $this->User     = $userModel;
        $this->Business = $businessModel;
    }
    
    public function create(array $data) : User
    {
        return DB::transaction(function () use ($data) {
            $user = $this->User::create([
                'first_name'        => $data['first_name'],
                'last_name'         => $data['last_name'],
                'email'             => $data['email'],
                'password'          => $data['password'],
                'active'            => 1,
                'confirmation_code' => md5(uniqid(mt_rand(), true)),
                'confirmed'         => 1,
            ]);
            
            if ($user) {
                
                $user->assignRole(config('access.users.business_role'));
                $user->syncPermissions(['view backend']);

                $result = $this->Business::create([
                    'name'    => $data['business_name'],
                    'user_id' => $user->id,
                    'details' => $data['business_details'],
                    'contact' => $data['contact'],
                    'address' => $data['address'],
                ]);
                
                return $user;
            } 
        });
    }
}
