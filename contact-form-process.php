<?php
if (isset($_POST['Email'])) {

    // EDIT THE FOLLOWING TWO LINES:
    $email_to = "yourhomepestcontrol@gmail.com";
    $email_subject = "Recent Service Inquiry";

    function problem($error)
    {
        echo "We're sorry, but there was at least one error found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please fix these errors to continue.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Phone']) ||
        !isset($_POST['Zip']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $phone = $_POST['Phone']; // required
    $zip = $_POST['Zip']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $phone_exp = '/^\+?\(\d{3}\)\s?\d{3}\-\d{4}$/';
    $zip_code_exp = '/^\d{5}$/';

    if (!preg_match($phone_exp, $phone)) {
        $error_message .= 'The phone number you entered does not appear to be valid.<br>';
    }

    if (!preg_match($zip_code_exp, $zip)) {
        $error_message .= 'The zip code you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 200) {
        $error_message .= 'The message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Phone Number: " . clean_string($phone) . "\n";
    $email_message .= "Zip Code: " . clean_string($zip) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email_to . "\r\n" .
        'Reply-To: ' . $email_to . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    echo "Thank you for reaching out to us! We will contact you within the next 1-2 business days. Have a great day!";
}

