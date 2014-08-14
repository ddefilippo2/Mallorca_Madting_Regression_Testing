<?php
/**
 * Created by PhpStorm.
 * User: DDefilippo
 * Date: 7/29/14
 * Time: 10:37 AM
 */

class CaseManagement extends BaseSeleniumTest
{
    /**
     * @Author: Dennis DeFilippo
     * @Date: 05/August/2014
     * @Action: Added Case Management Functionality Regression
     */

    //Case Management Functionality Regression Test //Create Case Functionality
    public function testCreateCase()
    {
        HtmlReport::testHeader("Case Management","Create Case");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                $newcaseApp=NewCasePage::setInstance();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //Randomly generates Case Name
                $RandomCaseName=Helper::getRandomCaseName();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('CaseManagement.xml');
                foreach($dataObject->children() as $child)
                {
                    #region Test_Data
                    $enterCaseNameEditBox1=((string)$child->enterCaseNameEditBox);
                    $enterTextValueA=((string)$child->enterTextValueA);
                    $enterTextValueB=((string)$child->enterTextValueB);
                    $colaboratorCampo1=((string)$child->CollaboratorValueTextFieldA);
                    $colaboratorCampo2=((string)$child->CollaboratorValueTextFieldB);
                    $errormsgAcceptTerms=((string)$child->errormsgAcceptTerms);
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
                    //Click Create a Case Button
                    if ($dashboardApp->CreateaCaseButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Create a Case Button","Successfully Clicked Create a Case Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Create a Case Button","Failed to Successfully Clicked Create a Case Button",$app1);
                        return;
                    }
                    //Create case Without Groups With forms
                    //if ($dashboardApp->ClickCreateNewCaseWithoutGroupButton($app1))
                    //{
                    //    HtmlReport::SuccessReport("Click Regression Form For Case Without Group","Successfully Clicked Regression Form For Case Without Group");
                    //}
                    //else
                    //{
                    //    HtmlReport::FailureReport("Click Regression Form For Case Without Group","Failed to Successfully Click Regression Form For Case Without Group",$app1);
                    //    return;
                    //}
                    //Enter Case Name
                    if ($newcaseApp->ClickNewCaseEnterCaseName($app1, $RandomCaseName))
                    {
                        HtmlReport::SuccessReport("Click New Case Enter Case Name","Successfully Clicked New Case Enter Case Name");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click New Case Enter Case Name","Failed to Successfully Click New Case Enter Case Name",$app1);
                        return;
                    }
                    //Enter Text in Text Box1
                    if ($newcaseApp->EnterTextTinyMceC($app1, $enterTextValueA))
                    {
                        HtmlReport::SuccessReport("Enter Text in Text Box1","Successfully Enter Text in Text Box1");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Text in Text Box1","Failed to Successfully Enter Text in Text Box1",$app1);

                    }
                    //Convert to Heading
                    if($newcaseApp->ConvertToHeadingClick($app1))
                    {
                        HtmlReport::SuccessReport("Convert to Heading ","Successfully Converted to Heading ");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Convert to Heading ","Failed to Successfully Convert to Heading",$app1);

                    }
                    //Convert to Bullet
                    if($newcaseApp->ConvertToBulletClick($app1))
                    {
                        HtmlReport::SuccessReport("Convert to Bullet ","Successfully Converted to Bullet");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Convert to Bullet ","Failed to Successfully Convert to Bullet",$app1);

                    }
                    //Associate Media
                    if ($newcaseApp->ClickAssociateMediaButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Associate Media","Successfully Clicked Associate Media Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Associate Media","Failed to Successfully Click Successfully Clicked Associate Media Button",$app1);

                    }
                    //Associate File
                    if ($newcaseApp->ClickAssociateFileButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Associate File","Successfully Clicked Associate File Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Associate File","Failed to Successfully Click Successfully Clicked Associate File Button",$app1);

                    }
                    //Upload From Word
                    if ($newcaseApp->ClickUploadFromWordButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Upload From Word Button","Successfully Clicked Upload From Word Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Upload From Word Button","Failed to Successfully Click Upload From Word Button",$app1);

                    }
                    //Insert/Edit Link
                    if ($newcaseApp->ClickInsertEditButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Insert Edit Link Button","Successfully Clicked Insert Edit Link Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Insert Edit Link Button","Failed to Successfully Click Click Insert Edit Link Button",$app1);

                    }
                    //View in Full Window
                    if ($newcaseApp->ClickViewInFullWindowButton($app1))
                    {
                        HtmlReport::SuccessReport("Click View In Full Window Button","Successfully Clicked View In Full Window Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click View In Full Window Button","Failed to Successfully Click View In Full Window Button",$app1);

                    }
                    //Click Back To Case Button
                    if ($newcaseApp->ClickBackToCaseButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Back To Case Button","Successfully Clicked Back To Case Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Back To Case Button Button","Failed to Successfully Click Back To Case Button",$app1);

                    }
                    //Add Specialities
                    //Click On Select a Speciality Text
                    if ($newcaseApp->ClickSelectaSpeciality($app1))
                    {
                        HtmlReport::SuccessReport("Click On Select a Speciality Text","Successfully Clicked On Select a Speciality Text");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click On Select a Speciality Text","Failed to Successfully Click On Select a Speciality Text",$app1);
                        return;
                    }
                    //Choose A Speciality From Select a Speciality List Box
                    if ($newcaseApp->ChooseSpecialityFromSelectSpecialityListBox($app1))
                    {
                        HtmlReport::SuccessReport("Choose A Speciality From Select a Speciality List Box","Successfully Chose A Speciality From Select a Speciality List Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Choose A Speciality From Select a Speciality List Box","Failed to Successfully Choose A Speciality From Select a Speciality List Box",$app1);
                        return;
                    }

                    //Click On Select a Sub-Speciality Text
                    if ($newcaseApp->ClickSelectaSubSpeciality($app1))
                    {
                        HtmlReport::SuccessReport("Click On Select a Sub-Speciality Text","Successfully Clicked On Select a Sub-Speciality Text");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click On Select a Sub-Speciality Text","Failed to Successfully Click On Select a Sub-Speciality Text",$app1);
                        return;
                    }
                    //Choose A Sub-Speciality From Select a Sub-Speciality List Box
                    if ($newcaseApp->ChooseSubSpecialityFromSubSelectSpecialityListBox($app1))
                    {
                        HtmlReport::SuccessReport("Choose A Sub-Speciality From Select a Sub-Speciality List Box","Successfully Chose A Sub-Speciality From Select a Sub-Speciality List Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Choose A Sub-Speciality From Select a Sub-Speciality List Box","Failed to Successfully Choose A Sub-Speciality From Select a Sub-Speciality List Box",$app1);
                        return;
                    }
                    //Click Add Speciality Button
                    if ($newcaseApp->ClickSelectaSpeciality($app1))
                    {
                        HtmlReport::SuccessReport("Click Add Speciality Button","Successfully Clicked Add Speciality Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add Speciality Button","Failed to Successfully Click Add Speciality Button",$app1);
                        return;
                    }
                    //Add SNOMED Tag
                    //Note need to log into bestdoctors.qa.medting.com in order to do this step
                    if ($newcaseApp->addSNOMEDTag($app1))
                    {
                        HtmlReport::SuccessReport("Click Add SNOMED Tag","Successfully Added SNOMED Tag");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add SNOMED Tag","Failed to Successfully Add SNOMED Tag",$app1);
                        return;
                    }
                    //Click Groups And Workflow Button
                    if ($newcaseApp->ClickGroupsandWorkflowButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Groups And Workflow Button","Successfully Clicked Groups And Workflow Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Groups And Workflow Button","Failed to Successfully Click Groups And Workflow Button",$app1);
                        return;
                    }
                    //Upload Media and Files, Add from My Files
                    if ($newcaseApp->ClickFilesandMediaPane($app1))
                    {
                        HtmlReport::SuccessReport("Click Files and Multimedia","Successfully Clicked Files and Multimedia");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Files and Multimedia","Failed to Successfully Click Files and Multimedia",$app1);
                        return;
                    }
                    //Click Add From My Files Button
                    if ($newcaseApp->ClickAddFromMyFilesButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Add From My Files Button","Successfully Clicked Add From My Files Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add From My Files Button","Failed to Successfully Click Add From My Files Button",$app1);
                        return;
                    }
                    //NOTE NEED TO ADD UPLOAD SCRIPTING HERE>>>>>>>>
                    //Click Files Upload Button
                    if ($newcaseApp->ClickFilesUploadButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Files Upload Button","Successfully Clicked Files Upload Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Files Upload Button","Failed to Successfully Click Files Upload Button",$app1);
                        return;
                    }
                    //Click Add Files From Images and Videos Section
                    if ($newcaseApp->ClickAddFilesImagesVideosSection($app1))
                    {
                        HtmlReport::SuccessReport("Click Add Files From Images and Videos Section","Successfully Clicked Add Files From Images and Videos Section");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add Files From Images and Videos Section","Failed to Successfully Click Add Files From Images and Videos Section",$app1);
                        return;
                    }
                    //Click Add From MY Media Button
                    if ($newcaseApp->ClickAddFromMyMediaButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Add From MY Media Button","Successfully Clicked Add From MY Media Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add From MY Media Button","Failed to Successfully Click Add From MY Media Button",$app1);
                        return;
                    }
                    //Do not Check - I have not included any payment information within this case, then click Submit button
                    if ($newcaseApp->ClickSubmitButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Submit Button Without Clicking Patient Info Checkbox","Successfully Clicked Submit Button Without Clicking Patient Info Checkbox");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Submit Button Without Clicking Patient Info Checkbox","Failed to Successfully Click Submit Button Without Clicking Patient Info Checkbox",$app1);
                        return;
                    }
                    //Verify Error Message - You Must Accept Terms
                    if ($newcaseApp->VerifyErrorMessageYouMustAcceptTerms($app1, $errormsgAcceptTerms))
                    {
                        HtmlReport::SuccessReport("Verify Error Message - You Must Accept Terms","Successfully Verified Error Message - You Must Accept Terms");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Error Message - You Must Accept Terms","Failed to Successfully Verif Error Message - You Must Accept Terms",$app1);
                        return;
                    }
                    //Close Application
                    $app1->close();

                }

            }
            ,"testCreateCase","CaseManagement"
        );
    }
    //Case Management Functionality Regression Test //Edit Case Functionality
    public function testEditCase()
    {
        HtmlReport::testHeader("Case Management","Edit Case");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                $newcaseApp=NewCasePage::setInstance();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //Randomly generates Case Name
                $RandomCaseName=Helper::getRandomCaseName();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('CaseManagement.xml');
                foreach($dataObject->children() as $child)
                {
                    #region Test_Data
                    $enterCaseNameEditBox1=((string)$child->enterCaseNameEditBox);
                    $enterTextValueA=((string)$child->enterTextValueA);
                    $enterTextValueB=((string)$child->enterTextValueB);
                    $colaboratorCampo1=((string)$child->CollaboratorValueTextFieldA);
                    $colaboratorCampo2=((string)$child->CollaboratorValueTextFieldB);
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
                    //Verify Delete Case Icon
                    if ($loginApp->VerifyDeleteCaseIcon($app1))
                    {
                        HtmlReport::SuccessReport("Verify Delete Case Icon","Successfully Verified Delete Case Icon");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Delete Case Icon","Failed to Successfully Verify Delete Case Icon",$app1);

                    }
                    //Verify Make It Private Icon
                    if ($loginApp->VerifyMakeItPrivateIcon($app1))
                    {
                        HtmlReport::SuccessReport("Verify Make It Private Icon","Successfully Verified Make It Private Icon");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Delete Case Icon","Failed to Successfully Verify Make It Private Icon",$app1);

                    }
                    //Verify Edit Case Icon
                    if ($loginApp->VerifyEditCaseIcon($app1))
                    {
                        HtmlReport::SuccessReport("Verify Make It Private Icon","Successfully Verified Edit Case Icon");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Delete Case Icon","Failed to Successfully Verify Edit Case Icon",$app1);

                    }
                    //Verify Collaborators Map
                    if ($loginApp->VerifyCollaboratorsMap($app1))
                    {
                        HtmlReport::SuccessReport("Verify Collaborators Map","Successfully Verify Collaborators Map");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Collaborators Map","Failed to Successfully Verify Collaborators Map",$app1);

                    }
                    //NEED TO DO THESE.....
                    //Verify Case Overview
                    //Verify Related Groups
                    //Verify Case Author Info/Collaborators
                    //Check Pudmed Loading (need to have SNOMED included)
                    //Test all Ent except Asbmt
                    //Check Usefull Links
                    if ($loginApp->ClickEditIconButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Edit Icon Button","Successfully Clicked Edit Icon Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Edit Icon Button","Failed to Successfully Click Edit Icon Button",$app1);

                    }
                    if ($loginApp->ClickUsefullLinkGoogleLink($appl))
                    {
                        HtmlReport::SuccessReport("Click Useful Link Google Link","Successfully Clicked Useful Link Google Link");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Useful Link Google Link","Failed to Successfully Click Useful Link Google Link",$app1);

                    }
                    if ($loginApp->ClickUsefullLinkTestLinkJP2($appl))
                    {
                        HtmlReport::SuccessReport("Click Useful Link Test JP2","Successfully Clicked Useful Link Test JP2");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Useful Link Test JP2","Failed to Successfully Click Useful Link Test JP2",$app1);

                    }
                    if ($loginApp->ClickUsefullLinkIfeelLuckyNot($appl))
                    {
                        HtmlReport::SuccessReport("Click Useful Link I Feel Lucky or Not","Successfully Clicked Useful Link I Feel Lucky or Not");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Useful Link I Feel Lucky or Not","Failed to Successfully Click Useful Link I Feel Lucky or Not",$app1);

                    }
                    if ($loginApp->ClickUsefullLinkBestDocWebsite($appl))
                    {
                        HtmlReport::SuccessReport("Click Useful Link Best Doc Website","Successfully Clicked Useful Link Best Doc Website");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Useful Link Best Doc Website","Failed to Successfully Click Useful Link Best Doc Website",$app1);

                    }
                    if ($loginApp->ClickUsefullLinkUsefull($appl))
                    {
                        HtmlReport::SuccessReport("Click Useful Link Useful","Successfully Clicked Useful Link Useful");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Useful Link Useful","Failed to Successfully Click Useful Link Useful",$app1);

                    }
                    //Translate Case To (Check in asbmt.qa.medting.com)
                    if ($loginApp->ClickTranslateCaseTo($app1))
                    {
                        HtmlReport::SuccessReport("Click Translate Case To","Successfully Clicked Translate Case To");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Translate Case To","Failed to Successfully Click Translate Case To",$app1);

                    }
                    //HOW DO YOU DO THIS....
                    //Check Case Visability
                    //Check Case History
                    //Email This

                    //Share Case With
                    if ($newcaseApp->ClickShareCaseWithButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Share Case With Button","Successfully Clicked Share Case With Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Share Case With Button","Failed to Successfully Click Share Case With Button",$app1);

                    }
                    //WHERE IS THE ADD CALANDAR FUNCTIONALITY?????
                    //Add to Calandar
                    //Verify Download PDF
                    if ($newcaseApp->Verifydownloadpdfbutton($app1))
                    {
                        HtmlReport::SuccessReport("Verify Download PDF Button","Successfully Verified Download PDF Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Download PDF Button","Failed to Successfully Verify Download PDF Button",$app1);

                    }
                    //Verify Add Comment Icon
                    if ($newcaseApp->VerifyPostCommentIcon($app1))
                    {
                        HtmlReport::SuccessReport("Verify Add Comment Icon","Successfully Verified Add Comment Icon");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Add Comment Icon","Failed to Successfully Verify Verify Add Comment Icon",$app1);

                    }
                    //WHERE IS THE DELETE COMMENT BUTTON?
                    //Delete Comment
                    //WHERE IS THE DOWNLOAD MEDIABUTTON?
                    //Download Media







                }














                //Edit Case Button
                //Keywords (SNOMED)-test with cases with no forms
                //Check Added to Correct Group--workflow and template
                //Click Collaborator View of Case
                //Click That you can add media from my media and new media
                //Click That you can add files from my files and new files
                //Open case Media in MedViewer
                //Check that you can download your own attachments
                //Check templates and Forms from Collaborator View
                //Case Stats (qa.medting.com)
                //Autosave-check if it kicks in when modifying descrip[tion by the owner
                //Autosave-check if it kicks in when colaborators adds media and does nothing for a while

            }
            ,"testEditCase","CaseManagement"
        );
    }
    //Case Management Functionality Regression Test //EMEEA Workflow Functionality
    public function testEMEEAWorkflow()
    {
        HtmlReport::testHeader("Case Management","EMEEA Workflow");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                $newcaseApp=NewCasePage::setInstance();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //Randomly generates Case Name
                $RandomCaseName=Helper::getRandomCaseName();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('CaseManagement.xml');
                foreach($dataObject->children() as $child)
                {
                    #region Test_Data
                    $enterCaseNameEditBox1=((string)$child->enterCaseNameEditBox);
                    $enterTextValueA=((string)$child->enterTextValueA);
                    $enterTextValueB=((string)$child->enterTextValueB);
                    $colaboratorCampo1=((string)$child->CollaboratorValueTextFieldA);
                    $colaboratorCampo2=((string)$child->CollaboratorValueTextFieldB);
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

                }
                //As case Coordinator, Create a case in EMEEA Group
                //Asign a Case to a case manager
                //Check Email-You've been asigned a case
                //Set password
                //Verify that as case manager, you see the case assigned to you
                //As case manager, Verify that you can pick on of the cases assigned to case coordinator and autosign
                //As case manager Assign Csase to another Case Manager
                //Verify you can modify clinic history number and password
                //Verify Modify description add media/ files
                //Verify case manager receives email when case is updated
                //Verifuy that as case manager -you canb upload media/attachments to case identified by clinical history and password
                //Go to case where the media/files where uploaded and check you can see them with medviewer
                //Close Application
                $app1->close();

            }
            ,"testEMEEAWorkflow","CaseManagement"
        );
    }
    //Case Management Functionality Regression Test //Case Access Functionality With Groups Using Forms
    public function testCaseAccess_CreateCaseWithGroupUsingForms()
    {
        HtmlReport::testHeader("Case Management","CaseAccess_CreateCaseWithGroupUsingForms");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                $newcaseApp=NewCasePage::setInstance();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //Randomly generates Case Name
                $RandomCaseName=Helper::getRandomCaseName();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('CaseManagement.xml');
                foreach($dataObject->children() as $child)
                {
                    #region Test_Data
                    $enterCaseNameEditBox1=((string)$child->enterCaseNameEditBox);
                    $enterTextValueA=((string)$child->enterTextValueA);
                    $enterTextValueB=((string)$child->enterTextValueB);
                    $colaboratorCampo1=((string)$child->CollaboratorValueTextFieldA);
                    $colaboratorCampo2=((string)$child->CollaboratorValueTextFieldB);
                    $enterTxtfValue=((string)$child->enterTxtfValue);
                    $enterTxtfalpmandValue=((string)$child->enterTxtfalpmandValue);
                    $shareCaseEnterValue=((string)$child->shareCaseEnterValue);
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
                    //Create Case in a group
                    if ($dashboardApp->CreateaCaseButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Create a Case Button","Successfully Clicked Create a Case Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Create a Case Button","Failed to Successfully Clicked Create a Case Button",$app1);
                        return;
                    }
                    //Create case With forms
                    if ($dashboardApp->ClickRegressionFormForCaseWithGroup($app1))
                    {
                        HtmlReport::SuccessReport("Click Regression Form For Case With Group","Successfully Clicked Regression Form For Case With Group");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Regression Form For Case With Group","Failed to Successfully Click Regression Form For Case With Group",$app1);
                        return;
                    }
                    //Add Case Name
                    if ($newcaseApp->ClickNewCaseEnterCaseName($app1, $RandomCaseName))
                    {
                        HtmlReport::SuccessReport("Click New Case Enter Case Name","Successfully Clicked New Case Enter Case Name");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click New Case Enter Case Name","Failed to Successfully Click New Case Enter Case Name",$app1);
                        return;
                    }
                    //Click Groups And Workflow Button
                    if ($newcaseApp->ClickGroupsandWorkflowButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Groups And Workflow Button","Successfully Clicked Groups And Workflow Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Groups And Workflow Button","Failed to Successfully Click Groups And Workflow Button",$app1);
                        return;
                    }
                    //Click Add Collaborators
                    if ($newcaseApp->ClickCollaboratorListBox($app1))
                    {
                        HtmlReport::SuccessReport("Click Add Collaborators list Box","Successfully Clicked Add Collaborators list Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add Collaborators list Box","Failed to Successfully Click Add Collaborators list Box",$app1);
                        return;
                    }
                    //PLEASE NOTE- Nothing to choose From in the List Box--Need to go over this
                    //Click Assign Collaborator Button
                    if ($newcaseApp->ClickAssignCollaboratorButtonA($app1))
                    {
                        HtmlReport::SuccessReport("Click Assign Collaborator Button","Successfully Clicked Assign Collaborator Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Assign Collaborator Button","Failed to Successfully Click Assign Collaborator Button",$app1);
                        return;
                    }
                    //Enter Text in TxtF Field
                    if ($newcaseApp->EnterTextTxtFField($app1))
                    {
                        HtmlReport::SuccessReport("Enter Text in TxtF Field","Successfully Entered Text in TxtF Field");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Text in TxtF Field","Failed to Successfully Enter Text in TxtF Field",$app1);
                        return;
                    }
                    //Enter Text in TxtF AlpMand Field
                    if ($newcaseApp->EnterTextTxtFAlpMandField($app1, $enterTxtfValue))
                    {
                        HtmlReport::SuccessReport("Enter Text in TxtF Field","Successfully Entered Text in TxtF Field");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Text in TxtF Field","Failed to Successfully Enter Text in TxtF Field",$app1);
                        return;
                    }
                    //Submit Case
                    if ($newcaseApp->ClickSubmitButton($app1, $enterTxtfalpmandValue))
                    {
                        HtmlReport::SuccessReport("Submit Case","Successfully Submitted Case");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Submit Case","Failed to Successfully Submit Case",$app1);
                        return;
                    }
                    //Click Share Case With Button
                    if ($newcaseApp->ClickShareCaseWithButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Share Case With Button","Successfully Clicked Share Case With Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Share Case With Button","Failed to Successfully Click Share Case With Button",$app1);
                        return;
                    }
                    //Enter Shared Case Value
                    if ($newcaseApp->EnterShareCaseWithValue($app1, $shareCaseEnterValue))
                    {
                        HtmlReport::SuccessReport("Enter Shared Case Value","Successfully Entered Shared Case Value");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Shared Case Value","Failed to Successfully Enter Shared Case Value",$app1);
                        return;
                    }
                    //Click Share Button
                    if ($newcaseApp->ClickShareCaseButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Share Button","Successfully Clicked Share Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Share Button","Failed to Successfully Click Share Button",$app1);
                        return;
                    }
                    //Click on Homepage
                    if ($newcaseApp->ClickHomepageIcon)
                    {
                        HtmlReport::SuccessReport("Click on Homepage Icon","Successfully Clicked on Homepage Icon");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click on Homepage Icon","Failed to Successfully Click on Homepage Icon",$app1);
                        return;
                    }
                    //NOTE--NEED TO DO THIS---Send Case Link to external Email--Not sure we can automate this
                    //Check Access as Collaborator
                    //Check Access as Usern Who Receives the Case Link
                    //Accept Invitation
                    //Check Access to Group Cases as Invited User
                    //Close Application
                    $app1->close();


                }

            }
            ,"testCaseAccess_CreateCaseWithGroupUsingForms","CaseManagement"
        );
    }
    //Case Management Functionality Regression Test //Case Access Functionality With Groups Using Forms
    public function testCaseAccess_CreateCaseWithGroupUsingTemplates()
    {
        HtmlReport::testHeader("Case Management","CaseAccess_CreateCaseWithGroupUsingTemplates");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                $newcaseApp=NewCasePage::setInstance();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //Randomly generates Case Name
                $RandomCaseName=Helper::getRandomCaseName();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('CaseManagement.xml');
                foreach($dataObject->children() as $child)
                {
                    #region Test_Data
                    $enterCaseNameEditBox1=((string)$child->enterCaseNameEditBox);
                    $enterTextValueA=((string)$child->enterTextValueA);
                    $enterTextValueB=((string)$child->enterTextValueB);
                    $colaboratorCampo1=((string)$child->CollaboratorValueTextFieldA);
                    $colaboratorCampo2=((string)$child->CollaboratorValueTextFieldB);
                    $enterTxtfValue=((string)$child->enterTxtfValue);
                    $enterTxtfalpmandValue=((string)$child->enterTxtfalpmandValue);
                    $shareCaseEnterValue=((string)$child->shareCaseEnterValue);
                    $enterTextWorkflowStatusCommentTextBox1=((string)$child->enterTextWorkflowStatusCommentTextBox);
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
                    //Create Case in a group
                    if ($dashboardApp->CreateaCaseButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Create a Case Button","Successfully Clicked Create a Case Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Create a Case Button","Failed to Successfully Clicked Create a Case Button",$app1);
                        return;
                    }
                    //Create case With Templates
                    if ($dashboardApp->ClickRegressionTemplatesForCaseWithGroup($app1))
                    {
                        HtmlReport::SuccessReport("Click Regression Template For Case With Group","Successfully Clicked Regression Template For Case With Group");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Regression Template For Case With Group","Failed to Successfully Click Regression Template For Case With Group",$app1);
                        return;
                    }
                    //Add Case Name
                    if ($newcaseApp->ClickNewCaseEnterCaseName($app1, $RandomCaseName))
                    {
                        HtmlReport::SuccessReport("Click New Case Enter Case Name","Successfully Clicked New Case Enter Case Name");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click New Case Enter Case Name","Failed to Successfully Click New Case Enter Case Name",$app1);
                        return;
                    }
                    //Enter Text Within Template
                    if ($newcaseApp->EnterTextTinyMceA($app1, $enterTextValueA))
                    {
                        HtmlReport::SuccessReport("Enter Text Within Template","Successfully Enter Text Within Template");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Text Within Template","Failed to Successfully Enter Text Within Template",$app1);
                        return;
                    }
                    //Click Groups And Workflow Button
                    if ($newcaseApp->ClickGroupsandWorkflowButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Groups And Workflow Button","Successfully Clicked Groups And Workflow Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Groups And Workflow Button","Failed to Successfully Click Groups And Workflow Button",$app1);
                        return;
                    }
                    //Enter Text in Workflow Status Comment Edit Text Box
                    if ($newcaseApp->EnterWorkflowStatusUpdateCommentTextBox($app1, $enterTextWorkflowStatusCommentTextBox1))
                    {
                        HtmlReport::SuccessReport("Enter Text in Workflow Status Comment Edit Text Box","Successfully Entered Text in Workflow Status Comment Edit Text Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Text in Workflow Status Comment Edit Text Box","Failed to Successfully Enter Text in Workflow Status Comment Edit Text Box",$app1);
                        return;
                    }
                    //Click Add Collaborators
                    if ($newcaseApp->ClickCollaboratorsTemplateListBoxId($app1))
                    {
                        HtmlReport::SuccessReport("Click Add Collaborators list Box","Successfully Clicked Add Collaborators list Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add Collaborators list Box","Failed to Successfully Click Add Collaborators list Box",$app1);
                        return;
                    }
                    //Choose Collaborator from Collaborator List Box
                    if ($newcaseApp->SelectCollaboratorFromListA($app1))
                    {
                        HtmlReport::SuccessReport("Choose Collaborator from Collaborator List Box","Successfully Chose Collaborator from Collaborator List Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Choose Collaborator from Collaborator List Box","Failed to Successfully Choose Collaborator from Collaborator List Box",$app1);
                        return;
                    }
                    //Click Assign Collaborator Button
                    if ($newcaseApp->ClickAssignCollaboratorTemplateButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Assign Collaborator Button","Successfully Clicked Assign Collaborator Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Assign Collaborator Button","Failed to Successfully Click Assign Collaborator Button",$app1);
                        return;
                    }
                    //Add Specialities
                    //Click On Select a Speciality Text
                    if ($newcaseApp->ClickSelectaSpeciality($app1))
                    {
                        HtmlReport::SuccessReport("Click On Select a Speciality Text","Successfully Clicked On Select a Speciality Text");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click On Select a Speciality Text","Failed to Successfully Click On Select a Speciality Text",$app1);
                        return;
                    }
                    //Choose A Speciality From Select a Speciality List Box
                    if ($newcaseApp->ChooseSpecialityFromSelectSpecialityListBox($app1))
                    {
                        HtmlReport::SuccessReport("Choose A Speciality From Select a Speciality List Box","Successfully Chose A Speciality From Select a Speciality List Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Choose A Speciality From Select a Speciality List Box","Failed to Successfully Choose A Speciality From Select a Speciality List Box",$app1);
                        return;
                    }

                    //Click On Select a Sub-Speciality Text
                    if ($newcaseApp->ClickSelectaSubSpeciality($app1))
                    {
                        HtmlReport::SuccessReport("Click On Select a Sub-Speciality Text","Successfully Clicked On Select a Sub-Speciality Text");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click On Select a Sub-Speciality Text","Failed to Successfully Click On Select a Sub-Speciality Text",$app1);
                        return;
                    }
                    //Choose A Sub-Speciality From Select a Sub-Speciality List Box
                    if ($newcaseApp->ChooseSubSpecialityFromSubSelectSpecialityListBox($app1))
                    {
                        HtmlReport::SuccessReport("Choose A Sub-Speciality From Select a Sub-Speciality List Box","Successfully Chose A Sub-Speciality From Select a Sub-Speciality List Box");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Choose A Sub-Speciality From Select a Sub-Speciality List Box","Failed to Successfully Choose A Sub-Speciality From Select a Sub-Speciality List Box",$app1);
                        return;
                    }
                    //Click Add Speciality Button
                    if ($newcaseApp->ClickSelectaSpeciality($app1))
                    {
                        HtmlReport::SuccessReport("Click Add Speciality Button","Successfully Clicked Add Speciality Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Add Speciality Button","Failed to Successfully Click Add Speciality Button",$app1);
                        return;
                    }
                    //Submit Case
                    if ($newcaseApp->ClickSubmitButton($app1, $enterTxtfalpmandValue))
                    {
                        HtmlReport::SuccessReport("Submit Case","Successfully Submitted Case");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Submit Case","Failed to Successfully Submit Case",$app1);
                        return;
                    }
                    //Click Share Case With Button
                    if ($newcaseApp->ClickShareCaseWithButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Share Case With Button","Successfully Clicked Share Case With Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Share Case With Button","Failed to Successfully Click Share Case With Button",$app1);
                        return;
                    }
                    //Enter Shared Case Value
                    if ($newcaseApp->EnterShareCaseWithValue($app1, $shareCaseEnterValue))
                    {
                        HtmlReport::SuccessReport("Enter Shared Case Value","Successfully Entered Shared Case Value");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Shared Case Value","Failed to Successfully Enter Shared Case Value",$app1);
                        return;
                    }
                    //Click Share Button
                    if ($newcaseApp->ClickShareCaseButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Share Button","Successfully Clicked Share Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Share Button","Failed to Successfully Click Share Button",$app1);
                        return;
                    }
                    //Click on Homepage
                    if ($newcaseApp->ClickHomepageIcon)
                    {
                        HtmlReport::SuccessReport("Click on Homepage Icon","Successfully Clicked on Homepage Icon");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click on Homepage Icon","Failed to Successfully Click on Homepage Icon",$app1);
                        return;
                    }
                    //NOTE--NEED TO DO THIS---Send Case Link to external Email--Not sure we can automate this
                    //Check Access as Collaborator
                    //Check Access as Usern Who Receives the Case Link
                    //Accept Invitation
                    //Check Access to Group Cases as Invited User
                    //Close Application
                    $app1->close();


                }

            }
            ,"testCaseAccess_CreateCaseWithGroupUsingTemplates","CaseManagement"
        );
    }




}

