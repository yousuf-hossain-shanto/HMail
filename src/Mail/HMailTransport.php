<?php
namespace YHShanto\HMailer\Mail;

use Illuminate\Mail\Transport\Transport;
use Illuminate\Support\Facades\Log;
use Swift_Mime_SimpleMessage;
use Swift_Mime_SimpleMimeEntity;

class HMailTransport extends Transport
{
	
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)

    {

		$headers  = "From: " . config('mail.from.name') . " < " . config('mail.from.address') . " >\n";
	    $headers .= "Cc: " . config('mail.from.name') . " < " . config('mail.from.address') . " >\n"; 
	    $headers .= "X-Sender: " . config('mail.from.name') . " < " . config('mail.from.address') . " >\n";
	    $headers .= 'X-Mailer: ' . config('app.name');
	    $headers .= "X-Priority: 1\n"; // Urgent message!
	    $headers .= "Return-Path: " . config('mail.from.address') . "\n"; // Return path for errors
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        foreach ($message->getTo() as $email => $name) {

        	mail($email, $message->getSubject(), $message->getBody(), $headers);

        }
    }
}