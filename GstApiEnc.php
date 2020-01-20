<?php
/**
 * Encryption & Decription
   Developer By
 * Boy108Zon
 */
class GSTAPIENC {
    static function test(){
        return 1;
    }
    static function generateappKey ($appkey,$filepath){
        openssl_public_encrypt($appkey, $encrypted, file_get_contents($filepath));
        return base64_encode($encrypted);   
    }
    static function encryptOTP($otp_code,$appkey) {
       return base64_encode(openssl_encrypt($otp_code, "AES-256-ECB", $appkey, OPENSSL_RAW_DATA));
    }
    static function encryptData($data, $key) {
        return base64_encode(openssl_encrypt($data, "AES-256-ECB", $key, OPENSSL_RAW_DATA));
    }
    static function mac256($ent, $key) {
        $res = hash_hmac('sha256', $ent, $key, true); 
        return $res;
    }
    static function decryptData($data, $key) {
        return openssl_decrypt(base64_decode($data), "AES-256-ECB", $key, OPENSSL_RAW_DATA);
    }
    static function decodeJsonResponse($out, $rek, $ek) {
        $apiEK = GSTAPIENC::decryptData($rek, $ek);
        return base64_decode(GSTAPIENC::decryptData($out, $apiEK));
    }
    static function keygen($length = 10) {
        $key = '';
        list($usec, $sec) = explode(' ', microtime());
        mt_srand((float) $sec + ((float) $usec * 100000));
        $inputs = array_merge(range('z', 'a'), range(0, 9), range('A', 'Z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $inputs{mt_rand(0, 61)};
        }
        return base64_encode($key);
    } 
}
