<?php

   include 'core/init.php';
  
   $user_id = $_SESSION['user_id'];

   $user = User::getData($user_id);
   
   if (User::checkLogIn() === false) 
   header('location: index.php');


   $tweets = Tweet::tweets($user_id);
   $who_users = Follow::whoToFollow($user_id);
   $notify_count = User::CountNotification($user_id);
 
?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Twitter Clone</title>
    
    <link rel="shortcut icon" type="image/png" href="assets/images/twitter.svg"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/all.min.css">
        <link rel="stylesheet" href="assets/css/home_style.css?v=<?php echo time(); ?>">
    
   
</head>
<body>
     <!-- This is a modal for welcome the new signup account! -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
     
    <?php  if (isset($_SESSION['welcome'])) { ?>
      <script>
       $(document).ready(function(){
        // Open modal on page load
        $("#welcome").modal('show');
      
 
       });
      </script>