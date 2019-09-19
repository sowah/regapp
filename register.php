<?php
require_once('../connect.php');
$data= json_decode(file_get_contents("php://input"));

$fname=($data->fname);
$lname=($data->lname);
$phone_number=($data->phone_number);
$email=($data->email);
$phone_number=($data->phone_number);
$username=($data->username);
$password=($data->password);
$user_role=($data->user_role);
$user_id= ($data->ncsc_portal_user_id);
$token= ($data->ncsc_portal_token);
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$success=array("message"=>("success"));
$error_message=array("message"=>("0"));
$token_error=array("message"=>("Invalid Token"));

$row = $conn->query("SELECT * from app_admin_tokens WHERE user_id =  '".$user_id."' AND  token= '".$token."'");
$row->setFetchMode(PDO::FETCH_ASSOC);
$device_count = $row->rowCount();
if($device_count == 1){

    $row = $conn->query("SELECT username from app_admin where username='".$username."' ");
    $row->setFetchMode(PDO::FETCH_ASSOC);
    $userdetails = $row->fetchAll();
    $user_count = $row->rowCount();

    if ($user_count == 1){
        echo json_encode(array($error_message));
    }else{

        if ($user_count!=1 && $fname!=''){
            $stmt = $conn->prepare("INSERT INTO app_admin(fname,lname,phone_number,email,username,password,user_type) VALUES(:fname, :lname,:phone_number,:email,:username,:password,:user_role)");
            $stmt->execute(array("fname" => $fname,
                "lname" => $lname,
                "phone_number" => $phone_number,
                "email" => $email,
                "username" => $username,
                "user_role" => $user_role,
                "password" => $password_hashed,));
            echo json_encode(array($success));

        }
    }

}else{
    echo json_encode($token_error);
}

?>