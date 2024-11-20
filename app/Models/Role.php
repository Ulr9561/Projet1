<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['role', 'ref_id', 'user_id'];

    public static function roleConstants()
    {
        return ['admin', 'user'];
    }

    public static function assignRole($userId, $role)
    {
        $roles = self::roleConstants();

        if (!in_array($role, $roles)) {
            throw new \InvalidArgumentException("Rôle '{$role}' non défini.");
        }

        try {
            $roleModel = Role::where('role', '=', $role);
            if (!$roleModel) {
                $roleModel = self::create([
                    'role' => $role,
                ]);
            }
            User::where('id', '=', $userId)->update(['role_id' => $roleModel->id,]);
            return $roleModel;
        } catch (\Exception $e) {
            throw new \Exception("Erreur lors de l'assignation du rôle : " . $e->getMessage());
        }
    }
}
