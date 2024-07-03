<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

$mysqli = new mysqli('localhost', 'user', 'password', 'database');

if (mysqli_connect_errno()) {
    echo json_encode(['mysqli' => 'Failed to connect to MySQL: '.mysqli_connect_error()]);
    exit;
}

if ('edit' === $input['action']) {
    $mysqli->query("UPDATE users SET username='".$input['username']."', email='".$input['email']."', avatar='".$input['avatar']."' WHERE id='".$input['id']."'");
} elseif ('delete' === $input['action']) {
    $mysqli->query("UPDATE users SET deleted=1 WHERE id='".$input['id']."'");
} elseif ('restore' === $input['action']) {
    $mysqli->query("UPDATE users SET deleted=0 WHERE id='".$input['id']."'");
}

mysqli_close($mysqli);

echo json_encode($input);
