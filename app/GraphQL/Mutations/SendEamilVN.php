<?php

namespace App\GraphQL\Mutations;

class SendEamilVN
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $guard = \Auth::guard(config('sanctum.guard', 'web'));

        /** @var \App\Models\User|null $user */
        $user = $guard->user();

        $user->sendEmailVerificationNotification();
//        $guard->logout();

return $user;



    }
}
