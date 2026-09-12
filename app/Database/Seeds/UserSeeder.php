<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Define your data with Myth Auth's specific password hashing requirements
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

        // 2. Extract identifiers to automatically clear stale records
        $usernames = array_column($users, 'username');
        $emails    = array_column($users, 'email');

        // 3. Prevent duplicate crashes by purging conflicts before insertion
        $this->db->table('users')->whereIn('username', $usernames)->orWhereIn('email', $emails)->delete();

        // 4. Safe insert
        $this->db->table('users')->insertBatch($users);

        // 5. Retrieve the structural database auto-incremented object rows
        $adminUser  = $this->db->table('users')->where('username', 'amin')->get()->getRow();
        $authorUser = $this->db->table('users')->where('username', 'aman')->get()->getRow();

        // 6. Find or create authentication group identities safely
        $adminGroup  = $this->db->table('auth_groups')->where('name', 'admin')->get()->getRow();
        $authorGroup = $this->db->table('auth_groups')->where('name', 'author')->get()->getRow();

        if (!$adminGroup) {
            $this->db->table('auth_groups')->insert(['name' => 'admin', 'description' => 'Administrator Access']);
            $adminGroup = $this->db->table('auth_groups')->where('name', 'admin')->get()->getRow();
        }
        if (!$authorGroup) {
            $this->db->table('auth_groups')->insert(['name' => 'author', 'description' => 'Author Access']);
            $authorGroup = $this->db->table('auth_groups')->where('name', 'author')->get()->getRow();
        }

        // 7. Wipe previous group mappings for these specific records
        $this->db->table('auth_groups_users')->whereIn('user_id', [$adminUser->id, $authorUser->id])->delete();

        // 8. Remap relations
        $groupUsers = [
            ['group_id' => $adminGroup->id, 'user_id' => $adminUser->id],
            ['group_id' => $authorGroup->id, 'user_id' => $authorUser->id],
        ];
        $this->db->table('auth_groups_users')->insertBatch($groupUsers);
    }
}
