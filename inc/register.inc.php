<?php

//check if the form has been submitted
if(isset($_POST['submit'])){
    //take the data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    //Use RegisterController class
    include '../classes/db.class.php';
    include '../classes/register.class.php';
    include '../classes/registerController.class.php';

    $register = new RegisterController($name, $email, $password, $repeatPassword);

    //Run error handlers and user registering
    $register->registerUser();

    //Go back to home page
    header('location: ../index.php?error=none');
}