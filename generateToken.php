<?php
require 'vendor/autoload.php';
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
require 'jwt_helper.php';

$secret_key = 'bmp_space_165423106546545';
$token = array();
$token['Participant_EXTERNAL_ID'] = $_GET['Participant_EXTERNAL_ID'];
$token['Participant_Firstname'] = $_GET['Participant_Firstname'];
$token['Participant_Lastname'] = $_GET['Participant_Lastname'];
$token['ExamVersion_EXTERNAL_ID'] = $_GET['ExamVersion_EXTERNAL_ID'];
$token['BulkEvent_EXTERNAL_ID'] = $_GET['BulkEvent_EXTERNAL_ID'];
$token['Photo_Time_Imterval'] = $_GET['Photo_Time_Imterval'];
$token['fe_endpoint'] = $_GET['fe_endpoint'];
$token['ExamVersion_plannedDuration'] = $_GET['ExamVersion_plannedDuration'];
$token['tokenvalidfor'] = time() + $_GET['tokenvalidfor'] * 86400; // e.g 7 days -> 7 * 86400  = 604800
$token['ExamEvent_GenerationTime'] = time();

$ExamEvent_EXTERNAL_ID = $_GET['ExamEvent_EXTERNAL_ID'];
if (!$ExamEvent_EXTERNAL_ID) {
    try {
        $token['ExamEvent_EXTERNAL_ID'] = Uuid::uuid1();
    } catch (UnsatisfiedDependencyException $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
    }
} else {
    $token['ExamEvent_EXTERNAL_ID'] = $ExamEvent_EXTERNAL_ID;
}


$encodeToken = JWT::encode($token, $secret_key);

$location = "http://localhost:7071/api/JwtRedirect";
$remoteLocation = "https://bpmuploadpictureandcognito.azurewebsites.net/api/JwtRedirect";

echo '<a href="' . $remoteLocation . '?token=' . $encodeToken . '">link</a>';


echo '</br></br>VALIDATE BODY</br></br>';

$decoded = JWT::decode($encodeToken, $secret_key, array('HS256'));
$decoded_array = (array) $decoded;
var_dump($decoded_array);

echo '</br></br>';
echo $encodeToken;
?>