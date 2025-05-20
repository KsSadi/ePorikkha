<?php

namespace App\Modules\Role\Http\Controllers;

use App\Traits\AuthorizesRoles;
use Illuminate\Http\Request;

class RoleController
{
    use AuthorizesRoles;

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->authorizeRole('admin');
    }
}
