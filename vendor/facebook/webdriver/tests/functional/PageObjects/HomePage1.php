<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/16/14
 * Time: 7:23 PM
 */

require_once __DIR__.'/BasePage.php';

class HomePage1 extends BasePage
{
   private static $pageInstance;

   public static function setInstance()
   {
       if(self::$pageInstance==null)
       {
           self::$pageInstance=new HomePage1();
       }
       return self::$pageInstance;
   }


    public function clickAddNewLinkInMyMedia(WebDriver $driver)
    {
        $this->waitForElementPresent(WebDriverBy::cssSelector(self::$AddNewMyMediaLinkCSSPath),$driver);
        $addNewMyMediaLink= $driver->findElement(WebDriverBy::cssSelector(self::$AddNewMyMediaLinkCSSPath));
        $addNewMyMediaLink->click();
    }

    public function sendFileToInput(WebDriver $driver,$autoITCmd)
    {
        #region Code For Uploading the Multiple files at a time
        $this->waitForElementPresent(WebDriverBy::xPath(self::$AddFilesButton),$driver);
        $addFilesButton= $driver->findElement(WebDriverBy::xPath(self::$AddFilesButton));
        $addFilesButton->click();
        // Now Call the AUto IT Script if it is a windows environment
        exec($autoITCmd);
        #endregion

    }

    public function RegressionTemplate20140811(WebDriver $driver)
    {
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$template20140811Css));
    }


    private static $AddNewMyMediaLinkCSSPath='#divDefaultModulesPadd > div:nth-child(2) > span > a';
    private static $AddFileInputControl='//div[@id="divMediaUploader_buttons"]/div/input';
    private static $AddFilesButton='//a[@id="divMediaUploader_browse"]/span[2]';
    private static $template20140811Css='#divGroupTree > ol > li:nth-child(1) > div > a.txtGoodLink.goodLink';
}
?>