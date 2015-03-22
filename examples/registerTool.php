<?php

include_once("../src/snapchat.php");


echo "\n\nUsername: ";
$username = trim(fgets(STDIN));

echo "\nPassword: ";
$password = trim(fgets(STDIN));

echo "\nEmail: ";
$email = trim(fgets(STDIN));

echo "\nBirthday (yyyy-mm-dd): ";
$birthday = trim(fgets(STDIN));

$snapchat = new Snapchat($username, $auth_token, true);


$id = $snapchat->register($username, $password, $email, $birthday);

echo "You should have a file called '{$id}' in your snap api folder, unzip it.\n";
echo "9 images. If there is a ghost in a image means 1, if not 0\n";
echo "The result should be like the following one: 110000101\n";
echo "After completion, the zip file will be deleted automatically.\n\n"

echo "\nResult: ";
$result = trim(fgets(STDIN));

$snapchat->sendCaptcha($result, $id);
unlink(__DIR__."/{$id}");