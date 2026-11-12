<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('[PPDB] Pesan dari Calon Siswa: ' . $this->data['subject'])
                    ->replyTo($this->data['email'])
                    ->view('emails.contact')
                    ->with($this->data);
    }
}