<?php
/**
 * Created by PhpStorm.
 * User: DDeFilippo
 * Date: 7/30/14
 * Time: 3:19 PM
 */
//namespace PageObjects;

require_once __DIR__.'/BasePage.php';

class SignUpPage extends BasePage
{
    private static $pageInstance;
    public static function setInstance()
    {
        if(self::$pageInstance==null)
        {
            self::$pageInstance=new SignUpPage();
        }
        return self::$pageInstance;
    }



    public function setFirstName(RemoteWebDriver $driver,$regFirstName)
    {
        $this->ClickElement($driver,WebDriverBy::id(self::$firstNameTextBoxId));
        return $this->SendKeysToElement($driver,WebDriverBy::id(self::$firstNameTextBoxId),$regFirstName);
    }
    public function setLastName(RemoteWebDriver $driver,$regLastName)
    {
        return $this->SendKeysToElement($driver,WebDriverBy::Xpath(self::$lastNameTextBoxIdXpath),$regLastName);
    }
    public function setGender(RemoteWebDriver $driver,$regGender)
    {
        return $this->ClickElement($driver,WebDriverBy::Xpath(self::$genderRadioButtonXpath),$regGender);
    }
    public function setEnterUsername(RemoteWebDriver $driver,$randomUsername)
    {
        return $this->SendKeysToElement($driver,WebDriverBy::Xpath(self::$usernameTextBoxIdXpath),$randomUsername);
    }
    public function setEmailAddress(RemoteWebDriver $driver,$randomEmail)
    {
        return $this->SendKeysToElement($driver,WebDriverBy::Xpath(self::$emailAddressTextBoxIdXpath),$randomEmail);
    }
    public function setPassword(RemoteWebDriver $driver,$regEnterPassword)
    {
        return $this->SendKeysToElement($driver,WebDriverBy::id(self::$passwordTextBoxId),$regEnterPassword);
    }
    public function setAcceptTermsandConditions(RemoteWebDriver $driver)
    {
        sleep(3);
        return $this->ClickElement($driver,WebDriverBy::id(self::$termsConditionsCheckboxId));
    }
    public function ClickSignupButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver,WebDriverBy::Xpath(self::$signupButtonIdXpath));
    }
    public function setPasswordConfirmation(RemoteWebDriver $driver,$regEnterPasswordConfirmation)
    {
        sleep(1);
        $this->ClickElement($driver,WebDriverBy::id(self::$passwordConfirmationTextBoxId));
        return $this->SendKeysToElement($driver,WebDriverBy::id(self::$passwordConfirmationTextBoxId),$regEnterPasswordConfirmation);
    }
    public function VerifyUserCreated(RemoteWebDriver $driver)
    {

        sleep(5);
        $myText = $this->GetInnerTextOfElement($driver, WebDriverBy::id(self::$verifyCongradulationsMessageDisplays));
        $myText = str_replace("\n", "", $myText);
        $messageCongradulations='CongratulationsYour account has been created successfully.An admin will activate your account as soon as possible.';
        $myValue = strcmp($messageCongradulations,$myText);
        if ($myValue==0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }




    private static $firstNameTextBoxId='txtFirstname';
    private static $lastNameTextBoxIdXpath='//*[@id="txtLastname"]';
    private static $genderRadioButtonXpath='//*[@id="rdbGenderMale"]';
    private static $usernameTextBoxIdXpath='//*[@id="txtSignUpUsername"]';
    private static $emailAddressTextBoxIdXpath='//*[@id="txtEmail"]';
    private static $passwordTextBoxId='txtSignUpPassword';
    private static $passwordConfirmationTextBoxId='txtSignUpPassword2';
    private static $termsConditionsCheckboxId='cbxTerms';
    private static $signupButtonIdXpath='//*[@id="btnSubmitSignUp"]';
    private static $verifyCongradulationsMessageDisplays='divCongrats';

} 