<?php

    /* Namespace alias */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mail extends PHPMailer
    {
        public function __construct(){
            try {
                //Server settings
               /* $this->SMTPDebug = 4;                                 // Enable verbose debug output
                $this->isSMTP();                                      // Set mailer to use SMTP
                $this->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $this->SMTPAuth = true;                               // Enable SMTP authentication
                $this->Username = 'ugoezenwankwo@gmail.com';                 // SMTP username
                $this->Password = '';                           // SMTP password
                $this->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $this->Port = 587;                                    // TCP port to connect to*/
            
                //Recipients
                /*
                $mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
                $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');
            
                //Attachments
                $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 
            
                $mail->send();
                */
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }

        public function sendMail($to, $subject, $body, $receiver_name)
        {
            $this->From = "from@yourdomain.com";
            $this->FromName = "Full Name";
            $this->addAddress($to, $receiver_name);
            $this->addReplyTo("info@devugo.com", "Reply");

            //CC and BCC
            $this->addCC("cc@example.com");
            $this->addBCC("bcc@example.com");

            $this->Subject = $subject;
            $this->Body = $body;
            $this->AltBody = "This is the plain text version of the email content";

            if($this->send()){
                echo 'sent';
            }else{
                echo  'not sent';;
            }

        }
    }