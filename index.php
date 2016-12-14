<?php

session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

?>


<!DOCTYPE html>

<html>

<head>
	<title>Contact Form</title>
	<meta charset="utf-8" />
	
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>

<body>
	<h2>Contact</h2>
	
	<div class="contact">

		<?php if(!empty($errors)): ?>
			<div class="w3-panel">
				<ul>
					<li><?php echo implode('</li><li>', $errors); ?></li>
				</ul>
			</div>
		<?php endif; ?> 

		<form action="contact.php" method="post">
			
			<p class="name">
				<input type="text" name="name" id="name" placeholder="John Doe" autocomplete="off" <?php echo isset($fields['name']) ? ' value="' . $fields['name'] . '"' : '' ?>>
				<label for="name">Name</label>
			</p>
			
			<p class="email">
				<input type="text" name="email" id="email" placeholder="mail@example.com" autocomplete="off" />
				<label for="email">Email</label>
			</p>	
		
			<p class="message">
				<textarea name="message" placeholder="Write something to us" /></textarea>
			</p>
			
			<p class="submit">
				<input type="submit" value="Send" />
			</p>

			<p>* Means a required field</p>
		</form>
	</div>
</body>

</html>

<?php

unset($_SESSION['errors']);
unset($_SESSION['fields']);


?> 
