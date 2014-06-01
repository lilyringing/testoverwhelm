<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<!-- CSS -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/">
    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://silviomoreto.github.io/bootstrap-select/stylesheets/bootstrap-select.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- JS -->

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    
    <title>
    <?php
        if(isset($pageTitle)){
        	echo $pageTitle ; // set by the variable
        } 
        else{
        	echo "Testoverwhelm" ; // default page title
        }
    ?>
    </title>
</head>
<body>