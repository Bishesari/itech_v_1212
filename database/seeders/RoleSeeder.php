<?php
namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Newbie', 'global' => true],
            ['name' => 'SuperAdmin', 'global' => true, 'system' => true],

            ['name' => 'Founder'],
            ['name' => 'Manager'],
            ['name' => 'Assistant'],
            ['name' => 'Accountant'],
            ['name' => 'Teacher'],
            ['name' => 'Student'],
            ['name' => 'Examinee'],

            ['name' => 'QuestionMaker', 'global' => true],
            ['name' => 'QuestionAuditor', 'global' => true],
            ['name' => 'Examiner', 'global' => true],
            ['name' => 'Marketer', 'global' => true],
            ['name' => 'JobSeeker', 'global' => true],
            ['name' => 'Employer', 'global' => true],
        ];

        $branches = Branch::all();

        foreach ($roles as $role) {

            // نقش‌های Global (branch_id = null)
            if (!empty($role['global'])) {
                Role::firstOrCreate([
                    'name'       => $role['name'],
                    'guard_name' => 'web',
                    'branch_id'  => null,
                ]);

                continue;
            }

            // نقش‌های وابسته به شعبه
            foreach ($branches as $branch) {
                Role::firstOrCreate([
                    'name'       => $role['name'],
                    'guard_name' => 'web',
                    'branch_id'  => $branch->id,
                ]);
            }
        }
    }
}
