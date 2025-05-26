<?php

namespace App\Facades;
use App\Models\Permission;

class Permissions {
    public static function loadPermissions($user_role) {
        $arr_permissions = Array();
        $perm = Permission::with('resource')->where('role_id', $user_role)->get();

        foreach($perm as $item) {
            $arr_permissions[$item->resource->nome] = (boolean) $item->permission;
        }
        session(['user_permissions' => $arr_permissions]);
    }

    public static function isAuthorized($resource) {
        if (!session()->has('user_permissions')) return false;
        $permissions = session('user_permissions');
        return array_key_exists($resource, $permissions);
    }

    public static function test() {
        return "<h1>PermissionsFacade - Running!!</h1>";
    }

}