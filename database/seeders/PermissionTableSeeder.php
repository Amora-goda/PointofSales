<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'اضافة صلاحية',
            'عرض صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',
            'قائمة الفواتير',
            'عرض الفواتير',
            'اضافة فاتورة جديدة',
            'الإعدادات',
            'الاقسام',
            'المنتجات',
            'المستخدمين',
            'صلاحيات المستخدمين',
            'قائمة المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
