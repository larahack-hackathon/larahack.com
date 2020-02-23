<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toInsert = [
            ['name' => 'Hacker', 'is_admin' => false],
            ['name' => 'Administrator', 'is_admin' => true],
        ];
        foreach ($toInsert as $role) {
            Role::create($role);
        }
    }
}
