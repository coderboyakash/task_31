<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\User;
class BirthdayWisher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:wisher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will wish Happy birthday to all Registered Users';

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
     * @return mixed
     */
    public function handle()
    {
        $all = User::all();
        foreach($all as $user){
            echo $user->id;
        }
    }
}
