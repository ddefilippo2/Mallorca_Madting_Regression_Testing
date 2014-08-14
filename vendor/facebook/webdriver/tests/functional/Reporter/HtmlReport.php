<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/26/14
 * Time: 11:00 PM
 */

class HtmlReport
{
        static $buildVersion = "";
        static $runId = "";
        static $screenshotPath;
        static $screenshotName;
        static $detailreportfilename = "";
        static $strSummaryResultsFile = "";
        static $scriptModuleName = "";
        static $testcaseCount = "0";
        public static $except = null;

        public static function CreateDetailedReport()
        {
          self::$except=new Exception();
          $htmlCOntent="<html><head><title>Detailed Report</title></head><body><table border='0' cellspacing='1' cellpadding='1' width='100%'><tr>"."<td align='center'><h4 align='center'><font face='arial'  color='#153e7e' size='5'><b>Detailed Report</b></font></h4></td></tr></table>";
          $current=file_put_contents(self::$detailreportfilename,$htmlCOntent,FILE_APPEND);
        }

        public static function CreateHtmlSummaryReport($totalTests, $totalFailed,$totalPassed, $TCList)
        {
            try
            {
                //$theEnvironment = $TCList["Environment"];
                file_put_contents(self::$strSummaryResultsFile,"<html".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<head><title>"."Execution Summary Report</title></head>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<body".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<table border='0' cellspacing='1' cellpadding='1' width='100%'".">",FILE_APPEND);
                //sw.Write(string.Format("<tr><td align='left'><img src='{0}\\ClientLogo.jpg' alt='Logo' height='50' width='250'/></td>", theEnvironment["imagepath"]));
                file_put_contents(self::$strSummaryResultsFile,"<tr><td align='center'><h4 align='center'><font face='arial' color='#153e7e' size='5'><b>"."Execution Summary Report</b></font></h4></td></tr>",FILE_APPEND);
                //sw.Write(string.Format("<td align='right'><img src='{0}\\CompanyLogo.png' alt='Cigniti' height='50' width='150'/></td></tr>", theEnvironment["imagepath"]));
                file_put_contents(self::$strSummaryResultsFile,"</table>"."<br/>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<br/".">",FILE_APPEND);
                //file_put_contents(self::$strSummaryResultsFile,"<table border='0' cellspacing='1' cellpadding='1' width='100%'>"."<tr><td>",FILE_APPEND);
                /*file_put_contents(self::$strSummaryResultsFile,"<table border='1' align='center' cellspacing='1' cellpadding='1' width='35%' style='font-family:Arial'".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153e7e'><font color='#e0e0e0' face='arial' size=1.85><b>"."Build Version</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:#153e7e'><font face='arial' size='1.85'><b>" . $theEnvironment["buildversion"] . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."Run ID</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left'style='color:#153e7e'><font face='arial' size='1.85'><b>" . $theEnvironment["runid"] . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."Run Date&Time</b></font></td>");
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left'style='color:#153e7e'><font face='arial' size='1.85'><b>" . time() . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</table><hr/".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</td></tr>"."<tr><td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<table border='1' cellspacing='1' cellpadding='1' width='35%' style='font-family:Arial'".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td colspan='2' align='center'><font color='#153e7e' face='arial' size='2'><b>"."Environment</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."Host Name</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:#153e7e'><font face='arial' size='1.85'><b>" . self::HostName() . "</b></font></td></tr>");
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."OS Details</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:#153e7e'><font face='arial' size='1.85'><b>" . self::osEnvironment() . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."Executed in Browser</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:#153e7e'><font face='arial' size='1.85'><b>" . $theEnvironment["browser"] . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</table><br/".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</td></tr><tr><td".">",FILE_APPEND);*/

                //Create Summary report Second table
                file_put_contents(self::$strSummaryResultsFile,"<table border=1 cellspacing='1' cellpadding='1' width='35%' style='font-family:Arial' align='left'".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td colspan='2' align='center'><font color='#153e7e' face='arial' size='2'><b>"."Execution Status</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left'bgcolor='#153E7E' ><font color='#e0e0e0' face='arial' size='1.85'><b>"."No. of  Scripts</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:#153e7e'><font face='arial' size='1.85'><b>" . $totalTests . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left' bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."No. of  Scripts Passed</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:#153e7e'><font face='arial' size='1.85'><b>" . $totalPassed . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td width=150 align='left'bgcolor='#153E7E'><font color='#e0e0e0' face='arial' size='1.85'><b>"."No. of  Scripts Failed</b></font></td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<td width=150 align='left' style='color:red' ><font face='arial' size='1.85'><b>" . $totalFailed . "</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</table".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</td></tr><tr><td><br/"."><br/></td></tr><tr><td>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<br"."/><br"."/><br"."/>",FILE_APPEND);
                //Create Summary report third table
                file_put_contents(self::$strSummaryResultsFile,"<table border='1' cellspacing='1' cellpadding='1' width='60%' style='font-family:Arial' align='left'".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td colspan='5' align='center'><font color='#153e7e' face='arial' size='2'><b>"."Summary Report</b></font></td></tr>",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"<tr><td align='center' width='12%'><font color='#153e7e' face='arial' size='2.25'><b>Script Module</b></font></td>" . "<td align='center'><font color='#153e7e' face='arial' size='2.25'><b>Script Name</b></font></td>" . "<td align='center' width='9%'><font color='#153e7e' face='arial' size='2.25'><b>Status</b></font></td>" . "<td align='center'  width='9%'><font color='#153e7e' face='arial' size='2.25'><b>Time(s)</b></font></td></tr>",FILE_APPEND);

                foreach ($TCList as $tcscript)
                {
                    if (array_count_values($tcscript)> 0)
                    {
                        if (key($tcscript) != "Environment")
                        {
                            file_put_contents(self::$strSummaryResultsFile,"<tr".">",FILE_APPEND);
                            $tcscriptdetails = $tcscript;
                            file_put_contents(self::$strSummaryResultsFile,"<td><font color='#153e7e' size='1' face='arial'><b>" . $tcscriptdetails["module"] . "</b></font></td>",FILE_APPEND);
                            if (array_key_exists("name",$tcscriptdetails))
                            {
                                //$tcName=substr(0,strripos($tcscriptdetails["name"],".") + 1);
                                $tcName=$tcscriptdetails["name"];
                                file_put_contents(self::$strSummaryResultsFile,"<td><font color='#153e7e' size='1' face='Arial'><b>" . $tcName . "</b></font></td>",FILE_APPEND);
                            }
                            if (array_key_exists("result",$tcscriptdetails))
                            {
                                 //self::$detailreportfilename = substr(0,strripos($tcscriptdetails["report"],"\\") + 1);
                                $reportFile=$tcscriptdetails["report"];
                                if (strtolower($tcscriptdetails["result"]) == "pass")
                                {
                                    file_put_contents(self::$strSummaryResultsFile,"<td bgcolor='green' align='center'><font color='#FEFCFF' size='1' face='Arial'><b><a style='color:#FEFCFF' href='" . self::$detailreportfilename . "'>Pass</a></b></font></td>",FILE_APPEND);
                                }
                                else if (strtolower($tcscriptdetails["result"]) == "fail")
                                {
                                    file_put_contents(self::$strSummaryResultsFile,"<td bgcolor='red' align='center'><font color='#FEFCFF' size='1' face='Arial'><b><a style='color:#FEFCFF' href='" . self::$detailreportfilename . "'>Fail</a></b></font></td>",FILE_APPEND);
                                }
                                else
                                {
                                    file_put_contents(self::$strSummaryResultsFile,"<td bgcolor='gray' align=center><font color='#FEFCFF' size='1' face='Arial'><b>"."No-run</b></font></td>",FILE_APPEND);
                                }
                            }
                          /*  if (array_key_exists("videolnk",$tcscriptdetails))
                            {
                                file_put_contents($strSummaryResultsFile,"<td bgcolor='green' align='center'><font color='#153e7e' size='1' face='Arial'><b><a style=\"color:white\" href=\"" . $tcscriptdetails["videolnk"] . "\\ScreenCapture.wmv" . "\">video</a></b></font></td>",FILE_APPEND);
                            }*/
                            if (array_key_exists("timeElapsed",$tcscriptdetails))
                            {
                                file_put_contents(self::$strSummaryResultsFile,"<td bgcolor='white' align='center'><font color='red' size='1' face='Arial'><b>".$tcscriptdetails["timeElapsed"]."s</b></font></td>",FILE_APPEND);
                            }
                            //if (tcscriptdetails.ContainsKey("rerun-count"))
                            //{
                            //    sw.Write("<td align='center'><font color='#153e7e' size='1' face='Arial'><b>" + tcscriptdetails["rerun-count"].ToString() + "</b></font></td>");
                            //}
                            file_put_contents(self::$strSummaryResultsFile,"</tr".">",FILE_APPEND);
                        }
                    }
                }
                file_put_contents(self::$strSummaryResultsFile,"</table".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</td></tr".">",FILE_APPEND);
                file_put_contents(self::$strSummaryResultsFile,"</table></body"."></html>",FILE_APPEND);
               }
            catch (Exception $ex)
            {
                throw ex;
            }
        }

        // return environmental details
        public static function  osEnvironment()
        {
            return "Current suite executed on : " + php_uname();
        }

        public static function HostName()
        {
            return "Current suite executed on : " + gethostname();
        }

        public static function TrackRun($runID)
        {
            file_put_contents(self::detailreportfilename,"<tr><td colspan='3'><h3 align='center'><font color='red' face='arial' size='3'><b>Run" . $runID . "</b></font></h3></td></tr>",FILE_APPEND);
        }

        public static function TrackException(Exception $exception)
        {
            $screenshotName = "FailureScreenshot_".time();
            $screenshotPath = self::$detailreportfilename.substr(0, strripos(self::$detailreportfilename,"\\") . "//" . self::$screenshotName);
            //$driver->takeScreenshot("FailureScreenshot_".time());
            file_put_contents(self::detailreportfilename,"<tr><td colspan='3'><h6 align='left'><font color='red' face='arial' size='1'><a href='".self::$screenshotPath."'>Failed</a><b>Test Stopped Due to An Exception:" .$exception->getMessage()/* + " StackTrace: " + exception.StackTrace*/ . "</b></font></h6></td></tr>",FILE_APPEND);
        }

        public static function SuccessReport($strStepName, $strStepDes)
        {
            self::onSuccess($strStepName, $strStepDes);
        }

        private static function onSuccess($strStepName, $strStepDes)
        {
            file_put_contents(self::$detailreportfilename,"<tr><td width='30%'><font color='#153e7e' size='1' face='Arial'><b>" . $strStepName . "</b></font></td><td><font color='#153e7e' size='1' face='Arial'><b>" . $strStepDes . "</b></font></td>" . "<td width='10%' bgcolor='green' align='center'><font color='white' size='1' face='Arial'><b>Passed</b></font></td></tr>",FILE_APPEND);
        }

        public static function FailureReport($strStepName, $strStepDes,WebDriver $driver)
        {
            App::$testResult='failed';
            self::$screenshotName = "FailureScreenshot_" . time();
            self::$screenshotPath = substr(self::$detailreportfilename,0, strripos(self::$detailreportfilename,"\\")) . "//" . self::$screenshotName . ".Jpeg";
            $driver->takeScreenshot(self::$screenshotPath);
            //bitmap.Save(screenshotPath, ImageFormat.Jpeg);
            self::onFailure($strStepName, $strStepDes);
        }

        public static function WarnReport($strStepName, $strStepDes,WebDriver $driver)
        {
            self::$screenshotName = "FailureScreenshot_".time();
            self::$screenshotPath = self::$detailreportfilename.substr(0, self::$detailreportfilename.strripos("\\")) . "//" . self::$screenshotName . ".Jpeg";
            $driver->takeScreenshot(self::$screenshotPath);
            file_put_contents(self::$detailreportfilename,"<tr><td width='30%'><font color='#153e7e' size='1' face='Arial'><b>" . $strStepName . "</b></font></td><td><font color='#153e7e' size='1' face='Arial'><b>" . $strStepDes . "</b></font></td>" . "<td width='10%' bgcolor='yellow' align='center'><font color='white' size='1' face='Arial'><b><a href='" . self::$screenshotPath . "'>Info</a></b></font></td></tr>",FILE_APPEND);
        }

        private static function onFailure($strStepName, $strStepDes)
        {
            file_put_contents(self::$detailreportfilename,"<tr><td width='30%'><font color='#153e7e' size='1' face='Arial'><b>" . $strStepName . "</b></font></td><td><font color='#153e7e' size='1' face='Arial'><b>" . $strStepDes . "</b></font></td>" . "<td width='10%' bgcolor='red' align='center'><font color='white' size='1' face='Arial'><b><a href='" . self::$screenshotPath . "'>Failed</a></b></font></td></tr>",FILE_APPEND);
        }

        public static function testHeader($strModuleName, $strTestName)
        {
            self::$testcaseCount++;
            file_put_contents(self::$detailreportfilename,"<div id='Script" . self::$testcaseCount. "'><table align= 'center' border='1' cellspacing='1' cellpadding='1' width='80%'>",FILE_APPEND);
            file_put_contents(self::$detailreportfilename,"<tr><td colspan='3'><h4 align='center'><font color='black' size='4' face='Arial'><b>" . $strModuleName . " - " . $strTestName . "</b></font></h4></td></tr>",FILE_APPEND);
            file_put_contents(self::$detailreportfilename,"<tr><td bgcolor='#153e7e' width='30%' align='center' valign='middle'><font color='#e0e0e0' size='2' face='Arial'><b>Step</b></td>". "<td bgcolor='#153e7e' align='center' valign='middle'><font color='#e0e0e0' size='2' face='Arial'><b>Description</b></font></td>"."<td bgcolor='#153e7e' align='center' valign='middle' width='10%'><font color='#e0e0e0' size='2' face='Arial'><b>Status</b></font></td></tr>",FILE_APPEND);
        }
        /*public static function testHeaderEnd()
        {
           file_put_contents(self::$detailreportfilename,"</table></div><br/><br/>",FILE_APPEND);
        }
        public static function testFooter()
        {
            file_put_contents(self::$detailreportfilename,"</body></html>",FILE_APPEND);
        }

        public static function CreateReportSetupExecCleanupSection($strtype)
        {
            file_put_contents(self::$detailreportfilename,"<tr><td align='center' width='30%' colspan='3'><font color='#153e7e' size='1' face='Arial'><b>" . $strtype . "</b></font></td></tr>",FILE_APPEND);
        }*/
} 