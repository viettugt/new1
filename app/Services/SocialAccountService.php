<?php 

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\Models\User;
use NunoMaduro\Collision\Contracts\Provider;
// use App\Services\ProviderUser;
class SocialAccountService
{
    // public static function createOrGetUser(ProviderUser $providerUser, $social){
    //     $account = SocialAccount::WhereProvider($social)->WhereProviderUserId($providerUser->getId())->first();
    //     if($account){
    //         return $account->user;
    //     }else{
    //         $email = $providerUser->getEmail() ?? $providerUser->getNickname();
    //         $account = new SocialAccount([
    //             'provider_user_id'=> $providerUser->getId(),
    //             'provider'=>$social

    //         ]);
    //         $user = User::WhereEmail($email)->first();
    //         if(!$user){
    //             $user = User::create([
    //                 'email'=>$email,
    //                 'name'=>$providerUser->getName(),
    //                 'password'=>$providerUser->getName(),
    //             ]);
    //         }
    //         $account->user()->associate($user);
    //         $account->save();
    //         return $user;
    //     }
    // }
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}