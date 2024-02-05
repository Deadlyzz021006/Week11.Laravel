<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class insertUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert 10 data random into users table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Inserting 10 data into users...');

        for ($i = 1; $i <= 10; $i++) {
            $email = 'user' . $i . '@gmail.id.com';

            // Check if email already exists
            if (User::where('email', $email)->exists()) {
                $this->warn("User with email $email already exists. Skipping...");
                continue;
            }

            $userData = [
                'name' => 'User' . $i,
                'email' => $email,
                'password' => Hash::make('password' . $i),
            ];

            User::create($userData);
        }

        $this->info('Dummy users inserted successfully.');
    }
    }
    

