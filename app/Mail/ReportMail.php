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
    }

    public function build()
    {
        $dir = "erp/reports/". $this->report->id."/pdf";
        $files = glob($dir);
        return $this
            ->from($this->user)
            ->to('test@test.com')
            ->subject('Rapport')
            ->view('_tabler.mails.report_mail')
            // ->attachFromStorageDisk('public',$files);
            ->attachFromStorageDisk('public',$this->report->pdf);
    }
}
