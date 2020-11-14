<?php

namespace App\Policies;

use App\Models\{Travel,  User};
use Illuminate\Auth\Access\HandlesAuthorization;

class TravelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function isOwner(User $user,  Travel $travel)
    {
        return  $user->id === $travel->user_id;
    }
}
