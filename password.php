<?php
class password
{
    private $value;
    function __construct($string) {
        $salt = uniqid('', true);
        $algo = '6'; // CRYPT_SHA512
        $rounds = '5042';
        $cryptSalt = '$'.$algo.'$rounds='.$rounds.'$'.$salt;
        $this->value = crypt($string, $cryptSalt);
    }

    public function __get($attr)
    {
        if (isset($this->$attr))
            return $this->$attr;
        else
            user_error("Атрибут ".$attr." не найден!");
    }
}
?>