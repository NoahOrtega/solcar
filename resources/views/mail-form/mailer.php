<div class="mail-result">
<?php
    $headers = "MIME-Version: 1.0" . "\r\n"; 
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

    $senderName = "Solcar Web Form";
    $senderAddress = "office@solcarelectric.com";

    $headers .= 'From:'.$senderName.'<'.$senderAddress.'>'; 

    $response = empty($email) ? "" : "<a href='mailto:".($email).
    "?subject=Response%20To%20Your%20Inquiry&body=Hello%20".$name.","."'>Click Here To Reply</a><br>";

    $comment = empty($comment) ? "N/A" : '<br><div style="border:1px solid; padding-left:4px;">'.nl2br(($comment)).'</div>';

    $message = 
    '<h2 style="font-weight:normal;"><b>'.($name).'</b> via Web Form</h2>'.
    $response.
    '<br><u>Name:</u> '.($name).
    '<br><u>Phone:</u> <a href="tel:'.($phone).'">'.($phone).'</a>'.
    '<br><u>Email:</u> '.($email).
    '<br><u>Message:</u> '.$comment;

    if(empty($inputs['first-name']) && empty($inputs['last-name'])){
        $mailSuccess = mail(
            "office@solcarelectric.com",
            'Form Response: '.substr($name, 0,22),
            $message,
            $headers
        );
    
        if (!$mailSuccess) {
            echo "<br><b style='color:red;'>Unfortunately there was a problem sending your email. Please give us a call or email us directly.</b>";
        } 
        else {
            echo "<br><h3><b>Message sent successfully!</b></h3>";
        }
    }
    else {
        echo "<br><h3><b>Message sent successfully!!</b></h3>";
        mail(
            "noahrortega@gmail.com",
            'Form Spam: '.substr($inputs['first-name'], 0,22),
            $message,
            $headers
        );
    }

?>
</div>

