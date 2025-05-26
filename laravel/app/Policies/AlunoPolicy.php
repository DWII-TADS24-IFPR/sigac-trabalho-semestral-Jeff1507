<?php

namespace App\Policies;

use App\Models\User;
use App\Facades\Permissions;

class AlunoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function hasFullPermission() {
        return Permissions::isAuthorized('administrador.alunos');
    }

    public function hasListStudentHoursPermission() {
        return Permissions::isAuthorized('aluno.gerar');
    }

    public function hasReportPermission() {
        return Permissions::isAuthorized('administrador.grafico.aluno');
    }
    public function hasValidateRegisterPermission() {
        return Permissions::isAuthorized('coordenador.avaliar');
    }

}
