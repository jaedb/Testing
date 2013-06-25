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
		$headers = 'From: git@'.$_SERVER['SERVER_NAME'].'' . "\r\n" .
			'Reply-To: git@'.$_SERVER['SERVER_NAME'].'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
					
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Additional headers
		$headers .= 'To: James Barnsley <james@barnsley.co.nz>' . "\r\n";
		$headers .= 'From: Website <git@'.$_SERVER['SERVER_NAME'].'>' . "\r\n";

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
