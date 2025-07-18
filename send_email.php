<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $mobile = htmlspecialchars(trim($_POST['mobile'] ?? ''));
    $service = htmlspecialchars(trim($_POST['service'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    $to = "hello@adelvisionstudios.com"; 
    $subject = "New Service Inquiry from $name";
    $body = "Name: $name\nEmail: $email\nMobile: $mobile\nService: $service\nMessage: $message";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you for contacting us! We will get back to you soon.'); window.location.href='service.html';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error sending your message. Please try again later.'); window.location.href='service.html';</script>";
    }
} else {
    header('Location: service.html');
    exit();
} 