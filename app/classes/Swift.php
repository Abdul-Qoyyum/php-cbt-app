<?php

    /* Namespace alias */
    use SwiftMailer\SwiftMailer\SwiftMailer;

    class Swift extends SwiftMailer
    {


        public function sendMail($to, $subject, $body, $receiver_name)
        {
            require_once 'vendor/autoload.php';
            // Create the Transport
            $transport = (new Swift_SmtpTransport('devugo.com', 25))
            ->setUsername('mailer@devugo.com')
            ->setPassword('Tubelum1234')
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Please subscribe my channel'))
            ->setFrom(['info@devugo.com' => 'Ugo Eze'])
            ->setTo(['ugoezenwankwo@gmail.com' => 'Devugo Designs'])
            ->setBody('
                Thanks for signing up!<br>
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br><br><br>
            
            ------------------------<br>
            Username: hugo<br>
            Password: Tubelum1234<br>
            ------------------------<br><br>
            
            Please click this link to activate your account:<br>
            http://www.devugo.com/verify.php?email=ugoezenwankwo@gmail.com&hash=ldlo4oewol
                ', 'text/html')
            ;

            // Send the message
            $result = $mailer->send($message);

        }
    }