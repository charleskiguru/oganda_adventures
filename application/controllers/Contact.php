<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('phpmailer_lib');
    }
    function send_mail()
    {
            $response = false;
            $mail = $this->phpmailer_lib->load();
            $name = $this->input->post('contact_name');
            $subject = $this->input->post('contact_subject');
            $body = $this->input->post('contact_message');
            $emailfrom = $this->input->post('contact_email');
            $email = 'info@ogandaadventures.co.ke';


            $mail->CharSet = 'UTF-8';
            $mail->SetFrom($emailfrom, $name);

            //You could either add recepient name or just the email address.
            $mail->AddAddress($email,"Oganda Adventures");
            $mail->AddAddress($email);

            //Address to which recipient will reply
            $mail->addReplyTo($emailfrom,"Reply");
            // $mail->addCC("cc@example.com");
            // $mail->addBCC("bcc@example.com");

            //You could send the body as an HTML or a plain text
            $mail->IsHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $body;

            //Send email via SMTP
            //$mail->IsSMTP();
            $mail->SMTPAuth   = true; 
            $mail->SMTPSecure = "ssl";  //tls
            $mail->Host       = "mail.ogandaadventures.co.ke";
            $mail->Port       = 26; //you could use port 25, 587, 465 for googlemail
            $mail->Username   = "info@ogandaadventures.co.ke";
            $mail->Password   = "{iK_B&o{_8x9";

            if(!$mail->send()){
                $msg['success'] = false;
                // echo 'Message could not be sent.';
                // echo 'Mail Error:'.$mail->ErrorInfo;
            }
            else{
                $msg['success'] = true;
            }
            echo json_encode($msg);
    }
}