<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class xacnhanhuyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataEmail;

    public function __construct($dataEmail)
    {
        $this->dataEmail = $dataEmail;
    }


    public function build()
    {
        return $this->view('Mail.xacnhanhuy', ['data' => $this->dataEmail])->subject('Thông báo hủy lịch lịch cắt tóc !');
    }
}
