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
            <!-- Modal -->
<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div  class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="">
        <div class="text-center">
         <span  class="modal-title font-weight-bold text-center" id="exampleModalLongTitle">
          <span style="font-size: 20px;">Welcome <span style="color:#207ce5"><?php echo $user->name; ?></span>  </span>  
         </span>
        </div>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="text-center">
       
        <h4 style="font-weight: 600; " >You've Signed up Successfully!</h4>
     </div>
        <p>This is Twitter clone is developed by <span style="font-weight: 700;">Alain Brian</span>  for learning purpose.</p>
        <p>The clone project includes tweet , retweet , quote or even quote the quoted tweet , like tweet and nested comments.
          You can mention or add hashtag to yout tweet , change password or username.
          Follow or unfollow people. get notificaction if any action happen. Search users by name or username. and more!
        </p>
        <p>By default you followed
          <a style="color:#207ce5;" href="briccyit">@Briccyit</a> 
            to see their tweets.</p>
      </div>
      
    </div>
  </div>
</div>

      <?php unset($_SESSION['welcome']); } ?>

      <!-- End welcome -->
         <div id="mine">
 
    <div class="wrapper-left">
        <div class="sidebar-left">
          <div class="grid-sidebar" style="margin-top: 12px">
            <div class="icon-sidebar-align">
              <img src="<?php echo BASE_URL . "/assets/images/twitter-logo.png"; ?>" alt="" height="30px" width="30px" />
            </div>
          </div>
           <a href="home.php">
          <div class="grid-sidebar bg-active" style="margin-top: 12px">
            <div class="icon-sidebar-align">
              <img src="<?php echo BASE_URL . "/includes/icons/tweethome.png"; ?>" alt="" height="26.25px" width="26.25px" />
            </div>
            <div class="wrapper-left-elements">
              <a class="wrapper-left-active" href="home.php" style="margin-top: 4px;"><strong>Home</strong></a>
            </div>
          </div>
          </a>
           <a href="notification.php">
          <div class="grid-sidebar">
            <div class="icon-sidebar-align position-relative">
                <?php if ($notify_count > 0) { ?>
              <i class="notify-count"><?php echo $notify_count; ?></i> 
              <?php } ?>
              <img
                src="<?php echo BASE_URL . "/includes/icons/tweetnotif.png"; ?>"
                alt=""
                height="26.25px"
                width="26.25px"
              />
            </div>
  