<?php

namespace App\Console\Commands;

use App\Models\User;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use function Laravel\Prompts\password;
use Illuminate\Support\Facades\Validator;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create';
    protected $description = 'Create a new user';

    public function handle()
    {
        // Prompt for user name
        $name = text('Enter user name:');
        $nameValidator = Validator::make(['name' => $name], [
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);
        if ($nameValidator->fails()) {
            $this->error($nameValidator->errors()->first('name'));
            return;
        }

        // Prompt for user email
        $email = text('Enter user email:');
        $emailValidator = Validator::make(['email' => $email], [
            'email' => 'required|email|max:255|unique:users,email',
        ]);
        if ($emailValidator->fails()) {
            $this->error($emailValidator->errors()->first('email'));
            return;
        }

        // Prompt for user password
        $password = password('Enter user password:');
        $passwordValidator = Validator::make(['password' => $password], [
            'password' => 'required|string|min:8',
        ]);
        if ($passwordValidator->fails()) {
            $this->error($passwordValidator->errors()->first('password'));
            return;
        }

        // Create the user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $this->info('User created successfully!');
    }
}
