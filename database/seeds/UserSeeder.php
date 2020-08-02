<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Super Admin', 'email'=> 'admin@gmail.com', 'password' => bcrypt('admin@123')]
        ];

        foreach($data as $record) {
            $create = User::UpdateOrCreate(
                [
                    'id' => $record['id']
                ],
                [
                    'name' => $record['name'],
                    'email' => $record['email'],
                    'password' => $record['password']
                ]
            );
        }
    }
}
