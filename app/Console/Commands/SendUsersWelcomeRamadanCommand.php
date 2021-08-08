<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendUsersWelcomeRamadanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ramadan:welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command will Send Welcome Ramadan Email to all System Users, Customers and Doctors';

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
        $users = \App\Models\User::all();
        foreach($users as $user){
            $this->info("Send Email to ".$user->email);
            sleep(2);
        }
        return 0;
    }
}
