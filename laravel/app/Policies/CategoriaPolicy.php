<?php

namespace App\Policies;

use App\Facades\Permissions;
use App\Models\User;

class CategoriaPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hasFullPermission() {
        return Permissions::isAuthorized('administrador.categorias');
    }
}
