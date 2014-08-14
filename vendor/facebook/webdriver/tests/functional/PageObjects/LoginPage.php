<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/16/14
 * Time: 7:23 PM
 */
//namespace PageObjects;

require_once __DIR__.'/BasePage.php';

class LoginPage extends BasePage
{

    private static $pageInstance;
    public static function setInstance()
    {
        if(self::$pageInstance==null)
        {
            self::$pageInstance=new LoginPage();
        }
        return self::$pageInstance;
    }

    /**
     * @notes Sets the User Name in the User name field
     */
    private function setUserName(WebDriver $driver,$username)
    {
        return $this->SendKeysToElement($driver,WebDriverBy::id(self::$userNameTextBoxId),$username);
    }
    /**
     * @notes Sets the Password in the Password field
     */
    private function setPassword(WebDriver $driver,$password)
    {
        return $this->SendKeysToElement($driver,WebDriverBy::id(self::$passwordTextBoxId),$password);
    }
    /**
     * @notes Clicks on Sign In button
     */
    private function clickSignIn(WebDriver $driver)
    {
       return $this->ClickElement($driver,WebDriverBy::id(self::$signInButtonId));
    }

    /**
     * @notes Logs in to Medting Application
     */
    public function logintoMedting(WebDriver $driver,$username,$password)
    {
        return $this->setUserName($driver,$username)&&
        $this->setPassword($driver,$password)&&
        $this->clickSignIn($driver);
    }

    public function ClickBestDoctorsLink(RemoteWebDriver $driver)
    {
       return $this->ClickElement($driver,WebDriverBy::cssSelector(self::$bestDoctorsHyperLinkCss));
    }

    public function ClickBestDoctorsLinkClose(RemoteWebDriver $driver)
    {
        $driver->switchTo()->window($driver->getWindowHandles()[1]);
        $title=$driver->getTitle();
        $clicked=$this->ClickElement($driver,WebDriverBy::xpath(self::$bestDoctorsPopupCloseXpath));
        $driver->close("Best Doctors");
        return $clicked;
        //$driver->closeWindow("Best Doctors");

    }

    public function ClickAsbmtIcon(RemoteWebDriver $driver)
    {
        $driver->switchTo()->window($driver->getWindowHandles()[0]);
        $title=$driver->getTitle();
        return $this->ClickElement($driver,WebDriverBy::cssSelector(self::$AsbmtLogoLinkCss));

    }

