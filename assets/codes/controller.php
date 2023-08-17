<?php

include 'config.php';

if (isset($_GET['logout'])) {

    unset($_SESSION);

    header('Location: http://madebycan.com/');
    exit();
}

if (isset($_GET['id']) && isset($_GET['cbe'])) {
    $id = $_GET['id'];
    $completedBool = $_GET['cbe'];

    $query = "UPDATE presales SET completeBool=$completedBool WHERE id=$id";

    $query = mysqli_query($connection, $query);

    header('Location: http://madebycan.com/dashboard');
    exit();
}

if (isset($_POST['changePW__btn'])) {

    $id = $_SESSION['id'];

    if ($_SESSION['id'] != $_POST['updateId']) {
        header('Location: http://madebycan.com/dashboard');
        exit();
    } else {
        $updatedId = $_POST['updateId'];
        $newPass = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
        $query = "UPDATE canadmin SET password='$newPass' WHERE id=$id";
    
        $query = mysqli_query($connection, $query);
    
        header('Location: http://madebycan.com/dashboard');
        exit();
    }
}




if (isset($_POST['questions__btn'])) {

    $email = sanitize($_POST['email']);
    $name = sanitize($_POST['name']);
    $phoneNumber = sanitize($_POST['phoneNumber']);
    $textBody = sanitize($_POST['textBody']);

    // echo $email.$name.$phoneNumber.$textBody;
    /* To Do, twilio send email */

}


if (isset($_POST['preSale__btn'])) {

    // if (isset($_SESSION['payAttempt'])) {
    //     if ($_SESSION['location'] == sanitize('Remote')) {
    //         header('Location: https://buy.stripe.com/eVa5kB8aW0474pyaEF');
    //         exit();
    //     } else {
    //         header('Location: https://buy.stripe.com/9AQ9AR76SeZ11dmeUW');
    //         exit();
    //     }        
    // } else {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $phoneNumber = sanitize($_POST['phoneNumber']);
    
        $company = sanitize($_POST['company']);
        $location = sanitize($_POST['location']);
        $quantity = sanitize($_POST['quantity']);
        $preferredDate = sanitize($_POST['preferredDate']);

        $tosAgreement = sanitize($_POST['tosAgreement']);

        $preSaleObj = new PreSale($name, $email, $phoneNumber, $company, $location, $quantity, $preferredDate, $tosAgreement);

        $works = $preSaleObj->save($connection);

        if ($location == sanitize('Remote')) {

            header('Location: https://buy.stripe.com/eVa5kB8aW0474pyaEF');
            exit();
        } else {

            header('Location: https://buy.stripe.com/9AQ9AR76SeZ11dmeUW');
            exit();
        }
    // }
}

if (isset($_POST['login__btn'])) {
    
    $username = sanitize($_POST['username']);

    signIn($connection, $username, $_POST['password']);
}

if (isset($_POST['updateLeadStage__btn'])) {
    
    $id = $_POST['id'];
    $leadStage = sanitize($_POST['leadStage']);

    $query = "UPDATE presales SET leadStage=? WHERE id=?";

    $query = $connection->prepare($query);
        $query->bind_param("ss", $a, $b);
            $a = $leadStage;
            $b = $id;

    $query->execute();

    header('Location: http://madebycan.com/dashboard');
    exit();
}

if (isset($_POST['updateLeadStage__btn'])) {
    
    $id = $_POST['id'];
    $leadStage = sanitize($_POST['leadStage']);

    $query = "UPDATE presales SET leadStage=? WHERE id=?";

    $query = $connection->prepare($query);
        $query->bind_param("ss", $a, $b);
            $a = $leadStage;
            $b = $id;

    $query->execute();

    header('Location: http://curvedarrownetworks.net/dashboard');
    exit();
}
?>