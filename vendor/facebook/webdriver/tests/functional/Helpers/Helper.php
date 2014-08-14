<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/27/14
 * Time: 1:35 PM
 */

class Helper
{
    private static $hostname = '{imap.gmail.com:993/imap/ssl}INBOX'; //{imap.gmail.com:993/ssl/novalidate-cert}[Gmail]/All Mail
    private static $username = "bestdoctorsqa@gmail.com";
    private static $password = "qaautomation";
    private static $inbox;
    private static $emails;

    /** Try Connect to Gmail IMAP */
    public static function ConnectToGmailServer()
    {
        try
        {
            self::$inbox = imap_open(self::$hostname,self::$username,self::$password) or die('Cannot connect to Gmail: ' . imap_last_error());
        }
        catch(Exception $except)
        {
            return null;
        }
        return self::$inbox;
    }

    /* grab emails */
    public static function GetEmails()
    {
        try
        {
            self::$emails = imap_search(self::$inbox,'ALL');
        }
        catch(Exception $except)
        {
            return null;
        }
        return  self::$emails;
    }

    /* close the connection */
    function CloseConnection()
    {
        imap_close(self::$inbox);
    }

    public static function RetrieveForgotPasswordWordLinkFromGmail()
    {
        try
        {
            /* if emails are returned, cycle through each... */
            if( self::$emails) {

                /* begin output var */
                $output = '';

                /* put the newest emails on top */
                rsort( self::$emails);
                for($iterate=0;$iterate<5;$iterate++)
                {
                    /* for every email... */
                    foreach( self::$emails as $email_number)
                    {
                        try
                        {
                            $overview = imap_fetch_overview(self::$inbox,$email_number,0);
                            $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
                            if(strpos($output,'You have requested a reset of your password')!== false)
                            {
                                $body=imap_fetchtext(self::$inbox,$email_number,2);
                                //$arr=split("<a class=\"body-link\"",$body);
                                $url=split(" ",split("href=",$body)[1])[0];
                                return $url;
                            }
                        }
                        catch(Exception $except)
                        {
                            return "";
                        }
                    }
                }
            }
        }
        catch(Exception $except)
        {
            return "";
        }

    }

    public function RetrieveEmailFromGoogleAccount(RemoteWebDriver $driver, $forgotPasswordEmailLink)
    {
        return $this->ConnectToGmailServer($driver)&&
        $this->GetEmails($driver)&&
        $forgotPasswordEmailLink = $this->RetrieveForgotPasswordWordLinkFromGmail($driver)&&
        $this->CloseConnection($driver);

    }

    public static function getRandomEmail()
    {
        return "em".time()."@yopmail.com";
    }

    public static function getRandomUsername()
    {
        return "qaautomation".time();
    }

    public static function getRandomCaseName()
    {
        return "Test Case".time();
    }

    static function joinPath() {
        $path = '';
        $arguments = func_get_args();
        $args = array();
        foreach($arguments as $a) if($a !== '') $args[] = $a;//Removes the empty elements

        $arg_count = count($args);
        for($i=0; $i<$arg_count; $i++) {
            $folder = $args[$i];

            if($i != 0 and $folder[0] == DIRECTORY_SEPARATOR) $folder = substr($folder,1); //Remove the first char if it is a '/' - and its not in the first argument
            if($i != $arg_count-1 and substr($folder,-1) == DIRECTORY_SEPARATOR) $folder = substr($folder,0,-1); //Remove the last char - if its not in the last argument

            $path .= $folder;
            if($i != $arg_count-1) $path .= DIRECTORY_SEPARATOR; //Add the '/' if its not the last element.
        }
        return $path;
    }



}