    public function VerifyAsbmtIconText(RemoteWebDriver $driver)
    {
        $urlName = $driver->getCurrentURL();
        $urlNameCurrent='http://asbmt.qa.medting.com/login/';
        $myValue = strcmp($urlNameCurrent,$urlName);
        if ($myValue==0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function VerifyAsbmtIconUrl(RemoteWebDriver $driver, $urlName)
    {
        try
        {
        $currenturl = $driver->getCurrentURL();
        $vaa=stripos($currenturl, $urlName );

        if($vaa===false)
        {
            return false;
        }
        else //if($vaa==0)
        {
            return true;
        }

        }
        catch(Exception $ex)
        {
            return false;
        }
    }
    public function ClickSelectAGroup(RemoteWebDriver $driver)
    {
        //$myValue = $this->GetInnerTextOfElement($driver, WebDriverBy::id(self::$selectaGroupListBoxId));
        $this->ClickElement($driver, WebDriverBy::id(self::$selectaGroupListBoxId));
    }
    public function clickSignOutButtonAsmbt(RemoteWebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::id(self::$selectaSignOutButtonId));
    }

    public function ClickSignUpButton(RemoteWebDriver $driver)
    {
        $clicked= $this->ClickElement($driver,WebDriverBy::cssSelector(self::$ClickSignUpButtonCss));
        //$this->waitForControlStyleBecomesDisplayed(WebDriverBy::id(self::$signUpDivId),$driver);
        return $clicked;
    }
    public function ClickdismissPopupBoxButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$dismissPopUpBoxId));
    }
    public function ClickprofileTextBox(RemoteWebDriver $driver)
    {
        //$myValue = $this->GetInnerTextOfElement($driver, WebDriverBy::cssSelector(self::$profileCss));

        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$profileCss));
    }
    public function ClickLogoutButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::Xpath(self::$logoutButtonXpath));
    }
    public function ClickLogoutButtonPP(RemoteWebDriver $driver)
    {
        return $this->GetElement($driver, WebDriverBy::id(self::$logoutButtonPPId));
    }

    public function ClickLogoffApp(RemoteWebDriver $driver)
    {
        return $this->ClickprofileTextBox($driver)&&
        sleep(1) &&
        $this->ClickLogoutButtonPP($driver);
    }

    public function myGroupsSelectGroup(RemoteWebDriver $driver)
    {
        return $this->ClickprofileTextBox($driver)&&
        sleep(1) &&
        $this->ClickSelectAGroup($driver);
    }

    public function ClickForgotUserName(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$clickForgotYourUsernameIconId));
    }
    public function SignUpLoaderText(RemoteWebDriver $driver)
    {
        $myText = $driver->getCurrentURL();
        $messageSignInPage='http://asbmt.qa.medting.com/login/';
        $myValue = strcmp($messageSignInPage,$myText);
        if ($myValue==0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function SendEmailAddressButton(RemoteWebDriver $driver, $EmailAddr)
    {
    $this->ClickElement($driver,WebDriverBy::id(self::$sendemailaddressId));
        sleep(2);
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$sendemailaddressId),$EmailAddr);
    }
    public function ClickSendEmailButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$ClickSendButtonEmailId));
    }
    public function ClickAcceptTermsButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$ClickAcceptTermsCss));
    }

    public function ClickEmailAddressSendButton(RemoteWebDriver $driver,$EmailAddr )
    {
        return $this->SendEmailAddressButton($driver,$EmailAddr)&&
        $this->ClickSendEmailButton($driver);
    }

    public function ClickSignInButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$ClickSignInButtonId));
    }

    public function ClickForgotPassworde(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$clickForgotYourPasswordId));
    }

    public function EnterPassword2(RemoteWebDriver $driver, $password2)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$enterPassword2Id),$password2);
    }

    public function EnterRepeatPassword(RemoteWebDriver $driver, $resetpassword2)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$enterRepeatPasswordId),$resetpassword2);
    }

    public function ClickResetPasswordSendButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$resetPasswordSendButtonId));
    }

    public function ResetPasswordSend(WebDriver $driver,$password2,$resetpassword2)
    {
        return $this->EnterPassword2($driver,$password2)&&
        $this->EnterRepeatPassword($driver,$resetpassword2)&&
        $this->ClickResetPasswordSendButton($driver);
    }

    public function ClickKeepmeloggedinIcon(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$keepmeloggedinId));
    }

    public function logintoMedtingKeepMeLogedIn(WebDriver $driver, $username, $password)
    {
        return $this->setUserName($driver,$username)&&
        $this->setPassword($driver,$password)&&
        $this->ClickKeepmeloggedinIcon($driver)&&
        $this->clickSignIn($driver);
    }

    public function ClickdismissPopupBoxButton1(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$ClickdismissPopupBox));
    }
    public function VerifyDeleteCaseIcon(WebDriver $driver)
    {
       sleep(17);
       $myValue = $this->GetElement($driver, WebDriverBy::cssSelector(self::$deleteCaseIconCss));
       if (isset($myValue))
       {
           return true;
       }
        else
        {
            return false;
        }


    }
    public function VerifyMakeItPrivateIcon(WebDriver $driver)
    {
        $myValue = $this->GetElement($driver, WebDriverBy::cssSelector(self::$makeitPrivateIconCss));
        if (isset($myValue))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public function VerifyEditCaseIcon(WebDriver $driver)
    {
        $myValue = $this->GetElement($driver, WebDriverBy::cssSelector(self::$editCaseIconCss));
        if (isset($myValue))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function VerifyCollaboratorsMap(WebDriver $driver)
    {
        $myValue = $this->GetElement($driver, WebDriverBy::cssSelector(self::$collaboratorsMapCss));
        if (isset($myValue))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function ClickEditIconButton(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$editCaseIconCss));
    }
    public function ClickUsefullLinkGoogleLink(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$googleLinkCss));
        sleep(12);
        $driver->switchTo()->window($driver->getWindowHandles()[1]);
        $title=$driver->getTitle();
        return $driver->close($title);

    }
    public function ClickUsefullLinkTestLinkJP2(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$testLinkJP2Css));
        sleep(12);
        $title=$driver->getTitle();
        $clicked=$this->ClickElement($driver,WebDriverBy::xpath(self::$bestDoctorsPopupCloseXpath));
        $driver->close("Best Doctors");
        return $clicked;
    }
    public function ClickUsefullLinkIfeelLuckyNot(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$feelLuckyNotCss));
        sleep(12);
        $driver->switchTo()->window($driver->getWindowHandles()[1]);
        $title=$driver->getTitle();
        return $driver->close($title);
    }
    public function ClickUsefullLinkBestDocWebsite(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$bestdocCss));
        sleep(12);
        $driver->switchTo()->window($driver->getWindowHandles()[1]);
        $title=$driver->getTitle();
        return $driver->close($title);
    }
    public function ClickUsefullLinkUsefull(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$userfulLinkCss));
        sleep(12);
        $driver->switchTo()->window($driver->getWindowHandles()[1]);
        $title=$driver->getTitle();
        return $driver->close($title);
    }
    public function ClickTranslateCaseTo(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::id(self::$translateCaseToId));
        sleep(1);
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$chooseLanguageCss));
    }


    private static $userNameTextBoxId='txtSignInUsername';
    private static $passwordTextBoxId='txtSignInPassword';
    private static $signInButtonId='btnSubmitSignIn';
    private static $bestDoctorsHyperLinkCss='#loginFooter > a';
    private static $bestDoctorsPopupCloseXpath='//*[@id="body"]/div[2]/div/div[1]/div/button';
    private static $AsbmtLogoLinkCss='#aLogo > img';
    private static $ClickSignUpButtonCss='#btnSignUpLoader';
    private static $signUpDivId='divSignUp';
    private static $dismissPopUpBoxId='btnDimiss';
    private static $ClickAcceptTermsCss='#btnAcceptTerms';
    private static $profileCss='#btnProfile';
    private static $logoutButtonXpath='//*[@id="btnSignOut"]';
    private static $clickForgotYourUsernameIconId='btnUsernameReminder';
    private static $clickSignUpLoaderTextId='signUpLoader';
    private static $clickForgotYourPasswordId='btnPasswordReminder';
    private static $sendemailaddressId='txtEmail';
    private static $ClickSendButtonEmailId='btnReminder';
    private static $ClickSignInButtonId='btnBackToSignIn';
    private static $enterPassword2Id='txtPassword2';
    private static $enterRepeatPasswordId='txtRepeatPassword';
    private static $resetPasswordSendButtonId='btnResetPassword';
    private static $keepmeloggedinId='signInRemember';
    private static $logoutButtonPPId='//*[@id="btnSignOut"]';
    private static $ClickdismissPopupBox='divMyMedtingWrapper';
    private static $dennisXpath='//*[@id="ulProfileMenu"]/li[1]/span/text()';
    private static $deleteCaseIconCss='#tableMyCases > tbody > tr:nth-child(1) > td.last.center > a.btnDelete > img';
    private static $makeitPrivateIconCss='#tableMyCases > tbody > tr:nth-child(1) > td.last.center > a.btnPrivate';
    private static $editCaseIconCss='#tableMyCases > tbody > tr:nth-child(1) > td.last.center > a.btnEdit';
    private static $collaboratorsMapCss='#divCollaboratorsMapModule > div';
    private static $googleLinkCss='#divUsefulLinks > ul > li:nth-child(1) > a';
    private static $testLinkJP2Css='#divUsefulLinks > ul > li:nth-child(2) > a';
    private static $feelLuckyNotCss='#divUsefulLinks > ul > li:nth-child(3) > a';
    private static $bestdocCss='#divUsefulLinks > ul > li:nth-child(4) > a';
    private static $userfulLinkCss='#divUsefulLinks > ul > li:nth-child(5) > a';
    private static $translateCaseToId='btnTranslate';
    private static $chooseLanguageCss='#ulTranslateLanguages > li:nth-child(5) > a';
    private static $selectaGroupListBoxId='btnProfileMenuGroups';
    private static $selectaSignOutButtonId='btnSignOut';




}
