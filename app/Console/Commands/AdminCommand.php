<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $name     = $this->ask('What is the name?');
        $login    = $this->ask('What is the login?');
        $password = $this->getPassword();

        $user           = new User();
        $user->login    = $login;
        $user->password = bcrypt($password);
        $user->name     = $name;

        $user->save();

        $this->info('Admin was successfully created');

        return 0;
    }

    /**
     * @return string
     */
    private function getPassword(): string
    {
        $password        = $this->secret('What is the password?');
        $passwordConfirm = $this->secret('Please, confirm password');

        if ($password !== $passwordConfirm) {
            $this->warn('Wrong password confirmation! Try again');

            return $this->getPassword();
        }

        return $password;
    }

}
