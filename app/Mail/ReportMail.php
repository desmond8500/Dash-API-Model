<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $report;

    public function __construct($user, $report)
    {
        $this->user = $user;
        $this->report = $report;
        // $this->to = $to;
    }

    public function build()
    {
        $path = pathinfo($this->report->pdf);

        return $this
            ->from($this->user['email'])
            // ->to($this->to)
            ->subject(basename($path['filename']))
            ->view('_tabler.mails.report_mail')
            ->attachFromStorageDisk('public',$this->report->pdf);
    }
}
