<?php
require 'jwt_helper.php';

$secret_key = 'bmp_space_165423106546545';
$token = array();
$token['uid'] = $_GET['uid'];
$token['firstname'] = $_GET['firstname'];
$token['lastname'] = $_GET['lastname'];
$token['exam_valid_for'] = $_GET['examvalidfor'];
$token['exam_id'] = $_GET['examid'];
$token['event_id'] = $_GET['eventid'];
$token['exp'] = time() + $_GET['tokenvalidfor'] * 60;

echo '</br>';


echo '<a href="https://se04.ico-cert.org:5050/tems/validation/verify.php?token=';
echo JWT::encode($token, $secret_key);
echo '">https://se04.ico-cert.org:5050/tems/validation/verify.php?token='.JWT::encode($token, $secret_key).'</a>'

?>

