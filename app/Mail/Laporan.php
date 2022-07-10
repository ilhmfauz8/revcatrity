<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Laporan extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * The demo object instance.
     *
     * @var Laporan
     */
    public $laporan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($laporan)
    {
        //
        $this->laporan = $laporan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from(
            $this->laporan->senderEmail,
            $this->laporan->senderName)
            ->subject($this->laporan->subject)
            ->to($this->laporan->email)
            ->markdown('mail.laporan')
            // ->attach(url('upload/sample.pdf'), [
            //         'as' => 'sample.pdf',
            //         'mime' => 'application/pdf',
            // ])
            ->with([
                'message' => $this->laporan->message,
                'sender' => $this->laporan->senderName,
                'subject' => $this->laporan->subject,
            ]);
    }
}
