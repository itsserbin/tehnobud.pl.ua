<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Init extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init  {--reset=false} {--seed=false}';
    
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init app';
    
    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $reset = $this->option('reset') === 'true';
        $seed  = $this->option('seed') === 'true';
        
        if ($reset)
        {
            $this->call('migrate:fresh');
            $this->call('admin:create');
        } else
        {
            $this->call('migrate');
        }
        
        if ($seed)
        {
            $this->info('Seed');
            $this->call('db:seed');
        }
        
        return 0;
    }
    
}
