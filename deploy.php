<h1>Auto-deploying to Test server</h1>

<p>Pulling ...
<?php 
	error_reporting(E_ALL);
	$output = exec('git pull');
?>
 done</p>

<pre>
	<?php echo $output; ?>
</pre>
