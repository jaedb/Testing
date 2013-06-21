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
		print_r( $output );
		file_put_contents('/var/www/test/logs/git.log', $output, FILE_APPEND);
	?>
</pre>

<hr />
