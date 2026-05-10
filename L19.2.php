<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validation
    if (empty($_POST["reg_name"])) $errors[] = "Name is required.";
    if (empty($_POST["reg_email"])) $errors[] = "Email is required.";
    elseif (!filter_var($_POST["reg_email"], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($_POST["reg_age"])) $errors[] = "Age is required.";
    elseif (!is_numeric($_POST["reg_age"]) || $_POST["reg_age"] < 1 || $_POST["reg_age"] > 120) $errors[] = "Age must be between 1 and 120.";
    if (empty($_POST["reg_password"])) $errors[] = "Password is required.";
    if (empty($_POST["reg_gender"])) $errors[] = "Gender is required.";
    if (empty($_POST["reg_course"])) $errors[] = "Course is required.";
    if (empty($_POST["reg_message"])) $errors[] = "Message is required.";

    if (!empty($errors)) {
        echo "<h3>Errors:</h3>";
        foreach ($errors as $err) { echo htmlspecialchars($err) . "<br>"; }
    } else {
        // Send email with PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com';
            $mail->Password = 'your_app_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('your_email@gmail.com', 'Student Registration Form');
            $mail->addAddress('your_email@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'New Student Registration';
            $mail->Body    = "
                <strong>Name:</strong> " . htmlspecialchars($_POST["reg_name"]) . "<br>
                <strong>Email:</strong> " . htmlspecialchars($_POST["reg_email"]) . "<br>
                <strong>Age:</strong> " . htmlspecialchars($_POST["reg_age"]) . "<br>
                <strong>Gender:</strong> " . htmlspecialchars($_POST["reg_gender"]) . "<br>
                <strong>Course:</strong> " . htmlspecialchars($_POST["reg_course"]) . "<br>
                <strong>Hobbies:</strong> " . (!empty($_POST["reg_hobbies"]) ? implode(", ", array_map('htmlspecialchars', $_POST["reg_hobbies"])) : "None") . "<br>
                <strong>Message:</strong> " . nl2br(htmlspecialchars($_POST["reg_message"])) . "<br>
            ";

            $mail->send();
            echo "<h3>Registration Successful!</h3>Message sent!";
        } catch (Exception $e) {
            echo "Error sending message: {$mail->ErrorInfo}";
        }
    }
}
?>
