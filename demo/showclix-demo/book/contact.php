<?php
	
	$sender_name = $_POST['name'];
	$sender_email = $_POST['email'];
	$subject = $_POST['subject'];
	$mail_body = $_POST['message'];
	
	$body = $sender_name." sent a new message for you<br><br> Name: ".$sender_name."<br>Email: ".$sender_email."<br>Subject: ".$subject."<br>Message: ".$mail_body;
	
	sendMail($sender_name , $sender_email, $body);
	
	function sendMail($sender, $sender_mail, $body) {
		$to = 'receiver@domain.com'; // Set Receiver Email Here
		$myemail = 'sender@domain.com'; // Set Sender Email Here
		$subject = "New Flourish Client"; // Set Subject Here
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";            
		$headers .= "From: Flourish <sender@domain.com>\r\n"; // Set Header Here
		
		$message = $body;
		
		$sentmail = mail($to,$subject,$message,$headers);
		if($sentmail) {
			$res = array(
				'status'=>'success',
				'msg' => 'Request submitted successfully.<br>We will contact with you very soon.' // Set Successful Message Here
			);  
		}
		else {
			$res = array(
				'status'=>'fail',
				'msg' => 'Mail not sent.<br>Please inform the author!' // Set Unsuccessful Message Here
			);
		}
		echo json_encode($res);
	}

?>