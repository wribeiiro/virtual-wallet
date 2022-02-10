<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "user:create {--t|type=: choose the profile type (1 - client \n 2 - shopkeeper)}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

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
    public function handle()
    {
        $user = User::factory()->create();
        $user->profile = (int) $this->option('type') === 1 
            ? 'client' 
            : 'shopkeeper';
        $user->save();

        $this->info("Created user: {$user->email} \n Usertype: {$user->profile}");
    }
}