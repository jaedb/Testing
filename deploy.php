<h1>Auto-deploying to Test server</h1>

<p>Pulling ...
<?php 
	error_reporting(E_ALL);
	$output = exec('git pull');
?>
 done</p>

<hr />
 
<pre>
	<?php 
		
		// output
		print_r( $output );
		
		// save to log
		file_put_contents('/var/www/test/logs/git.log', $output, FILE_APPEND);
		
		// send an email
		$to      = 'james@barnsley.co.nz';
		$subject = 'Auto-Deployment';
		$message = 'Succesfully pushed';
		$headers = 'From: test@dev.jamesbarnsley.co.nz' . "\r\n" .
			'Reply-To: test@dev.jamesbarnsley.co.nz' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);		
	?>
</pre>

<hr />
