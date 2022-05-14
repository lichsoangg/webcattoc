<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class xacnhanMail extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $dataEmail;

    public function __construct($dataEmail)
    {
        $this->dataEmail = $dataEmail;
    }


    public function build()
    {
        return $this->view('Mail.xacnhan', ['data' => $this->dataEmail])->subject('Thông báo lịch cắt tóc !');
    }
}
