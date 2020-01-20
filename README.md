# Encryption-Decription-GST
This class provide a way of Encryption &amp; Decription 

PHP code helps illustrate how to encryption & decript, to protect sensitive data. 
Using openssl_encrypt and openssl_decrypt cryptographic functions. you don't need to intantiate the class object because its funciton are static. you can directly access the methods.
certificate_file_path is your cert file path it can be sandbox or production cert files , you can either generate it or get it from providers.


you can use like below to generate api key

$certificate_file_path = "PATH OF YOUR SANDBOX OR PRODUCTION cert file.";

$generated_key = GSTAPIENC::keygen(32);

$appKey = GSTAPIENC::generateappKey(base64_decode($generated_key), $certificate_file_path);
