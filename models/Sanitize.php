<?php
class Sanitize
{

    public static $email_sanitize;
    public static $regex_result;
    public static $text_sanitize;

    public static function email($email)
    {
        self::$email_sanitize =  filter_var(self::$email_sanitize, FILTER_SANITIZE_SPECIAL_CHARS);

        self::$email_sanitize =  filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var(self::$email_sanitize, FILTER_VALIDATE_EMAIL ) == true) {
            echo ("Email valide");
            return self::$email_sanitize;
        } else {
            echo ("this email is not a valid email address");
        }
    }

    public static function text($text) {
        self::$text_sanitize =  filter_var($text, FILTER_SANITIZE_SPECIAL_CHARS);

        self::$text_sanitize =  filter_var($text, FILTER_SANITIZE_STRING);

        return self::$text_sanitize;
    }

    public static function regex($patern, $subject)
    {
        $regex_result = preg_match($patern, $subject);
        return $regex_result;
    }
}
