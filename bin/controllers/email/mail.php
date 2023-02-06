<?php

namespace controllers\mail;

class Email {
    private $to;
    private $subject;
    private $message;
    private $isHTML;

    public function __construct($to, $subject, $message, $isHTML = false) {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->isHTML = $isHTML;
    }

    public function send() {
        $headers = "From: sender@example.com\r\n";
        $headers .= "Reply-To: sender@example.com\r\n";

        if ($this->isHTML) {
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        }

        return mail($this->to, $this->subject, $this->message, $headers);
    }
}
