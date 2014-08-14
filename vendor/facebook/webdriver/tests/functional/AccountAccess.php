<?php
/**
 * Created by PhpStorm.
 * User: DDefilippo
 * Date: 7/29/14
 * Time: 10:37 AM
 */

class AccountAccess extends BaseSeleniumTest
{
    /**
     * @Author: Dennis DeFilippo
     * @Date: 29/July/2014
     * @Action: Added AccountAccess Functionality Regression
     */

    //Account Access Functionality Regression Test //Sign In Page Hyperlinks
    public function testClickBestDoctorslink()
    {
      HtmlReport::testHeader("AccountAccess","testClickBestDoctorslink");
      $this->executeTestCaller(
      function ()
      {
          $loginApp=LoginPage::setInstance();
          //read the Test Data for the Test Case
          $dataObject=$this->ReadDataFromXml('AccountAccess.xml');
          foreach($dataObject->children() as $child)
          {
              #region TestData
              $urlNameCurrent=((string)$child->urlNameCurrent);
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
              //Click Best Doctors Icon
              if ($loginApp->ClickBestDoctorsLink($app1))
              {
                  HtmlReport::SuccessReport("Click Best Doctors Icon","Successfully Clicked Best Doctors Icon");
              }
              else
              {
                  HtmlReport::FailureReport("Click Best Doctors Icon","Failed to Successfully Click Best Doctors Icon",$app1);
                  return;
              }
              //Click Close Button on Popup Box
              if ($loginApp->ClickBestDoctorsLinkClose($app1))
              {
                  HtmlReport::SuccessReport("Click Close Button on Popup Box","Successfully Clicked Close Button on Popup Box");
              }
              else
              {
                  HtmlReport::FailureReport("Click Close Button on Popup Box","Failed to Successfully Click Close Button on Popup Box",$app1);
                  return;
              }
              // Click ASBMT Icon
              if ($loginApp->ClickAsbmtIcon($app1))
              {
                  HtmlReport::SuccessReport("Click ASBMT Icon","Successfully Clicked ASBMT Icon");
              }
              else
              {
                  HtmlReport::FailureReport("Click ASBMT Icon","Failed to Successfully Click ASBMT Icon",$app1);
                  return;
              }
              //Verify ASBMT Icon
              if ($loginApp->VerifyAsbmtIconText($app1))
              {
                  HtmlReport::SuccessReport("Verify ASBMT Icon","Successfully Redirected to Medting LoginPage");
              }
              else
              {
                  HtmlReport::FailureReport("Verify ASBMT Icon","Failed to Successfully Redirect to Medting LoginPage",$app1);
              }
              //Close Application
              $app1->close();

          }
      }
          ,"testClickBestDoctorslink","AccountAccess"
      );
    }
    //Self Register Functionality Regression Test
    public function testSelfRegister()
        {
            HtmlReport::testHeader("AccountAccess","testSelfRegister");
            $this->executeTestCaller(
                function ()
                {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('AccountAccess.xml');
                foreach($dataObject->children() as $child)
                {
                #region Test_Data
                $urlNameCurrent=((string)$child->urlNameCurrent);
                $urlNameCurrentAsbt=((string)$child->urlNameCurrentAsbt);
                $regFirstName1=((string)$child->regFistName);
                $regLastName1=((string)$child->regLastName);
                $regGender1=((string)$child->regGender);
                $regUsername1=((string)$child->regUsername);
                $regPassword1=((string)$child->regPassword);
                $regPasswordConfirmation1=((string)$child->regPasswordConfirmation);
                $messageCongradulations1=((string)$child->messageCongradulations);
                #endregion



                //Launch and Navigate to Medting App
                if ($app1=App::LaunchAndNavigate("chrome",$this->url))
                {
                HtmlReport::SuccessReport("Launch Medting Application","Successfully Launched Medting Application");
                }
                else
                {
                HtmlReport::FailureReport("Launch Medting Application","Failed to Successfully Launch Medting Application",$app1);
                }
                //Click SignUp Button
                if ($loginApp->ClickSignUpButton($app1))
                {
                    HtmlReport::SuccessReport("Click SignUp Button","Successfully Clicked SignUp Button");
                }
                else
                {
                    HtmlReport::FailureReport("Click SignUp Button","Failed to Successfully Click SignUp Button",$app1);
                    return;
                }
                //Enter First Name
                if ($signUpApp->setFirstName($app1, $regFirstName1))
                {
                    HtmlReport::SuccessReport("Registration - Enter First Name","Successfully Entered First Name");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Enter First Name","Failed to Successfully Enter First Name",$app1);
                    return;
                }
                //Enter Last Name
                if ($signUpApp->setLastName($app1, $regLastName1))
                {
                    HtmlReport::SuccessReport("Registration - Enter Last Name","Successfully Entered Last Name");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Enter Last Name","Failed to Successfully Enter Last Name",$app1);
                    return;
                }
                //Choose Gender
                if ($signUpApp->setGender($app1, $regGender1))
                {
                    HtmlReport::SuccessReport("Registration - Choose Gender","Successfully Entered Gender");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Choose Gender","Failed to Successfully Enter Gender",$app1);
                    return;
                }
                //Enter Username
                if ($signUpApp->setEnterUsername($app1, $randomUsername))
                {
                    HtmlReport::SuccessReport("Registration - Enter Username","Successfully Entered Enter Username");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Enter Username","Failed to Successfully Enter Enter Username",$app1);
                    return;
                }
                //Enter Email Address
                if ($signUpApp->setEmailAddress($app1, $randomEmail))
                {
                    HtmlReport::SuccessReport("Registration - Enter Email Address","Successfully Entered Email Address");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Enter Email Address","Failed to Successfully Enter Email Address",$app1);
                    return;
                }
                //Enter Password
                if ($signUpApp->setPassword($app1, $regPassword1))
                {
                    HtmlReport::SuccessReport("Registration - Enter Password","Successfully Entered Password");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Enter Password","Failed to Successfully Enter Password",$app1);
                    return;
                }
                if ($signUpApp->setPasswordConfirmation($app1, $regPasswordConfirmation1))
                {
                    HtmlReport::SuccessReport("Registration - Enter Password Confirmation","Successfully Entered Password Confirmation");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Enter Password Confirmation","Failed to Successfully Enter Password Confirmation",$app1);
                    return;
                }
                //Click Accept Terms & Conditions
                if ($signUpApp->setAcceptTermsandConditions($app1))
                {
                    HtmlReport::SuccessReport("Registration - Accept Terms and Conditions","Successfully Accept Terms and Conditions");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Accept Terms and Conditions","Failed to Accept Terms and Conditions",$app1);
                    return;
                }
                //Click OK Button
                //Click SignUp Button
                if ($signUpApp->ClickSignupButton($app1))
                {
                    HtmlReport::SuccessReport("Registration - Click Signup Button","Successfully Click Signup Button");
                }
                else
                {
                    HtmlReport::FailureReport("Registration - Click Signup Button","Failed to Successfully Click Signup Button",$app1);
                    return;
                }
                //Verify Congratulations Text Message recieved from application
                if ($signUpApp->VerifyUserCreated($app1))
                {
                    HtmlReport::SuccessReport("Verify Congratulations Text Message","Successfully Verified Congratulations Text Message recieved");
                }
                else
                {
                    HtmlReport::FailureReport("Verify Congratulations Text Message","Failed to Successfully Verified Congratulations Text Message recieved",$app1);
                    return;
                }
                //Close Application
                $app1->close();
                //Launch Browser and Navigate to Palma url
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
                //Click on Admin Icon
                if ($dashboardApp->clickAdminButton($app1))
                {
                    HtmlReport::SuccessReport("Click Admin Button","Successfully Clicked Admin Button");
                }
                else
                {
                    HtmlReport::FailureReport("Click Admin Button","Failed to Successfully Clicked Admin Button",$app1);
                    return;
                }
                //Click Users & Groups Icon
                if ($dashboardApp->clickUsersandgroupsButton($app1))
                {
                    HtmlReport::SuccessReport("Click Users and Groups Button","Successfully Clicked Users and Groups Button");
                }
                else
                {
                    HtmlReport::FailureReport("Click Users and Groups Button","Failed to Successfully Clicked Users and Groups Button",$app1);
                    return;
                }
                sleep(10);
                //Click Pending Icon
                if ($dashboardApp->clickPendingCheckbox($app1))
                {
                    HtmlReport::SuccessReport("Click Pending Icon","Successfully Clicked Pending Icon");
                }
                else
                {
                    HtmlReport::FailureReport("Click Pending Icon","Failed to Successfully Click Pending Icon",$app1);
                    return;
                }
                sleep(10);
                //Search Newly Created User
                if ($dashboardApp->setSearchUsername($app1, $randomUsername))
                {
                    HtmlReport::SuccessReport("Search Newly Created User","Successfully Searched Newly Created User");
                }
                else
                {
                    HtmlReport::FailureReport("Search Newly Created User","Failed to Successfully Search Newly Created User",$app1);
                    return;
                }
                //Click Search Button
                if ($dashboardApp->clickSearchButton($app1))
                {
                    HtmlReport::SuccessReport("Click Search Button","Successfully Clicked Search Button");
                }
                else
                {
                    HtmlReport::FailureReport("Click Search Button","Failed to Successfully Click Search Button",$app1);
                    return;
                }
                sleep(15);
                //Click Activate User Icon
                if ($dashboardApp->clickActivateNewUserButton($app1))
                {
                    HtmlReport::SuccessReport("Click Activate User Icon","Successfully Clicked Activate User Icon");
                }
                else
                {
                    HtmlReport::FailureReport("Click Activate User Icon","Failed to Successfully Click Activate User Icon",$app1);
                    return;
                }
                sleep(15);
                //Click on OK button
                if ($dashboardApp->AcceptAlertPopupbox($app1))
                {
                    HtmlReport::SuccessReport("Accept Alert PopUP","Successfully Accept Alert PopUP");
                }
                else
                {
                    HtmlReport::FailureReport("Accept Alert PopUP","Failed to Successfully Accept Alert PopUP",$app1);
                    return;
                }
                //Logout of Application
                if ($dashboardApp->clickLogoutButton($app1))
                {
                    HtmlReport::SuccessReport("Logout of Application","Successfully Logged out of Application");
                }
                else
                {
                    HtmlReport::FailureReport("Logout of Application","Failed to Successfully Log out of Application",$app1);
                    return;
                }
                //Close Application
                $app1->close();
                //Launch Browser and Navigate to Palma url
                if ($app1=App::LaunchAndNavigate("chrome",$this->url))
                {
                    HtmlReport::SuccessReport("Launch Medting Application","Successfully Launched Medting Application");
                }
                else
                {
                    HtmlReport::FailureReport("Launch Medting Application","Failed to Successfully Launch Medting Application",$app1);
                    return;
                }
                //Log into Palma Application with New Credentials
                if ($loginApp->logintoMedting($app1, $randomUsername,$regPassword1))
                {
                    HtmlReport::SuccessReport("Login to Palma App","Successfully Logged into Palma Application");
                }
                else
                {
                    HtmlReport::FailureReport("Login to Palma App","Failed to Login to Palma Application",$app1);
                    return;
                }
                sleep(10);
                //Accept Terms & Conditions
                if ($loginApp->ClickAcceptTermsButton($app1))
                {
                    HtmlReport::SuccessReport("Accept Terms & Conditions","Successfully Accept Terms & Conditions");
                }
                else
                {
                    HtmlReport::FailureReport("Accept Terms & Conditions","Failed to Successfully Accept Terms & Conditions",$app1);
                    return;
                }



               //Click Dismiss Button at Popup Box
                if ($loginApp->ClickdismissPopupBoxButton($app1))
                {
                    HtmlReport::SuccessReport("Click Dismiss Button at Popup Box","Successfully Clicked Dismiss Button at Popup Box");
                }
                else
                {
                    HtmlReport::FailureReport("Click Dismiss Button at Popup Box","Failed to Successfully Click Dismiss Button at Popup Box",$app1);
                    return;
                }
                //Select Check Keep Me Logged In for 30 minutes or more
                //Logout of Application
                if ($loginApp->ClickLogoffApp($app1))
                {
                    HtmlReport::SuccessReport("Logoff Application","Successfully Logged off Application");
                }
                else
                {
                    HtmlReport::FailureReport("Logoff Application","Failed to Successfully Logoff Application",$app1);
                    return;
                }
                //Close Application
                $app1->close();

        HtmlReport::testHeader("AccountAccess","UnsubscribeAccount");
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
                    //Click on Admin Icon
                    if ($dashboardApp->clickAdminButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Admin Button","Successfully Clicked Admin Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Admin Button","Failed to Successfully Clicked Admin Button",$app1);
                        return;
                    }
                    //Click Users & Groups Icon
                    if ($dashboardApp->clickUsersandgroupsButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Users and Groups Button","Successfully Clicked Users and Groups Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Users and Groups Button","Failed to Successfully Clicked Users and Groups Button",$app1);
                        return;
                    }
                    //Search Newly Created User
                    if ($dashboardApp->setSearchUsername($app1, $randomUsername))
                    {
                        HtmlReport::SuccessReport("Search Newly Created User","Successfully Searched Newly Created User");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Search Newly Created User","Failed to Successfully Search Newly Created User",$app1);
                        return;
                    }
                    //Click Search Button
                    if ($dashboardApp->clickSearchButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Search Button","Successfully Clicked Search Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Search Button","Failed to Successfully Click Search Button",$app1);
                        return;
                    }
                    //Click Edit Button
                    if ($dashboardApp->clickEditButtonIcon($app1))
                    {
                        HtmlReport::SuccessReport("Click Edit Button","Successfully Clicked Edit Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Edit Button","Failed to Successfully Click Edit Button",$app1);
                        return;
                    }
                    //Change Notifications to Unsubscribe
                    if ($dashboardApp->clickUnsubscribeRadioButton($app1))
                    {
                        HtmlReport::SuccessReport("Change Notifications to Unsubscribe","Successfully Change Notifications to Unsubscribe");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Change Notifications to Unsubscribe","Failed to Successfully Change Notifications to Unsubscribe",$app1);
                        return;
                    }
                    //Click Save Button
                    if ($dashboardApp->clickUserGroupSaveNotifyButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Save Button","Successfully Clicked Save Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Save Button","Failed to Successfully Click Save Button",$app1);
                        return;
                    }
                    //Search for User-->Contact User
                    //Click Edit Button
                    if ($dashboardApp->clickEditButtonIcon($app1))
                    {
                        HtmlReport::SuccessReport("Click Edit Button","Successfully Clicked Edit Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Edit Button","Failed to Successfully Click Edit Button",$app1);
                        return;
                    }
                    //Verify User is Unsubscribed in profile
                    if ($dashboardApp->VerifyUnsubscribeButtonValueTrue($app1))
                    {
                        HtmlReport::SuccessReport("Verify User is Unsubscribed in profile","Successfully Verified User is Unsubscribed in profile");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify User is Unsubscribed in profile","Failed to Successfully Verify User is Unsubscribed in profile",$app1);
                        return;
                    }
                    //Delete User
                    if ($dashboardApp->DeleteUserIconButton($app1))
                    {
                        HtmlReport::SuccessReport("Delete User","Successfully Deleted User");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Delete User","Failed to Successfully Delete User",$app1);
                        return;
                    }
                    //Click on OK button
                    if ($dashboardApp->AcceptAlertPopupbox($app1))
                    {
                        HtmlReport::SuccessReport("Accept Alert PopUP","Successfully Accept Alert PopUP");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Accept Alert PopUP","Failed to Successfully Accept Alert PopUP",$app1);
                        return;
                    }
                    //Logout of Application
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->clickSignOutButtonAsmbt($app1);
                    $loginApp->clickSignOutButtonAsmbt($app1);
                    sleep(10);
                    //Close Application
                    $app1->close();
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
                    //Log into Palma Application with Deleted User Credentials
                    if ($loginApp->logintoMedting($app1, $randomUsername,$regPassword1))
                    {
                        HtmlReport::SuccessReport("Log into Application Using Deleted Account","Successfully failed to log into app with deleted account");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Log into Application Using Deleted Account","Was able to log into app using deleted account",$app1);
                    }
                    //Verify Not able to log in
                    if ($loginApp->SignUpLoaderText($app1))
                    {
                        HtmlReport::SuccessReport("Verify Deleted User Not Able to Login","Successfully Verify Deleted User Not Able to Login");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Deleted User Not Able to Login","Failed to Successfully Verify Deleted User Not Able to Login",$app1);
                    }
                    //Close Application
                    $app1->close();

            }
               }
            ,"testSelfRegister","AccountAccess"
        );
    }

