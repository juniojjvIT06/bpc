<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl {
    public function __construct() {
        log_message('Debug', 'Curl class is loaded.');
    }

    public function simple_get($url, $options = array()) {
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);
        return isset($error_msg) ? $error_msg : $response;
    }

    public function simple_post($url, $params = array(), $options = array()) {
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);
        return isset($error_msg) ? $error_msg : $response;
    }
}
