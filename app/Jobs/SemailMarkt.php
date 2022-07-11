<?php

namespace App\Jobs;

use App\Mail\SendMailMarkt;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;


class SemailMarkt implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private  $smailData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($smailData)
    {
       $this->smailData = $smailData;
     //  dd($this->mailData);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Mail::to($this->smailData['emailCorretor'])->send(new SendMailMarkt($this->smailData));
    }
}
