<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$portfolio_to_get = 'mcdonalds-it';

$portfolio_items = array (

  'mcdonalds-it' => array (
    'title' => 'McDonalds IT',
    'link' => 'http://www.mcdonaldsit.co.nz',
    'text' => 'Yah yah yah, yup.',
  ),
  
  'mcdonalds-it' => array (
    'title' => 'McDonalds IT',
    'link' => 'http://www.mcdonaldsit.co.nz',
    'text' => 'Yah yah yah, yup.',
  ),
  
);

$item_title = $portfolio_items[$portfolio_to_get][title];
$item_link = $portfolio_items[$portfolio_to_get][link];
$item_image = $portfolio_items[$portfolio_to_get][text];

?>
    
	<h1><? echo $item_title ?></h1>
    
	<p><? echo $item_image ?></p>
    
	<p><a href="<? echo $item_link ?>">Link</a></p>

</body>
</html>