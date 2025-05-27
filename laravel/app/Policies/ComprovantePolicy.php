<?php

namespace App\Policies;

use App\Models\User;
use App\Facades\Permissions;

class ComprovantePolicy {
    
    public function __construct() {
        
    }

    public function hasFullPermission() {
        return Permissions::isAuthorized('administrador.cadastrar');
    }
}