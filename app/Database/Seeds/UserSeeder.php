<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Clear out any previous incomplete seed users to prevent username/email duplicate crashes
        $this->db->table('users')->whereIn('username', ['admin', 'author'])->delete();

        // 2. Prepare User Data
        $users = [
            [
                'email'         => 'amin@example.com',
                'username'      => 'amin',
                'password_hash' => password_hash(base64_encode(hash('sha384', 'secret123', true)), PASSWORD_DEFAULT),
                'active'        => 1, 
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'email'         => 'aman@example.com',
                'username'      => 'aman',
                'password_hash' => password_hash(base64_encode(hash('sha384', 'secret123', true)), PASSWORD_DEFAULT),
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]
        ];

        // 3. Insert Users safely
        $this->db->table('users')->insertBatch($users);

        // 4. Fetch the real auto-incremented IDs of the users we just made
        $adminUser  = $this->db->table('users')->where('username', 'admin')->get()->getRow();
        $authorUser = $this->db->table('users')->where('username', 'author')->get()->getRow();

        // 5. Fetch existing group IDs safely instead of blindly inserting hardcoded IDs
        $adminGroup  = $this->db->table('auth_groups')->where('name', 'admin')->get()->getRow();
        $authorGroup = $this->db->table('auth_groups')->where('name', 'author')->get()->getRow();

        // 6. Create groups ONLY if they don't exist yet
        if (!$adminGroup) {
            $this->db->table('auth_groups')->insert(['name' => 'admin', 'description' => 'Administrator Access']);
            $adminGroup = $this->db->table('auth_groups')->where('name', 'admin')->get()->getRow();
        }
        if (!$authorGroup) {
            $this->db->table('auth_groups')->insert(['name' => 'author', 'description' => 'Author Access']);
            $authorGroup = $this->db->table('auth_groups')->where('name', 'author')->get()->getRow();
        }

        // 7. Clear old relational ties to prevent unique key constraints
        $this->db->table('auth_groups_users')->whereIn('user_id', [$adminUser->id, $authorUser->id])->delete();

        // 8. Assign Users to Groups using real fetched structural IDs
        $groupUsers = [
            ['group_id' => $adminGroup->id, 'user_id' => $adminUser->id],
            ['group_id' => $authorGroup->id, 'user_id' => $authorUser->id],
        ];
        $this->db->table('auth_groups_users')->insertBatch($groupUsers);
    }
}
