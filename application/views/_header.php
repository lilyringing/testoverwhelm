<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<!-- CSS -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        
   <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 

 
    
    
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