<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
    <?php
        if(isset($pageTitle)){
        	echo $pageTitle ; // set by the variable
        } 
        else{
        	echo "Taipei City Zoo" ; // default page title
        }
    ?>
    </title>
</head>