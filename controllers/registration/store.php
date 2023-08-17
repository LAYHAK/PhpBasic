<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors=[];

if (!Validator::email($email)){
    $errors['email']="Please Input the valid email";
}
if (!Validator::string($password,7,255)){
    $errors['password']="Password length must be between 8 to 50";
}
if (!empty($errors)){
    return view('registration/create.view.php',[
        'errors'=>$errors
    ]);
}
$db=App::resolve(Database::class);

$user = $db->query('select * from users where email=:email',[
    'email'=>$email
])->find();

if($user){
    header('location: /');
    exit();
}else{
    $db->query('insert into users set email=:email , password=:password',
    [
        'email'=>$email,
        'password'=>password_hash($password,PASSWORD_BCRYPT)
    ]);
    $_SESSION['user']=[
        'email'=>$email
    ];
    header('location: /');
    exit();
}
