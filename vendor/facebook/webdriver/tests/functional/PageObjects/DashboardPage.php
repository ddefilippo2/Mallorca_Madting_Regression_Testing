<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/17/14
 * Time: 12:33 PM
 */

require_once __DIR__.'/BasePage.php';

class DashboardPage extends BasePage
{
    private static $dashBoardpageInstance;
    public function setInstance()
    {
        if(self::$dashBoardpageInstance==null)
        {
            self::$dashBoardpageInstance=new DashboardPage();
        }
        return self::$dashBoardpageInstance;
    }

    /**
     * @notes Clicks Multi Media Link
     */
    public function clickMultiMedialink(WebDriver $driver)
    {
        $this->waitForElementPresent(WebDriverBy::xpath(self::$MultimediaXPath),$driver);
        $multiMediaLink=$driver->findElement(WebDriverBy::xpath(self::$MultimediaXPath));
        $multiMediaLink->click();
    }

   /* /**
     * @notes clicks Case link
     */
    public function clickCasesLink(WebDriver $driver)
    {
        $this->waitForElementPresent(WebDriverBy::xPath(self::$CasesLinkXPath),$driver);
        $casesLink=$driver->findElement(WebDriverBy::xPath(self::$CasesLinkXPath));
        $casesLink->click();
    }

    /**
     * @notes clicks Home Page link
     */
    public function clickHomePageLink(WebDriver $driver)
    {
        /*$this->waitForElementPresent(WebDriverBy::xPath(self::$HomePageLinkXPath),$driver);
        $homePageLink=$driver->findElement(WebDriverBy::xPath(self::$HomePageLinkXPath));
        $homePageLink->click();*/
        return $this->ClickElement($driver,WebDriverBy::xpath(self::$HomePageLinkXPath));
    }
    public function clickAdminButton(WebDriver $driver)
    {
        return $this->ClickElement($driver,WebDriverBy::cssSelector(self::$AdminButtonCss));
    }
    public function clickUsersandgroupsButton(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$UsersandGroupsId));
    }
    public function setSearchUsername(WebDriver $driver, $newuser )
    {
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$searchUserNameId),$newuser);
    }
    public function clickSearchButton(WebDriver $driver)
    {
        sleep(5);
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$searchButtonXpath));
    }
    public function clickPendingCheckbox(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$pendingCheckboxClickId));
    }
    public function clickActivateNewUserButton(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$activateUserButtonCss));
    }
    public function clickEditButtonIcon(WebDriver $driver)
    {
        sleep(7);
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$clickEditButtonCss));
    }
    public function clickLogoutButton(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$logoutButtonId));
    }
    public function clickUnsubscribeRadioButton(WebDriver $driver)
    {
        sleep(10);
        return $this->ClickElement($driver,WebDriverBy::id(self::$clickUnsubscriberadiobuttonId));
    }
    public function clickUserGroupSaveNotifyButton(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$clickSaveNotifyButtonUsersGroupId));
    }
    public function VerifyUnsubscribeButtonValueTrue(WebDriver $driver)
    {
        $myValue=$this->GetElement($driver, WebDriverBy::id(self::$clickUnsubscriberadiobuttonId));

        if (isset($myValue)) {
            return true;
        } else {
            return false;
        }
    }
    public function DeleteUserIconButton(WebDriver $driver)
    {
        return $this->ClickElement($driver,WebDriverBy::xpath(self::$clickDeleteUserIconXpath));
    }
    public function CreateaCaseButton(WebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$CreateaCaseId));
    }
    public function AcceptAlertPopupbox(RemoteWebDriver $driver)
    {
        sleep(2);
        return $this->AcceptAlert($driver);
    }
    public function VerifyDashboard(WebDriver $driver)
    {
        $myText = $driver->getCurrentURL();
        $VerifyDashboardUrl='http://palma.medting.com/user/qaautomationmedting/dashboard/';
        $myValue = strcmp($VerifyDashboardUrl,$myText);
        if ($myValue==0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function ClickCreateCaseInGroup(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver,WebDriverBy::cssSelector(self::$createCaseInGroupButtonCss));
    }
    public function ClickChooseLatestGroup(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver,WebDriverBy::cssSelector(self::$ChooseLatestGroupCss));
    }
    public function ClickCreateNewCaseInGroupButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver,WebDriverBy::id(self::$CreateNewCaseInGroupButtonId));
    }
    public function ClickRegressionFormForCaseWithGroup(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$createFormWiithGroupCss));
    }
    public function ClickCreateNewCaseWithoutGroupButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$CreateNewCaseWithoutGroupButtonCss));
    }
    public function ClickRegressionTemplatesForCaseWithGroup(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$createTemplatesWiithGroupCss));
    }





    private static $MultimediaXPath='//*[@id="liMultimedia"]/a';
    private static $CasesLinkXPath='//*[@id="liCases"]/a';
    private static $HomePageLinkXPath='//*[@id="liHome"]/a';
    private static $AdminButtonCss='#divCaseSub > span > a > img';
    private static $UsersandGroupsId='liBtUsersAndGroups';
    private static $searchUserNameId='txtSearchUser';
    private static $searchButtonXpath='#spanFilterUser > div > span.btnSearch.btn > span';
    private static $pendingCheckboxClickId='cbxShowPending';
    private static $activateUserButtonCss='#tableMyCases > tbody > tr > td.actions > ul > li:nth-child(3) > a';
    private static $logoutButtonId='btnSignOut';
    private static $clickEditButtonCss='#tableMyCases > tbody > tr > td.actions > ul > li:nth-child(1) > a';
    private static $clickUnsubscriberadiobuttonId='rdbUnsubscribe';
    private static $clickSaveNotifyButtonUsersGroupId='btnSaveAndNotify';
    private static $clickDeleteUserIconXpath='//*[@id="tableMyCases"]/tbody/tr/td[7]/ul/li[2]/a';
    private static $VerifyDashboardTextId='divMyMedtingWrapper';
    private static $createCaseInGroupButtonCss='#ulTNS > li:nth-child(3) > a';
    private static $ChooseLatestGroupCss='#divGroupHierarchyWrapper > ol > li:nth-child(1) > div > div > a:nth-child(2)';
    private static $CreateNewCaseInGroupButtonId='btnCreateCase';
    private static $CreateaCaseId='btnCreateNewCaseBar';
    private static $createFormWiithGroupCss='#viewAdminDashboard > div.divMedtingDialog > div > ol > li.member.liGroupLevel_0.GroupId_350.even > a';
    private static $CreateNewCaseWithoutGroupButtonCss='#createCaseLink';
    private static $createTemplatesWiithGroupCss='#viewAdminDashboard > div.divMedtingDialog > div > ol > li.member.liGroupLevel_0.GroupId_319.odd > a';




} 