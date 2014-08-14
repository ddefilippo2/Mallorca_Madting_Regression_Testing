<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/22/14
 * Time: 3:13 PM
 */

class TrailTest1 extends BaseSeleniumTest
{

    /**
     * @Author: Yuvaraj
     * @Date: 29/July/2014
     * @Action: Added New Test Case
     */
    public function testMethod1()
    {
        HtmlReport::testHeader("TrailTest1","testMethod1");
        $this->executeTestCaller(
            function ()
            {
                $app1=App::LaunchAndNavigate("chrome",$this->url);
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('TestData.xml');
                #region Iterate Test Steps For The Test Data
                foreach($dataObject->children() as $child)
                {
                    #region TestData
                    $userName=((string)$child->userName);
                    $password=((string)$child->password);
                    $image1='Image1.dcm';
                    $image2='Image2.dcm';
                    $image3='Image3.dcm';
                    $loginPage=LoginPage::setInstance();
                    $dashboardPage=DashboardPage::setInstance();
                    $homePage=HomePage1::setInstance();
                    #endregion

                    #region Test Steps
                    if($loginPage->logintoMedting($app1,$userName,$password))
                    {
                        HtmlReport::SuccessReport("Login To Medting Application","Successfully Logged into Medting Application");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Login To Medting Application","Failed to Log in into Medting Application",$app1);
                    }
                    if($dashboardPage->clickHomePageLink($app1))
                    {
                        HtmlReport::SuccessReport("Click Home Page Link","Successfully Clicked Home Page Link");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Home Page Link","Failed to Click Home Page Link",$app1);
                    }
                    if($homePage->clickAddNewLinkInMyMedia($app1))
                    {
                        HtmlReport::SuccessReport("Click Add New Link","Successfully Clicked Add New Link");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add New Link","Failed to Click Add New Link",$app1);
                    }
                    //chrome
                    //Enter Password Confirmation
                    //firefox for example (example tile of firefox window is Browse File
                    ////$escaped_cmd = 'FileUploadScript.exe Browse{space}File '.dirname(__DIR__).'\\functional\\files\\'.'"{space}"""'.$image1.'"""{space}"""'.$image2.'"""{space}"""'.$image3.'""';
                    $escaped_cmd = 'FileUploadScript.exe Open '.dirname(__DIR__).'\\functional\\files\\'.'"{space}"""'.$image1.'"""{space}"""'.$image2.'"""{space}"""'.$image3.'""';
                    if($homePage->sendFileToInput($app1,$escaped_cmd))
                    {
                        HtmlReport::SuccessReport("Upload Multiple Files","Successfully Uploaded Multiple Files");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Upload Multiple Files","Failed to Upload Multiple Files",$app1);
                    }
                    $app1->close();
                    #endregion
                }
                #endregion
            }
            ,"testMethod1","TrailTest1"
         );
    }

    public function testLoginToMedting()
    {
        HtmlReport::testHeader("TrailTest1","test Login To Medting Application");
        $this->executeTestCaller(
            function()
            {
                $app=App::LaunchAndNavigate("chrome",$this->url);
                $loginApp=LoginPage::setInstance();
                if($loginApp->logintoMedting($app,"testadminselenium","medting2012"))
                {
                    HtmlReport::SuccessReport("Login To Medting Application","Successfully Logged in To Medting Application");
                }
                else
                {
                    HtmlReport::FailureReport("Login To Medting Application","Failed to Login To Medting Application",$app);
                }
            }
        ,"testLoginToMedting","TrailTest1"
        );
    }

}
 