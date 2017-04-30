<?php
include('../config/account.php');
if(!$_SESSION['loggued_on_user'])
    header("Location: ../index.php");
session_start();
if ($_POST['submit'] == 'Register!')
{
    $password = hash('sha256', $_POST['password']);
    $new_user = New account(array(
    	'login' =>  $_POST['login'],
    	'password' => $password, 
    	'email' => $_POST['email']
        ));
    $var = $new_user->add();
    if ($var === 1)
        $_SESSION['alert'] = "This account is already taken";
    else
    {
        $new_user->sendMail();
        $_SESSION['alert'] = "register_but_not_confirm";
    }
    header("Location: ../index.php");
}

if ($_POST['submit'] == 'Login!' && isset($_POST['passwd']) && isset($_POST['email']))
{
    $password = hash('sha256', $_POST['passwd']);
    $user = New account(array(
    	'password' => $password, 
    	'email' => $_POST['email']
        ));
    $var = $user->Connect();
    if ($var === 1)
        $_SESSION['alert'] = "Account not found on our database";
    if ($var === 2)
        $_SESSION['alert'] = "Need to be a account validated for use the website";
    if ($var === 3)
        $_SESSION['alert'] = "Wrong Password!";
    header("Location: ../index.php");
}
if ($_POST['submit'] == 'Reset!' && isset($_POST['res_password']) && isset($_POST['res_repeat_password']))
{
    $password = hash('sha256', $_POST['res_password']);
    $user = New account(array());
    $var = $user->resetPassword($_SESSION['login_reset'], $_SESSION['cle_reset'],$password);
    if ($var === 1)
        $_SESSION['alert'] = "Account not found on our database";
    if ($var === 2)
        $_SESSION['alert'] = "Need to be a account validated for use the website/ Wrong Token!!!";
    if ($var === 0)
        $_SESSION['alert'] = "Thank you! You can now login using your new password!";
    header("Location: ../index.php");
}
?>
