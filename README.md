# Encryption-Decription-GST
This class provide a way of Encryption &amp; Decription 

you can use like below to generate api key

$certificate_file_path = "PATH OF YOUR SANDBOX OR PRODUCTION cert file.";
$generated_key = GSTAPIENC::keygen(32);
$appKey = GSTAPIENC::generateappKey(base64_decode($generated_key), $certificate_file_path);
