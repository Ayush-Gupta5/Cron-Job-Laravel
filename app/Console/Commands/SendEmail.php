<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Receiver;
use App\Jobs\SendEmailJob;
use App\Models\EmailScheduler;
use Illuminate\Console\Command;

class SendEmail extends Command
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
    protected $description = 'Send Schedule Emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDate = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();
        // dd($currentDate,$currentTime );
        $emailScheduler=EmailScheduler::all();
        $Schedule=[];
        foreach($emailScheduler as $data){
            $Schedule=$data;
        }
        // dd($d->time,$d->date,$currentDate,$currentTime);
        if($Schedule->time == $currentTime ){
            if($Schedule->date ==$currentDate){
                    $users = receiver::where('Active', true)->get();

                foreach ($users as $user) {
                    // Dispatch job to send email to each user
                    SendEmailJob::dispatch($user);
                }
            }
        }
    }
}
