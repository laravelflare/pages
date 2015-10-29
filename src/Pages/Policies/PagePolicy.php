<?php

namespace LaravelFlare\Pages\Policies;

use LaravelFlare\Flare\Contracts\ModelAdminPoliceable;

class PagePolicy
{
    /**
     * Determine if the given Model can be viewed by the user.
     *
     * @param  $user
     * @param  $admin
     * 
     * @return bool
     */
    public function view($user, $admin)
    {
        return true;
    }
}
