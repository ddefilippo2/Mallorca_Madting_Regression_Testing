<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/22/14
 * Time: 4:15 PM
 */
//use SimpleXMLElement;
class BaseSeleniumTest extends PHPUnit_Framework_TestCase
{

    /**
     * @notes before class
     */
    public static function setUpBeforeClass()
    {
        self::$theResultsFolder = getenv('Results');
        self::$TEST_DATA = getenv('TestData');
        self::$BUILD_VERSION = getenv('BuildVersion');
        self::$RUN_ID = getenv('RunID');
        self::InitializeReporting();
        $TCParams = array();
        $TCParams["buildversion"]= BUILD_VERSION;
        $TCParams["runid"]=RUN_ID;
        $TCParams["imagepath"]=IMAGE_PATH;
        $TCParams["Application"]= "BestDoctors";
        self::$TCList=array("Environment", $TCParams); //adding the TC parameters to TCList array for the Environment Key
        //Run the Command to Start running the video
        shell_exec("ffmpeg.exe -list_devices true -f dshow -i dummy");
        self::$videoObject=new VideoMaker();
    }

    /**
     * @notes Launches the Application on the specified browser
     * @param WebDriverBrowserType $browserType
     */
    public  function setUp()
    {
        App::$testResult='passed';
        $this->browserName=getenv('SELENIUM_CLIENT_BROWSER');
        $this->url=getenv('SELENIUM_CLIENT_URL');
    }

    /**
     * @notes Tear Downs the Test
     */
    public static function tearDownAfterClass()
    {
      HtmlReport::CreateHtmlSummaryReport(self::$totalTCs, self::$failedTCs, self::$passedTCs, self::$TCList);
    }

    /**
     * @param $functionToCall
     * @param $testMethodName
     * @notes Executor to be called for every test method
     */
    protected function executeTestCaller($functionToCall,$testMethodName,$testClassName)
    {
        //$_maxTestRunsString = getenv('RerunTimes');
        $testRuns=getenv('RerunTimes');
        $time;
        $_currentException=null;
        while($testRuns > 0)
        {
            try
            {
                self::$videoObject->StartVideoThreadForTest($testMethodName);
                $time_start = microtime(true);
                call_user_func($functionToCall);
                $time_end = microtime(true);
                self::$videoObject->StopVideoThreadForTest();
                //self::$passedTCs=self::$passedTCs+1;
            }
            catch(Exception $except)
            {
              //self::$failedTCs=self::$failedTCs+1;
              $time_end = microtime(true);
              self::$videoObject->StopVideoThreadForTest();
              $testRuns=$testRuns-1;
              $_currentException = $except;
              App::$testResult = 'failed';
                if ($_currentException != null)
                {
                    HtmlReport::TrackException($_currentException);
                }
                if ($testRuns != 0)
                {
                    HtmlReport::TrackRun($testRuns);
                }
            }
            $time = $time_end - $time_start;
            //self::$totalTCs=self::$failedTCs+self::$passedTCs;
            if ($_currentException == null)
            {
                break; // Test passed, stop retrying
            }
        }
        #region Append Test Result To Summary
        if(App::$testResult=='failed')
        {
            $this->AppendScriptRunResults($testClassName, $testMethodName, "fail", $time);
        }
        else
        {
            $this->AppendScriptRunResults($testClassName, $testMethodName, "pass", $time);
        }
        #endregion

        #region Throw Exception
        if ($_currentException==null)
        {
            if (App::$testResult == 'failed')
            {
                throw new Exception(HtmlReport::$except->getMessage());
            }
        }
        else if($_currentException!=null)
        {
            throw new Exception($_currentException->getMessage());
        }
        #endregion
    }

    protected function AppendScriptRunResults($pModule, $pTCName, $pResult, $timeElapsed)
    {
        $TCParams = array();
        $TCParams["module"]= $pModule;
        $TCParams["name"]= $pTCName;
        $TCParams["result"]= $pResult;
        //$TCParams["videolnk"]= $videolinkpath;
        $TCParams["report"]= HtmlReport::$detailreportfilename;
        $TCParams["buildversion"]= getenv('BuildVersion');
        $TCParams["runid"]= getenv('RunID');
        $TCParams["timeElapsed"]= $timeElapsed;
        if ($pResult == 'pass')
            self::$passedTCs=self::$passedTCs+1;
        else
            self::$failedTCs=self::$failedTCs+1;
        self::$totalTCs=self::$totalTCs+1;
        //self::$TCList=array($pTCName, $TCParams);
        self::$TCList[$pTCName]=$TCParams;
    }

    public static function  InitializeReporting()
    {
        //$strCurrentDateTime = time("yyyy.MM.dd-HH.mm.ss");
        $strCurrentDateTime = time();
        if (!file_exists(self::$theResultsFolder)) mkdir(self::$theResultsFolder);

        $strReportSummaryDirectory = "Reports_" . $strCurrentDateTime;

        if (!file_exists(Helper::joinPath(self::$theResultsFolder, $strReportSummaryDirectory)))
        {
            $path=Helper::joinPath(self::$theResultsFolder, $strReportSummaryDirectory);
             $created=mkdir($path);
        }
        $SuiteResultsFileName = Helper::joinPath(self::$theResultsFolder, $strReportSummaryDirectory) . "\\" . str_replace("stamp",$strCurrentDateTime,self::$theResultsFilename);
        $_detailResultsFileName = Helper::joinPath( self::$theResultsFolder, $strReportSummaryDirectory). "\\" . str_replace("stamp",$strCurrentDateTime,self::$theDetailResultsFilename);
        fopen($SuiteResultsFileName,"w");
        fclose($SuiteResultsFileName);
        fopen($_detailResultsFileName,"w");
        fclose($_detailResultsFileName);
        HtmlReport::$detailreportfilename = $_detailResultsFileName;
        HtmlReport::$strSummaryResultsFile=$SuiteResultsFileName;
        HtmlReport::CreateDetailedReport();
    }

    /**
     * @notes reads Data from XML file and returns SimpleXMLElement Obejct
     * @notes use foreach to iterate for the data
     * $xml=simplexml_load_file($ss2);
     * foreach($xml->children() as $child)
     * {
     *    $data1=$child->tagName;
     * }
     * @param $testDatafileName
     * @return SimpleXMLElement
     */
    protected function ReadDataFromXml($testDatafileName)
    {
        $filePath=$this->dataProviderGetPath($testDatafileName);
        return simplexml_load_file($filePath);

    }

    /**
     * @notes gets the Test Data File Path to load
     * @param $fileName
     * @return string
     */
    private function dataProviderGetPath($fileName)
    {
        return dirname(__FILE__).'/TestData/'.$fileName;
        //return dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__))))))).'/TestData/'.$fileName;
    }

    protected  function MediaFilePath()
    {
        return dirname(__DIR__).'/files/';
    }

    private $driver;
    protected $browserName;
    protected $url;
    private static $SuiteResultsFileName;
    protected static $videoObject;
    private static $totalTCs="0";
    private static $failedTCs="0";
    private static $passedTCs="0";
    private static $TCList;
    private static $theResultsFolder;
    private static $TEST_DATA;
    private static $BUILD_VERSION;
    private static $RUN_ID;
    private static $theResultsFilename = "ResultsSummary_stamp.html";
    public static $theDetailResultsFilename = "Results_stamp.html";
}
 