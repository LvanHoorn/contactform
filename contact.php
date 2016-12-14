<?php

session_start();

require_once 'libs/phpmailer/PHPMailerAutoload.php';

$error = array();

if(isset($_POST['name'], $_POST['email'], $_POST['message'])) {

		$fields = [
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'message' => $_POST['message']
		];

		foreach ($fields as $field => $data) {
				if(empty($data)) {
						$errors[] = 'The ' . $field . ' field is required!';
 				}
		}

		if (empty($errors)) {
				
				$m = new PHPMailer;

				$m->isSMTP();
				$m->SMTPAuth = true;

				$m->Host = 'smtp.gmail.com';
				$m->Username = 'piet@gmail.com';
				$m->Password = 'piet!';
				$m->SMTPSecure = 'ssl';
				$m->Port = 465;

				$m->isHTML();

				$m->Subject = 'Contact form submitted';
				$m->Body = 'From: ' . $fields['name'] . ' (' . $fields['email'] . ') 
				<p>' . $fields['message'] . '</p>';

				$m->FromName = 'Contact';

				$m->AddAddress('piet@gmail.com', 'Piet');

				if ($m->send()) {
						header('Location: thanks.php');
						die();
				} else {
					 $errors[] = 'Sorry, could not send email. Try again later.'
				}
		}

} else {

		$errors[] = 'Something went wrong.';

}

$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

header('Location: thanks.php');