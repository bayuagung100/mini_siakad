<?php

require "../../inc/config.php";
require "../../inc/libs/vendor/autoload.php";

use \Firebase\JWT\JWT;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

$query = "SELECT user_id, user_code, user_password FROM users WHERE user_code = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$id = $row['user_id'];
$password2 = $row['user_password'];

if (password_verify($password, $password2)) {
    $secret_key = "test123";
    $issuer_claim = "mini-siakad"; // this can be the servername
    $issuedat_claim = time(); // issued at
    $notbefore_claim = $issuedat_claim + 10; //not before in seconds
    $expire_claim = $issuedat_claim + 60; // expire time in seconds
    $token = [
        "iss" => $issuer_claim,
        "iat" => $issuedat_claim,
        "nbf" => $notbefore_claim,
        "exp" => $expire_claim,
        "data" => [
            "id" => $id,
            "username" => $username
        ]
    ];

    http_response_code(200);

    $jwt = JWT::encode($token, $secret_key);
    echo json_encode(
        [
            "status" => true,
            "token" => $jwt,
            "expireAt" => $expire_claim
        ]
    );
} else {
    http_response_code(401);
    echo json_encode(
        [
            "status" => "false",
            "message" => "Invalid username or password",
        ]
    );
}
