<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Calculation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\SuccessMail;
use App\Models\User ;


class NotifyAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NotifyAdmin:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to admin';

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
        $current_date = date('Y-m-d H:m');
        $list = DB::table('calculation')->where('created_at', '=', $current_date)->orderBy('id', 'desc')->first();
        $admin = User::where('is_admin',1)->get();

        if(isset($list) && !empty($list))
        {
            //send mail
            $fromMail = 'your email';
            $fromMailPassword = 'password';
            $subjectContent = 'Calculation entries added';
                        
            $data = ['email' => $admin->email, 'subjectContent' => $subjectContent, 'fromMail' => $fromMail, 'fromMailPassword' => $fromMailPassword];

            $mail = Mail::to($data['email'])->send(new SuccessMail($data));
        }
    }
}
