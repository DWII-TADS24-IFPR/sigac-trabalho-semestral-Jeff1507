<?php

namespace App\Policies;

use App\Facades\Permissions;
use App\Models\User;

class DocumentoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hasFullPermission($user) {
        return  Permissions::isAuthorized('aluno.solicitar');
    }

    public function hasAssessPermission() {
        return Permissions::isAuthorized('administrador.avaliar');
    }
}
