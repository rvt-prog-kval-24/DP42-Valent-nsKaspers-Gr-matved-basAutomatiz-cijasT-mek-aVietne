<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        $this->userService->store([
            'name' => 'John Smith',
            'email' => 'test@gmail.com',
            'password' => '12345678',
        ]);
    }
}
