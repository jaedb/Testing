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
		$headers = 'From: test@dev.jamesbarnsley.co.nz' . "\r\n" .
			'Reply-To: test@dev.jamesbarnsley.co.nz' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		$message = '
			<div style="font-family: Arial, Helvetica, sans-serif;">
				<div style="font-size: 18px; font-weight: bold; padding: 5px 0;">Auto-deployment</div>
				<div style="padding: 5px 0;">The server has successfully pulled from the GitHub repository.</div>
				<hr />
				<pre>
					'.$output.'
				</pre>
				<hr />
				<div style="padding: 5px 0;">See updated site here: <a href="'.$_SERVER['SERVER_NAME'].'">'.$_SERVER['SERVER_NAME'].'</a></div>';

		mail($to, $subject, $message, $headers);		
	?>
</pre>

<hr />
