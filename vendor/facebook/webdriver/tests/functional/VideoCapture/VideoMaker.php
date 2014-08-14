<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/24/14
 * Time: 10:57 AM
 */


class VideoMaker
{

    /**
     * @param $testMethodName
     * @notes Launch this Method if the Operating System is Windows
     * This Method starts Video Capture Thread
     */
    public function StartVideoThreadForTest($testMethodName)
    {
        if(getenv('requireVideo')==true)
        {
            //Run the Command to Start running the video without CaptureVideo.exe
            //$cmd="ffmpeg -f dshow -i video=\"screen-capture-recorder\" -r 5 -threads 0 ".$testMethodName.".wmv";
            if(strtoupper(substr(PHP_OS, 0, 3))=="WIN")
            {
                $path=__DIR__.'/../../../Output/';
                $cmd="CaptureVideo ".$path.$testMethodName."-".time();
                shell_exec($cmd);
            }
        }
    }

    /**
     * @notes Launch this Method only if the Operating System is Windows
     * This method stops video thread
     */
    public function StopVideoThreadForTest()
    {
        if(getenv('requireVideo')==true)
        {
            if(strtoupper(substr(PHP_OS, 0, 3))=="WIN")
            {
              shell_exec('taskkill /F /IM ffmpeg.exe');
            }
        }
    }
} 