    //Forgot Login Credentials Functionality Regression Test
    public function testForgotLoginCredentials()
    {
        HtmlReport::testHeader("AccountAccess","testForgotLoginCredentials");
        $this->executeTestCaller(
            function ()
            {
                $loginApp=LoginPage::setInstance();
                $signUpApp=SignUpPage::setInstance();
                $dashboardApp=DashboardPage::setInstance();
                $helperApp=Helper::RetrieveForgotPasswordWordLinkFromGmail();
                //Randomly generates email addresses
                $randomEmail=Helper::getRandomEmail();
                //Randomly generates usernames
                $randomUsername=Helper::getRandomUsername();
                //Retrieves Forgot Password Link from Google
                $forgotPasswordEmailLink =  Helper::RetrieveForgotPasswordWordLinkFromGmail();
                //read the Test Data for the Test Case
                $dataObject=$this->ReadDataFromXml('AccountAccess.xml');
                foreach($dataObject->children() as $child)
                {
                    #region Test_Data
                    $urlNameCurrent=((string)$child->urlNameCurrent);
                    $urlNameCurrentAsbt=((string)$child->urlNameCurrentAsbt);
                    $regFirstName1=((string)$child->regFistName);
                    $regLastName1=((string)$child->regLastName);
                    $regGender1=((string)$child->regGender);
                    $regUseasbmt=((string)$child->regUseasbmt);
                    $regpasswordasbmt=((string)$child->regpasswordasbmt);
                    $regUsername1=((string)$child->regUsername);
                    $regPassword1=((string)$child->regPassword);
                    $emailAddressExistingUser1=((string)$child->emailAddressExistingUser);
                    $regPasswordConfirmation1=((string)$child->regPasswordConfirmation);
                    $messageCongradulations1=((string)$child->messageCongradulations);
                    #endregion

                    //Launch and Navigate to Medting App
                    if ($app1=App::LaunchAndNavigate("chrome",$this->url))
                    {
                        HtmlReport::SuccessReport("Launch Medting Application","Successfully Launched Medting Application");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Launch Medting Application","Failed to Successfully Launch Medting Application",$app1);
                    }
                    //Log Into Existing Account (qaautomationmedting  / !Aug2014
                    if ($loginApp->logintoMedting($app1, $regUseasbmt, $regpasswordasbmt))
                    {
                        HtmlReport::SuccessReport("Login to Palma App With Existing Account Credentials","Successfully Login using Existing Credentials");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Login to Palma App With Existing Account Credentials","Failed to Successfully Login using Existing Credentials",$app1);
                        return;
                    }
                    //Logout of Account
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->clickSignOutButtonAsmbt($app1);
                    $loginApp->clickSignOutButtonAsmbt($app1);
                    sleep(10);
                    //Click Forgot Username Button
                    if ($loginApp->ClickForgotUserName($app1))
                    {
                        HtmlReport::SuccessReport("Click Forgot Username Button","Successfully Clicked Forgot Username Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Forgot Username Button","Failed to Successfully Click Forgot Username Button",$app1);
                        return;
                    }
                    //Enter Email Address then click Send Button
                    if ($loginApp->ClickEmailAddressSendButton($app1, $emailAddressExistingUser1))
                    {
                        HtmlReport::SuccessReport("Enter Email Address then click Send Button","Successfully Enter Email Address then clicked Send Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Email Address then click Send Button","Failed to Successfully Enter Email Address then click Send Button",$app1);
                        return;
                    }
                    sleep(15);
                    //Click Back to SignIn Button
                    if ($loginApp->ClickSignInButton($app1))
                    {
                        HtmlReport::SuccessReport("Click Back to SignIn Button","Successfully Click Back to SignIn Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click Back to SignIn Button","Failed to Successfully Click Back to SignIn Button",$app1);
                        return;
                    }
                    //Login via Username
                    //Log Into Existing Account
                    if ($loginApp->logintoMedting($app1, $regUseasbmt, $regpasswordasbmt))
                    {
                        HtmlReport::SuccessReport("Login to Palma App With Existing Account Credentials","Successfully Logged into Palma Application With Existing Account");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Login to Palma App With Existing Account","Failed to Login to Palma Application With Existing Account",$app1);
                        return;
                    }
                    //Logout of Application
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->ClickprofileTextBox($app1);
                    $loginApp->clickSignOutButtonAsmbt($app1);
                    $loginApp->clickSignOutButtonAsmbt($app1);
                    sleep(20);
                    if ($loginApp->ClickForgotPassworde($app1))
                    {
                        HtmlReport::SuccessReport("Click SignIn and Then Forgot Your Pasword Button","Successfully Clicked SignIn and Then Forgot Your Pasword Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Click SignIn and Then Forgot Your Pasword Button","Failed to Successfully Click SignIn and Then Forgot Your Pasword Button",$app1);
                        return;
                    }
                    //Enter Email Address then click Send Button
                    if ($loginApp->ClickEmailAddressSendButton($app1, $emailAddressExistingUser1))
                    {
                        HtmlReport::SuccessReport("Enter Email Address then click Send Button","Successfully Entered Email Address then click Send Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Enter Email Address then click Send Button","Failed to Successfully Enter Email Address then click Send Button",$app1);
                        return;
                    }
                    //Retrieve Email Link from Email Generated
                    if ($helperApp->RetrieveEmailFromGoogleAccount($app1, $forgotPasswordEmailLink))
                    {
                        HtmlReport::SuccessReport("Retrieve Email Link from Email Generated","Successfully Retrieve Email Link from Email Generated");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Retrieve Email Link from Email Generated","Failed to Successfully Retrieve Email Link from Email Generated",$app1);
                        return;
                    }
                    //Close Application
                    sleep(20);
                    $app1->close();
                    //Launch Application with url retrieved from Email
                    if ($app1=App::LaunchAndNavigate("chrome",$forgotPasswordEmailLink))
                    {
                        HtmlReport::SuccessReport("Launch Application with url retrieved from Email","Successfully Launch Application with url retrieved from Email");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Launch Application with url retrieved from Email","Failed to Successfully Launch Application with url retrieved from Email",$app1);
                        return;
                    }
                    //Enter New Password and Click Send Button
                    if ($loginApp->ResetPasswordSend($app1, "Welcome1", "Welcome1"))
                    {
                        HtmlReport::SuccessReport("Enter New Password and Click Send Button","Successfully nter New Password and Click Send Button");
                    }
                    else
                    {
                        HtmlReport::FailureReport("nter New Password and Click Send Button","Failed to Successfully Enter New Password and Click Send Button",$app1);
                        return;
                    }
                    //Log in With New Password from above
                    //Select Keep Me Logged In checkbox
                    if ($loginApp->logintoMedtingKeepMeLogedIn($app1, $regUseasbmt, "Welcome1"))
                    {
                        HtmlReport::SuccessReport("Log into App with New Password and Keep Me Logged In","Successfully Logged into App with New Password and Keep Me Logged In");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Log into App with New Password and Keep Me Logged In","Failed to Successfully Log into App with New Password and Keep Me Logged In",$app1);
                        return;
                    }
                    //While Logged into Application, then Kill Browser
                    //Close Application
                    sleep(20);
                    $app1->close();
                    //Introduce Url in Browser againqaautomationmedting
                    //Launch and Navigate to Medting App
                    if ($app1=App::LaunchAndNavigate("chrome","http://asbmt.qa.medting.com/login/"))
                    {
                        HtmlReport::SuccessReport("Launch Browser and Navigate to Medting App","Launched Browser and Navigate to Medting App");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Launch Browser and Navigate to Medting App","Failed to Successfully Launch Browser and Navigate to Medting App",$app1);
                        return;
                    }
                    sleep (5);
                    //Verify that you go directly to Dashboard
                    if ($dashboardApp->VerifyDashboard($app1))
                    {
                        HtmlReport::SuccessReport("Verify Dashboard","Successfully Verified Dashboard");
                    }
                    else
                    {
                        HtmlReport::FailureReport("Verify Dashboard","Failed to Successfully Verify Dashboard",$app1);
                        return;
                    }
                    //Close Application
                    $app1->close();





                }
            }
            ,"testForgotLoginCredentials","AccountAccess"
        );
    }

}




 