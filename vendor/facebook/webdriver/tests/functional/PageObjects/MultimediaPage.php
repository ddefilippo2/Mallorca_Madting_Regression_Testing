<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/17/14
 * Time: 7:39 PM
 */

require_once __DIR__.'/BasePage.php';

class MultimediaPage extends BasePage
{

    private static $pageInstance;
    public static function setInstance()
    {
        if(self::$pageInstance==null)
        {
            self::$pageInstance=new MultimediaPage();
        }
        return self::$pageInstance;
    }

    public  function uploadImage($filePath)
    {

    }
} 