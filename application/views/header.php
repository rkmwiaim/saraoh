<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

	 <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="/static/lib/bootstrap-select/bootstrap-select.min.css">
   <link href="/static/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
	if($this->session->flashdata('message')){
?>
<script>
	alert('<?=$this->session->flashdata('message')?>');
</script>
<?php
	}
?>

<div class="col-md-10">
