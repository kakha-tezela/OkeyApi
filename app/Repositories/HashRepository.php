<?php

namespace App\Repositories;

Class HashRepository {

    private static $cryptKey = '7f082bcdd276aeb3798d43825a40a966d2af3fa2';

    /**
     * @param $q
     * @return string
     */
    public static function encryptIt($q) {
        return encrypt($q);
    }

    /**
     * @param $q
     * @return string
     */
    public static function decryptIt($q)
    {
        return decrypt($q);
    }

}