<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComplaintPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

}
