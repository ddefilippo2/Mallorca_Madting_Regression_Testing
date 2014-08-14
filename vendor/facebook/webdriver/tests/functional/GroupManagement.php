<?php
/**
 * Created by PhpStorm.
 * User: ddefilippo
 * Date: 8/12/14
 * Time: 1:33 PM
 */

class GroupManagement extends BaseSeleniumTest {

    /**
     * @Author: Dennis DeFilippo
     * @Date: 12/August/2014
     * @Action: Added GroupManagement Functionality Regression
     */
    //Group Management Functionality Regression Test //My Groups
    public function testmyGroups()
    {
        HtmlReport::testHeader("GroupManagement","testMy Groups");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $homepage1App=HomePage1::setInstance();
                $newCaseApp=NewCasePage::setInstance();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('GroupManagement.xml');
                foreach($dataObject->children() as $child)
                {
                    #region TestData
                    $urlNameCurrent=((string)$child->urlNameCurrent);
                    $enterTileDescreiption=((string)$child->enterTileDescreiption);
                    $enterpostContent=((string)$child->enterpostContent);
                    #endregion
                    //Launch and Navigate to Medting App
                    if ($app1=App::LaunchAndNavigate("chrome",$this->url))
                    {
                        HtmlReport::SuccessReport("Launch Medting Application","Successfully Launched Medting Application");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Launch Medting Application","Failed to Successfully Launch Medting Application",$app1);
                        return;
                    }
                    //Log into Palma Application with Admin Credentials
                    if ($loginApp->logintoMedting($app1, "ddefilippo","!Aug2014"))
                    {
                        HtmlReport::SuccessReport("Login to Palma App With Admin Credentials","Successfully Logged into Palma Application With Admin Credentials");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Login to Palma App With Admin Credentials","Failed to Login to Palma Application With Admin Credentials",$app1);
                        return;
                    }
                    sleep(12);
                    //Go to My Groups-->Select a Group
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->ClickSelectAGroup($app1);
                    $loginApp->ClickSelectAGroup($app1);
                    sleep(12);
                    //Choose A Group 20140602_RegressionTemplate
                    //if ($homepage1App->RegressionTemplate20140811)
                    //{
                    //    HtmlReport::SuccessReport("Choose A Group 20140602_RegressionTemplate","Successfully Chose A Group 20140602_RegressionTemplate");
                    //}
                    //else
                    //{
                    //    HtmlReport::FailureReport("Choose A Group 20140602_RegressionTemplate","Failed to Successfully Choose A Group 20140602_RegressionTemplate",$app1);
                    //    return;
                    //}
                    //Click Group News Tab
                    if ($newCaseApp->ClickGroupNewTab($app1))
                    {
                        HtmlReport::SuccessReport("Click Group News Button","Successfully Clicked Group News Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Group News Button","Failed to Successfully Click Group News Button",$app1);
                        return;
                    }
                    //Click Create New Post In News Button
                    if ($newCaseApp->ClickCreateNewPostInNewButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Create New Post In News Button","Successfully Clicked Create New Post In News Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Create New Post In News Button","Failed to Successfully Click Create New Post In News Button",$app1);
                        return;
                    }
                    //Enter Title
                    if ($newCaseApp->EnterTitleInTitleField($app1, $enterTileDescreiption))
                    {
                        HtmlReport::SuccessReport("Enter Title In Title Field","Successfully Clicked Create New Post In News Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Create New Post In News Button","Failed to Successfully Click Create New Post In News Button",$app1);
                        return;
                    }
                    //Post Content
                    if ($newCaseApp->EnterPostContentTextBox($app1, $enterpostContent))
                    {
                        HtmlReport::SuccessReport("Post Content","Successfully Posted Content");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Post Content","Failed to Successfully Successfully Post Content",$app1);
                        return;
                    }
                    //Click Post Item Button
                    if ($newCaseApp->ClickPostItemButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Post Item Button","Successfully Clicked Post Item Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Post Item Button","Failed to Successfully Click Post Item Button",$app1);
                        return;
                    }


















                    //Click Files Tab
                    //Click Add Files To This Group
                    //Click Workflow Tab
                    //Click Disable Workflow Radiobutton
                    //Click Select a Platform Workflow Radiobutton
                    //Click Create Workflow Radiobutton
                    //Click Assign This Workflow Button
                    //Click Template Tab
                    //Click Select A Platform Template Radiobutton
                    //Click Assign This Template
                    //Click Create A Template Radiobutton
                    //Click Save Cases Template
                    //Click Disable Template Radiobutton
                    //Click Save Group Without Template Button
                    //Click Form Tab
                    //Click Template Tab
                    //Click Select A Platform Template
                    //Click Assign This Template Button
                    //Click Create A Template Radiobutton
                    //Add Fields
                    //Click Save Cases Template Button
                    //Click Disable template Radiobutton
                    //Click Save Group Without Template Button
                    //Click Admin Tab
                    //Verify Users, Send Notifications, Edit Group, Subgroups, Stats, Roles
                    //Click Show Users Button
                    //Click Invite User Button
                    //Click Show Send Notifications
                    //Enter Message, then Click Send Message Button
                    //Click Show Edit Group
                    //Enter Text within Group Description box and Click Update Button
                    //Click Show Subgroups
                    //Click Create Subgroup
                    //Show Stats
                    //Choose Cases
                    //Kill Browser
                    //Navigate to bestdoctors.qa.medting.com
                    //Log into Palma Application with Admin Credentials
                    if ($app1=App::LaunchAndNavigate("chrome","bestdoctors.qa.medting.com"))
                    {
                        HtmlReport::SuccessReport("Launch Medting Application","Successfully Launched Medting Application");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Launch Medting Application","Failed to Successfully Launch Medting Application",$app1);
                        return;
                    }
                    if ($loginApp->logintoMedting($app1, "ddefilippo","!Aug2014"))
                    {
                        HtmlReport::SuccessReport("Login to Palma App With Admin Credentials","Successfully Logged into Palma Application With Admin Credentials");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Login to Palma App With Admin Credentials","Failed to Login to Palma Application With Admin Credentials",$app1);
                        return;
                    }
                    //My Groups
                    //Click 20140602_RegressionTemplate
                    //Click Admin Tab
                    //Click Show Roles Tab
                    //Add a New Role, then click pluss sign
                    //Edit This Role by clicking the boxes to the right (autosaves)
                    //Now click Member radiobutton (verify only three check boxes are displayed)
                    //Click radio Button for newly added role, then click the delete Icon
                    //kill browser

                }
            }
            ,"testmyGroups","GroupManagement"
        );
    }

}
 