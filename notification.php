<?php  
        include 'core/init.php';

        $user_id = $_SESSION['user_id'];
        $user = User::getData($user_id);
        $who_users = Follow::whoToFollow($user_id);

        // update notification count
        User::updateNotifications($user_id);
  
        $notify_count = User::CountNotification($user_id);
        $notofication = User::notification($user_id);
        // var_dump($notofication);
        // die();
            if (User::checkLogIn() === false) 
            header('location: index.php');    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications | Twitter Clone</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/profile_style.css?v=<?php echo time(); ?>">
  
    <link rel="shortcut icon" type="image/png" href="assets/images/twitter.svg"> 
   
</head>
<body>
    <script src="assets/js/jquery-3.5.1.min.js"></script>

   
    <div id="mine">
    <div class="wrapper-left">
        <div class="sidebar-left">
          <div class="grid-sidebar" style="margin-top: 12px">
            <div class="icon-sidebar-align">
              <img src="<?php echo BASE_URL . "/assets/images/twitter-logo.png"; ?>" alt="" height="30px" width="30px" />
            </div>
          </div>
