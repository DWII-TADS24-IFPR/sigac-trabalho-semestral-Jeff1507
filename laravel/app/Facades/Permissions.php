<?php

namespace App\Facades;
use App\Models\Permission;

class Permissions {
    public static function loadPermissions($user_role_id) {
        $arr_permissions = [];
        $perm = Permission::with('resource')->where('role_id', $user_role_id)->get();

        foreach ($perm as $item) {
            $arr_permissions[$item->resource->nome] = (boolean) $item->permission;
        }
        session(['user_permissions' => $arr_permissions]);
        dd(session('user_permissions'));
    }

    public static function isAuthorized($resource) {
        $permissions = session('user_permissions');
        return array_key_exists($resource, $permissions);
    }

    public static function test() {
        return "<h1>PermissionsFacade - Running!!</h1>";
    }

}