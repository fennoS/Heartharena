<!doctype html>
<html>
<head>
    <title>Heartharena</title>
    <link rel="icon" href="https://d3pl14o4ufnhvd.cloudfront.net/v2/uploads/6a805709-3c0e-49b9-a461-04977eec56be/f8d47e8bd6e970a96253811506b57b7d1203af16_original.png"> 
    <meta charset="utf-8">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/style.css" />
</head>
<body>
    <!-- wrapper, to center website -->
    <div class="wrapper">
        <!-- navigation -->
        <ul class="navigation">
        
            <div class="logo">
                <img src="<?php echo Config::get('URL'); ?>pictures/Hearthstonelogo.png">
            </div> 

            <?php if (Session::userIsLoggedIn()) { ?>
               
                
                <li <?php if (View::checkForActiveController($filename, "video")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>video/index">Home</a>
                </li>

                <li <?php if (View::checkForActiveController($filename, "note")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>note/index">My Notes</a>
                </li>

            <?php } else { ?>
                <!-- for not logged in users -->


                <li <?php if (View::checkForActiveController($filename, "video")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>video/index">video's</a>
                </li>

                <li <?php if (View::checkForActiveControllerAndAction($filename, "login/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>login/index">Login</a>
                </li>

                <li <?php if (View::checkForActiveControllerAndAction($filename, "register/index")) { echo ' class="active" '; } ?> >
                    <a href="<?php echo Config::get('URL'); ?>register/index">Register</a>
                </li>
            <?php } ?>
        </ul>

        <!-- my account -->
        <ul class="navigation right">
        <?php if (Session::userIsLoggedIn()) : ?>
            <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                <a href="<?php echo Config::get('URL'); ?>user/index">My Account</a>
                <ul class="navigation-submenu">
                    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>user/changeUserRole">Change account type</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>user/editAvatar">Edit your avatar</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "video")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>video/create">Upload  video's</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "profile")) { echo ' class="active" '; } ?> >
                       <a href="<?php echo Config::get('URL'); ?>profile/index">Profiles</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>user/editusername">Edit my username</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>user/edituseremail">Edit my email</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "user")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>user/changePassword">Change Password</a>
                    </li>

                    <li <?php if (View::checkForActiveController($filename, "login")) { echo ' class="active" '; } ?> >
                        <a href="<?php echo Config::get('URL'); ?>login/logout">Logout</a>
                    </li>
                </ul>
            </li>
            <?php if (Session::get("user_account_type") == 7) : ?>
                <li <?php if (View::checkForActiveController($filename, "admin")) {
                    echo ' class="active" ';
                } ?> >
                    <a href="<?php echo Config::get('URL'); ?>admin/">Admin</a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
        </ul>