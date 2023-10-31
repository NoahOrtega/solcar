<script src="https://www.google.com/recaptcha/api.js?render=6LcT-pofAAAAAFDOO0jOw1xciCAV8g7BdS-dYaYv"></script>

Required Fields * <br><br>

<form class="form" id="mailForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div class="input-section">
        <label for="name">
            Your Name * <br> <?php if (isset($errors['name'])) echo '<small>'.$errors['name'].'</small><br>' ?><input
                type="text" name="name" id="name" placeholder="Full Name" value="<?php echo $inputs['name']  ?? '' ?>">
        </label>

    </div>
    <div class="input-section">
        <label for="phone">
            Phone Number * <br>
            <?php if (isset($errors['phone'])) echo '<small>'.$errors['phone'].'</small><br>' ?><input type="tel"
                name="phone" id="phone" placeholder="Phone Number" value="<?php echo $inputs['phone']  ?? '' ?>">
        </label>

    </div>
    <div class="input-section">
        <label for="email">
            Email Address <br>
            <?php if (isset($errors['email'])) echo '<small>'.$errors['email'].'</small><br>' ?><input type="email"
                name="email" id="email" placeholder="Email Address" value="<?php echo $inputs['email'] ?? '' ?>">
        </label>
    </div>
    <div class="h0neyP0t-section">
        <label for="first-name">
            H0neyP0t first name <br>
            <input type="text" name="first-name" id="first-name" style="display:none !important" tabindex="-1" autocomplete="false">
        </label>
        <label for="last-name">
            H0neyP0t last name <br>
            <input type="text" name="last-name" id="last-name" style="display:none !important" tabindex="-1" autocomplete="false">
        </label>

    </div>
    <div class="feedback-section">
        <label for="comment">
            Your Feedback <br> <?php if (isset($errors['comment'])) echo '<small>'.$errors['comment'].'</small><br>' ?>
            <textarea type="text" name="comment" id="comment" placeholder="Your Comment" cols="30"
                rows="10"><?php echo $inputs['comment']  ?? '' ?></textarea>
        </label>
    </div>
    <input class="submit-button" type="submit" name="submit" value="Submit">
</form>

<!-- <script>
       // when form is submitted
    $('#mailForm').submit(function() {
        // we stoped it
        event.preventDefault();
        // needs for recaptacha ready
        grecaptcha.ready(function() {
            // do request for recaptcha token
            // response is promise with passed token
            grecaptcha.execute('6LcT-pofAAAAAFDOO0jOw1xciCAV8g7BdS-dYaYv', {action: 'submit'}).then(function(token) {
                // add token to form
                $('#mailForm').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                    $.post("<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>",{ token: token}, function(result) {
                            console.log(result);
                            if(result.success) {
                                    alert('Thanks for posting comment.')
                            } else {
                                    alert(result);
                            }
                    });
            });;
        });
    });
    </script> -->

<?php
    // $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    //     $secretKey = "6LcT-pofAAAAAF_C3oKhKRn50mFthsRXdcF6oCKK";
    //     $ip = $_SERVER['REMOTE_ADDR'];

    //     // post request to server
    //     $url = 'https://www.google.com/recaptcha/api/siteverify';
    //     $data = array('secret' => $secretKey, 'response' => $captcha);

    //     $options = array(
    //         'http' => array(
    //         'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    //         'method'  => 'POST',
    //         'content' => http_build_query($data)
    //         )
    //     );

    //     $context  = stream_context_create($options);
    //     $response = file_get_contents($url, false, $context);
    //     $responseKeys = json_decode($response,true);
    //     header('Content-type: application/json');
    //     if($responseKeys["success"]) {
    //         echo json_encode(array('success' => 'true'));
    //     } else {
    //         echo json_encode(array('success' => 'false'));
    //     }
?>


<?php
// define("RECAPTCHA_V3_SECRET_KEY", '6LcT-pofAAAAAF_C3oKhKRn50mFthsRXdcF6oCKK');

// $token = $_POST['token'];
// $action = $_POST['action'];

// call curl to POST request
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);
// $arrResponse = json_decode($response, true);

// verify the response
// if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
//     // valid submission
//     echo "no problemo";
// } else {
//     // spam submission
//     echo "problemo".$arrResponse["score"];
// }
?> 