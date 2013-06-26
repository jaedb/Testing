<html>
<head>

<style>
* {
	margin: 0;
	padding:0;
	border:0;}
body {
	font-family: Arial, Helvetica;
	font-size: 14px;
	color: #444444;
	padding: 30px;}
</style>

</head>
<body>

<h1>Auto-deploying from GitHub</h1>

<br />

<p>Pulling ...
<?php 
	error_reporting(E_ALL);
	$output = `git pull`;
	$branch = `git rev-parse --abbrev-ref HEAD`;
?>
 done</p>

<br /><br />

<div style="height: 20px; margin-bottom: 20px; border-bottom: 2px solid #CCCCCC;"></div>

<p><strong>Pulling branch <?php echo $branch; ?></strong></p>

<br />

<div style="padding: 10px 20px; background: #EEEEEE;">
<pre><?php echo $output; ?></pre>
</div>

<div style="height: 20px; margin-bottom: 20px; border-bottom: 2px solid #CCCCCC;"></div>

	<?php
		
		echo '<pre>';
		print_r( json_decode($_POST, true) );
		echo '</pre>';
		
		// save to log
		$log_output = date('Y-m-d H:i:s') .' -- Successfully auto-pulled branch '.$branch;
		file_put_contents('../logs/git.log', $log_output, FILE_APPEND);

		// send an email
		$to      = 'James Barnsley <james@barnsley.co.nz>';
		$subject = 'Auto-Deployment';
		$headers = 'From: git@'.$_SERVER['SERVER_NAME'].'' . "\r\n" .
			'Reply-To: git@'.$_SERVER['SERVER_NAME'].'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'From: Website <git@'.$_SERVER['SERVER_NAME'].'>' . "\r\n";

		$message = '
			<div style="font-family: Arial, Helvetica, sans-serif;">
				<div style="font-size: 18px; font-weight: bold; padding: 5px 0;">Auto-deployment</div>
				<div style="padding: 5px 0;">The server has successfully pulled branch '.$branch.' from the GitHub repository.</div>
				<hr />
				<pre>'.$output.'</pre>
				<hr />
				<div style="padding: 5px 0;">See updated site here: <a href="'.$_SERVER['SERVER_NAME'].'">'.$_SERVER['SERVER_NAME'].'</a></div>';

		mail($to, $subject, $message, $headers);		
	?>

</body>
</html>
