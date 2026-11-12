<?php

namespace App\Policies;

use App\Models\Registration;
use App\Models\User;

class RegistrationPolicy
{
    public function view(User $user, Registration $registration)
    {
        return $user->id === $registration->user_id;
    }

    public function update(User $user, Registration $registration)
    {
        return $user->id === $registration->user_id;
    }

    public function delete(User $user, Registration $registration)
    {
        return $user->id === $registration->user_id;
    }
}