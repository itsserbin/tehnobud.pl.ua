<?php

namespace App\Console\Commands;

use App\Mail\FixMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class FixEmailCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:mail';

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
        Mail::to('sendgridtesting@gmail.com')
            ->send(new FixMail());
        return 0;
    }
}
