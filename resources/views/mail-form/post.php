<?php
const MAX_FIELD_LENGTH = 321;
const MAX_COMMENT_LENGTH = 5000;

const NAME_REQUIRED = 'Please include your name or company';
const PHONE_REQUIRED = 'Please include your phone number';
const EMAIL_INVALID = 'Please enter a valid email';
const COMMENT_LENGTH_INVALID = 'This field must be under 5000 characters.';
const FIELD_LENGTH_INVALID = 'Must be under 300 characters.';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//sanitize honeypots
$firstName = test_input($_POST["first-name"]);
$lastName = test_input($_POST["last-name"]);
$inputs['first-name'] = $firstName;
$inputs['last-name'] = $lastName;

//sanitize and validate name
$name = test_input($_POST["name"]);
$inputs['name'] = $name;
//not empty
if (empty($name)) {
        $errors['name'] = NAME_REQUIRED;
} 
else if(strlen($name) > MAX_FIELD_LENGTH ){
    $errors['name'] = FIELD_LENGTH_INVALID;
}

//sanitize & validate phone
$phone = test_input($_POST["phone"]);
$inputs['phone'] = $phone;
//not empty
if (empty($phone)) {
        $errors['phone'] = PHONE_REQUIRED;
} else if(strlen($phone) > MAX_FIELD_LENGTH ){
    $errors['phone'] = FIELD_LENGTH_INVALID;
}

// sanitize & validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
//email invalid
if (!empty($email)) {
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
}

// sanitize & validate comment
$comment = test_input($_POST["comment"]);
$inputs['comment'] = $comment;
//not empty
if (!empty($comment)) {
    if (strlen($comment) >  MAX_COMMENT_LENGTH) {
        $errors['comment'] = COMMENT_LENGTH_INVALID;
    }
} else if(strlen($comment) > MAX_COMMENT_LENGTH ){
    $errors['comment'] = COMMENT_LENGTH_INVALID;
}
?>

<?php if (count($errors) === 0) : ?>
    <section class="thank-you">
        <h2>
            Thank you <?php echo $name ?> for your message!
        </h2>
        <div><br>We'll reach out to you soon at <?php echo $phone; if ($email != "") echo " or by email at ".$email?> </div>
        
    </section>

<?php endif ?>