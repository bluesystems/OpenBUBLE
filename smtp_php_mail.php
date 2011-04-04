<?php

// send smtp server
function smtpPHPMail($mail_server,$mail_user,$mail_password,$mail_port,$mail_subject,$mail_from,$mail_to,$mail_content){
         // Update 04/01/2011 by @jaccon

         // include the Pear Mail function
        require_once "Mail.php";

        // setting the values
        $from = "$mail_from";
        $to = "$mail_to";
        $subject = "$mail_subject";
        $body = "$mail_content";
        $host = "$mail_server";
        $port = "$mail_port";
        $username = "$mail_user";
        $password = "$mail_password";

        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
        array ('host' => $host,
        'port' => $port,
        'auth' => true,
        'username' => $username,
        'password' => $password));
        $mail = $smtp->send($to, $headers, $body);

        // message action
        if (PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }
}

// call the smtp php mail
smtpPHPMail("hots-server","mail-user","mail-password","mail-port","mail-subject","mail-from","mail-to","mail-content")

 ?>