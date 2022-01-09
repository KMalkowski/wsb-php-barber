<?php
include_once(__DIR__.'/../config.php');

//Use ReservationController class
include ROOT . '/classes/db.class.php';
include ROOT . '/classes/reservation.class.php';
include ROOT . '/classes/reservationController.class.php';
include ROOT . '/classes/reservationListController.class.php';
include ROOT . '/classes/manageReservationController.class.php';

if(isset($_POST['submit'])){
    //take the data from the form
    $email = $_POST['user-email'];
    $date = $_POST['reservation-date'];
    $time = $_POST['reservation-time'];

    $reservation = new ReservationController($email, $date, $time);

    //Run error handlers and user registering
    $reservation->tryMakeReservation();

    //Go back to home page
    return header('location: ../index.php?error=none');
}

if(isset($_POST['confirm'])){

    $manageReservationController = new manageReservationController($_POST['ID'], $_POST['role']);

    //Run error handlers and user registering
    $manageReservationController->tryConfirmReservation();

    //Go back to home page
    return header('location: ../list.php?error=none');
}

if(isset($_POST['delete'])){

    $manageReservationController = new manageReservationController($_POST['ID'], $_POST['role']);

    //Run error handlers and user registering
    $manageReservationController->tryDeleteReservation();

    //Go back to home page
    return header('location: ../list.php?error=none');
}

//take the data from the session
$email = $_SESSION['email'];
$role = $_SESSION['role'];

$reservations = new ReservationListController($email, $role);

if($role == 'admin'){
    return $reservations->tryGetAllReservations();
}else{
    return $reservations->tryGetUsersReservations();
}

?>

