<?php

namespace Agenda\Controllers;

use Agenda\Models\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController
{
    private  string $jsonFile;

    public function __construct(string $jsonFile)
    {
        $this->jsonFile = '../contacts.json';
    }
    public function readJsonFile()
    {
        return json_decode(file_get_contents($this->jsonFile), true);
    }

    public function add(Contact $contact)
    {
        $contacts = $this->readJsonFile($this->jsonFile);
        $contacts[] = $contact->toArray();
        file_put_contents($this->jsonFile, json_encode($contacts));
        $this->notifyEmail($contact);
    }

    public function notifyEmail(Contact $contact)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '57611aaaf24302';
            $mail->Password = 'bb645fb48fa33a';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('jhon.gutierrez24843@ucaldas.edu.co', 'Agenda');
            $mail->addAddress($contact->getEmail(), $contact->getName());     //Add a recipient
            

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Fuiste añadido a la Agenda de Jhon';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
