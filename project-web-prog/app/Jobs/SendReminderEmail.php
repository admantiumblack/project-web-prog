<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lecturerContents;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($lecturerContents)
    {
        //
        $this->lecturerContents = $lecturerContents;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = $this->lecturerContents;
        foreach($contents as $content){
            $details = [
                'title' => $content->subject.' form for '.$content->period.'.',
                'header' => 'Dear Mr/Ms. '.$content->name.'.',
                'content' => 'Please fill '.
                        $content->subject.' form for '.$content->period."\n".
                        'Deadline for the form is: '.$deadline.'.'
            ];
            Mail::to($content->email)->send(new NotificationEmail($details));
        }
    }
}
