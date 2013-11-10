<?php
    $email_to = "sweetjamaican@gmail.com";
	$email_from = "donotreply@onelovebodywork.org";
    $email_subject = "One Love Bodywork Reservation Made for $first_name $last_name";
	
	$email_message = "Name: $first_name $last_name\n";
	$email_message .= "Telephone: $phone\n";
	$email_message .= "Email: $email\n";
	$email_message .= "Location (0 for in-call, 1 for out-call): $location\n";
	$email_message .= "Address: $address\n";
	$email_message .= "Date: $date\n";
	$email_message .= "Time: $time\n";
	$email_message .= "Type of Service: $service\n";
	$email_message .= "Single Therapist: $single\n";
	$email_message .= "Aromatherapy: $aromatherapy\n";
	$email_message .= "Music: $music\n";
	$email_message .= "Draping: $draping\n";
	$email_message .= "Paraffin: $paraffin\n";
	$email_message .= "Allergies: $allergies\n";
	$email_message .= "Special requests: $requests\n";
	
	// create email headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$email_from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	$outcome = mail($email_to, $email_subject, $email_message, $headers);

?>
<html>
<body>

<br>
<br>
<?php 
if($outcome == true) {
	echo "<p>Thank you for making a reservation with One Love Bodywork! ";
	echo "A manager will be in touch with you shortly to confirm your request.<br><br>";
	echo "If you have any questions, please contact us at (954)378-8379 or (305)423-9807.</p>";
}
else {
	echo "Mail not accepted for delivery.";
}
?>
</body>
</html>