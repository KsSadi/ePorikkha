<?php

namespace App\Traits;

trait AuthorizesRoles
{
    public function authorizeRole($role)
    {
        if (!auth()->user()->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
