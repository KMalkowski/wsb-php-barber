<?php

//check if the form has been submitted
if(isset($_POST['submit'])){
    //take the data from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Use LoginController class
    include '../classes/db.class.php';
    include '../classes/login.class.php';
    include '../classes/loginController.class.php';

    $login = new LoginController($email, $password);

    //Run error handlers and user registering
    $login->tryLoginUser();

    //Go back to home page
    header('location: ../index.php?error=none');
}