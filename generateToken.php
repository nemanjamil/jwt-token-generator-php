<?php
require 'jwt_helper.php';

$secret_key = 'bmp_space_165423106546545';
$token = array();
$token['Participant_EXTERNAL_ID'] = $_GET['Participant_EXTERNAL_ID'];
$token['Participant_Firstname'] = $_GET['Participant_Firstname'];
$token['Participant_Lastname'] = $_GET['Participant_Lastname'];

$token['ExamVersion_EXTERNAL_ID'] = $_GET['ExamVersion_EXTERNAL_ID'];
$token['BulkEvent_EXTERNAL_ID'] = $_GET['BulkEvent_EXTERNAL_ID'];

$token['ExamVersion_plannedDuration'] = $_GET['ExamVersion_plannedDuration'];

$token['tokenvalidfor'] = time() + $_GET['tokenvalidfor'] * 86400; // e.g 7 days -> 7 * 86400  = 604800
$token['ExamEvent_GenerationTime'] = time();

$encodeToken = JWT::encode($token, $secret_key);
$location = "http://localhost:7071/api/JwtRedirect";

echo '<a href="'.$location.'?token='.$encodeToken.'">link</a>';
?>


<?php
/*require 'jwt_helper.php';

$secret_key = 'bmp_space_165423106546545';
$token = array();
$token['uid'] = $_GET['uid'];
$token['firstname'] = $_GET['firstname'];
$token['lastname'] = $_GET['lastname'];
$token['exam_valid_for'] = $_GET['examvalidfor'];
$token['exam_id'] = $_GET['examid'];
$token['event_id'] = $_GET['eventid'];
$token['exp'] = time() + $_GET['tokenvalidfor'] * 60; // how manu days is valid token

$encodeToken = JWT::encode($token, $secret_key);
$location = "http://localhost:7071/api/JwtRedirect";

echo '<a href="'.$location.'?token='.$encodeToken.'">link</a>';*/

?>
