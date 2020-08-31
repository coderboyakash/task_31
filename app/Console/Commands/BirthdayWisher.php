<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use App\User;
use DateTime;
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
        $tomorrow = new DateTime('tomorrow');
        $birthdate = $tomorrow->format('Y-m-d');
        $all = User::all();
        foreach($all as $user){
            if($user->dob === $birthdate){
                $details = [
                    'name' => $user->fname . ' ' . $user->lname,
                ];
                \Mail::to($user->email)->send(new \App\Mail\SendMail($details));
            }
        }
    }
}
