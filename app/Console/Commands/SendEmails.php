<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a notification email to user.';

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
        $users = DB::table('users')->select('email', 'subs_team_id')->whereNotNull('subs_team_id')->get();

        foreach ($users as $user) {
            $matches = DB::select(
                DB::raw("SELECT * FROM matches WHERE date <= CURDATE() + INTERVAL 1 DAY AND score IS NULL
                          AND (home_team_id = ".$user->subs_team_id." OR away_team_id = ".$user->subs_team_id.");")
            );
            if(!empty($matches)) {
                $mails[] = $user->email;
            }
        }

        Mail::queue('send', function($m) use ($mails) {

            foreach ($mails as $mail) {
                $m->to($mail)->subject('The team you are subscribed to is playing tomorrow!');
            }
        });
    }
}
