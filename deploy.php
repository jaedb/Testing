<h1>Auto-deploying to Test server</h1>

<p>Pulling ... 

<?php $output = shell_exec('/var/www/test/public_html/ && git pull 2>&1'); ?>

done!</p>

<pre>
<?php echo $output; ?>
</pre>