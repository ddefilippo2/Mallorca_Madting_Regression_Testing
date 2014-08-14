<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/17/14
 * Time: 12:33 PM
 */

require_once __DIR__.'/BasePage.php';

class NewCasePage extends BasePage
{
    private static $newCasepageInstance;
    public function setInstance()
    {
        if(self::$newCasepageInstance==null)
        {
            self::$newCasepageInstance=new NewCasePage();
        }
        return self::$newCasepageInstance;
    }

    public function ClickNewCaseEnterCaseName(RemoteWebDriver $driver, $editTextBox)
    {
        $this->ClickElement($driver, WebDriverBy::id(self::$NewCaseEnterCaseNameId));
        return $this->SendKeysToElement($driver,WebDriverBy::id(self::$NewCaseEnterCaseNameId), $editTextBox);
    }





    public function EnterTextTinyMceA(RemoteWebDriver $driver, $enterTextTextBoxA)
    {
        $driver->switchTo()->frame("txtField_209_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$TinyMceText1Css));
        $this->SendKeysToElement($driver, WebDriverBy::cssSelector(self::$TinyMceText1Css),$enterTextTextBoxA);
        return $driver->switchTo()->defaultContent();
    }
    public function EnterTextTinyMceB(RemoteWebDriver $driver, $enterTextTextBoxB)
    {
        $driver->switchTo()->frame("txtField_210_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$TinyMceText2Css));
        $this->SendKeysToElement($driver, WebDriverBy::cssSelector(self::$TinyMceText2Css),$enterTextTextBoxB);
        return $driver->switchTo()->defaultContent();
    }
    public function EnterTextTinyMceC(RemoteWebDriver $driver, $enterTextTextBoxA)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$TinyMceText1Css));
        $this->SendKeysToElement($driver, WebDriverBy::cssSelector(self::$TinyMceText1Css),$enterTextTextBoxA);
        return $driver->switchTo()->defaultContent();
    }
    public function EnterWorkflowStatusUpdateCommentTextBox(RemoteWebDriver $driver, $enterTextTextBoxWorkflow1)
    {
        $driver->switchTo()->frame("txtWorkflowStatusComment_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$tinymceworkflowstatuscommentCss));
        $this->SendKeysToElement($driver, WebDriverBy::cssSelector(self::$tinymceworkflowstatuscommentCss),$enterTextTextBoxWorkflow1);
        return $driver->switchTo()->defaultContent();
    }







    public function SelectAssignedCollaboratorA(RemoteWebDriver $driver)
    {
        $myValue = "1";
        return $this->SelectValueFromDropDown($driver, WebDriverBy::xpath(self::$ChooseOptionValueCollaboratorXpath),$myValue);
    }
    public function ClickSubmitButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$SubmitButtonId));
    }
    public function ClickAddSpecialityButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$AddSpecialityButtonClickId));
    }
    public function ClickCollaboratorListBox(RemoteWebDriver $driver)
    {
        sleep(2);
        return $this->ClickElement($driver, WebDriverBy::id(self::$CollaboratorListBoxId));
    }
    public function SelectCollaboratorFromListA(RemoteWebDriver $driver)
    {
        $this->ClickCollaboratorListBox($driver);
        return $this->SelectAssignedCollaboratorA($driver);

    }
    public function ClickAssignCollaboratorButtonA(RemoteWebDriver $drive)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$AssignCollaboratorButtonAXpath));
    }
    public function ClickAssignCollaboratorButtonB(RemoteWebDriver $drive)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$AssignCollaboratorButtonBXpath));
    }
    public function ClickChooseSpecialityA(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$ChooseSpecialityAXpath));
    }
    public function ClickChooseSpecialityB(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$ChooseSpecialityBXpath));
    }
    public function ClickChooseSubSpecialityA(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$ChooseSubSpecialityAXpath));
    }
    public function ClickChooseSubSpecialityB(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$ChooseSubSpecialityBXpath));
    }
    public function AcceptTerms(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$acceptTermsNewCaseId));
    }
    public function ClickSelectaSpecialty(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$selectaSpecialityCss));
    }
    public function ClickSelectaSpecialtyFromList(RemoteWebDriver $driver)
    {
        return $this->SelectValueFromDropDown($driver, WebDriverBy::cssSelector(self::$selectaSpecialityFromListCss), "Cardiology");
    }
    public function ClickSelectaSubSpecialtyFromList(RemoteWebDriver $driver)
    {
        return $this->SelectValueFromDropDown($driver, WebDriverBy::cssSelector(self::$selectaSubSpecialityFromListCss), "Paediatric cardiology");
    }
    public function ClickEditCaseButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$editCaseButtonId));
    }
    public function ConvertToHeadingClick(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$TinyMceText1Css));
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$ConverttoHeadingCss));
        return $driver->switchTo()->defaultContent();

    }
    public function ConvertToBulletClick(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$TinyMceText1Css));
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$ConverttoBulletCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickFilesandMediaPane(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$ClickFilesandMediaId));
    }
    public function ClickAssociateMediaButton(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$clickAssociateMediaCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickAssociateFileButton(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$clickAssociateFileCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickUploadFromWordButton(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$clickuploadfromwordCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickInsertEditButton(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$clickinserteditCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickViewInFullWindowButton(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$fullScreenCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickBackToCaseButton(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$backtocaseCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ClickSelectaSpeciality(RemoteWebDriver $driver)
    {
        $driver->switchTo()->frame("txtDescription_ifr");
        $this->ClickElement($driver, WebDriverBy::cssSelector(self::$AddSpecialityButtonClickCss));
        return $driver->switchTo()->defaultContent();
    }
    public function ChooseSpecialityFromSelectSpecialityListBox(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$ChooseSpecialityFromSelectSpecialityListCss));
    }


    public function ClickSelectaSubSpeciality(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$AddSubSpecialityButtonClickCss));
    }
    public function ChooseSubSpecialityFromSubSelectSpecialityListBox(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$ChooseSubSpecialityFromSelectSpecialityListCss));
    }
    public function addSNOMEDTag(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$addsnomedtagValueId));
    }
    public function ClickGroupsandWorkflowButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::className(self::$groupsandworkflowCss));
    }
    public function ClickAddFromMyFilesButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$addFromMyFilesId));
    }
    public function ClickFilesUploadButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$filesuploadButtonId));
    }
    public function ClickAddFilesImagesVideosSection(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$AddFilesImagesVideosSectionCss));
    }
    public Function ClickAddFromMyMediaButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$addFromMyMediaId));
    }
    public function VerifyErrorMessageYouMustAcceptTerms(RemoteWebDriver $driver, $errormessageAcceptTerms)
    {
        $myText = $this->GetInnerTextOfElement($driver, WebDriverBy::id(self::$verifyAcceptTermsErrorMsgCss));
        $messageErrorTems='You must accept the terms';
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
    public function EnterTextTxtFField(RemoteWebDriver $driver, $enterTxtfValue1)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$texttxtFAlpmandFieldId),$enterTxtfValue1);
    }
    public function EnterTextTxtFAlpMandField(RemoteWebDriver $driver, $enterTxtfAlpMandValue1)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$texttxtFAlpmandFieldId),$enterTxtfAlpMandValue1);
    }
    public function ClickShareCaseWithButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$shareCaseWithButtonId));
    }
    public function EnterShareCaseWithValue(RemoteWebDriver $driver, $shareCaseEnterValue1)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::id(self::$sharedCaseWithValueId),$shareCaseEnterValue1);
    }
    public function ClickHomepageIcon(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$HomepageIconCss));
    }
    public function ClickCollaboratorsTemplateListBoxId(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$CollaboratorsTemplateListBoxId));
    }
    public function ClickAssignCollaboratorTemplateButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::xpath(self::$AssignCollaboratorTemplateButtonXpath));
    }
    public function ClickShareCaseButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$ShareCaseId));
    }
    public function Verifydownloadpdfbutton(RemoteWebDriver $driver)
    {
        $myValue = $this->GetElement($driver, WebDriverBy::cssSelector(self::$verifydownloadpdfbuttonCss));
        if (isset($myValue)) {
            return true;
        } else {
            return false;
        }
    }
    public function VerifyPostCommentIcon(RemoteWebDriver $driver)
    {
        $myValue = $this->GetElement($driver, WebDriverBy::cssSelector(self::$postcommenticonCss));
        if (isset($myValue)) {
            return true;
        } else {
            return false;
        }
    }
    public function ClickGroupNewTab(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$groupNewTabCss));
    }
    public function ClickCreateNewPostInNewButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::cssSelector(self::$createNewPostinNewCss));
    }
    public function EnterTitleInTitleField(RemoteWebDriver $driver, $titleFieldValue)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::cssSelector(self::$enterPostTileTextBoxCss),$titleFieldValue);
    }
    public function EnterPostContentTextBox(RemoteWebDriver $driver, $postContentText)
    {
        return $this->SendKeysToElement($driver, WebDriverBy::cssSelector($postContentCss),$postContentText);
    }
    public function ClickPostItemButton(RemoteWebDriver $driver)
    {
        return $this->ClickElement($driver, WebDriverBy::id(self::$postitembuttonId));
    }








    private static $NewCaseEnterCaseNameId='txtName';
    private static $TinyMceText1Css='#tinymce';
    private static $TinyMceText2Css='#tinymce';
    private static $SubmitButtonId='btnSaveCase';
    private static $clickonSelectaSpecialityTextCss='#select2-chosen-1';
    private static $AddSpecialityButtonClickCss='btnAddSpecialty';
    private static $CollaboratorListBoxId='selAddCollaborator_0';
    private static $CollaboratorsTemplateListBoxId='selAddGroupCollaborator';
    private static $ChooseOptionValueCollaboratorXpath='//*[@id="selAddCollaborator_0"]/option[2]';
    private static $AssignCollaboratorButtonAXpath='//*[@id="liFieldItem_209"]/div[1]/a/img';
    private static $AssignCollaboratorTemplateButtonXpath='//*[@id="liCaseCollaborators"]/a';
    private static $AssignCollaboratorButtonBXpath='//*[@id="liFieldItem_210"]/div[1]/a';
    private static $ChooseSpecialityAXpath='//*[@id="select2-drop-mask"]';
    private static $ChooseSpecialityBXpath='//*[@id="select2-drop-mask"]';
    private static $acceptTermsNewCaseId='acceptTerms';
    private static $selectaSpecialityCss='#select2-results-1';
    private static $selectasubspecialtyCss='#select2-drop-mask';
    private static $selectaSubSpecialityFromListCss='#select2-results-35';
    private static $editCaseButtonId='btnEditCase';
    private static $ConverttoHeadingCss='#txtDescription_medtingStyles_action > span.mceAction.mce_toH4';
    private static $ConverttoBulletCss='#txtDescription_medtingIndentDropdown_action > span.mceAction.mce_bullist';
    private static $ClickFilesandMediaId='h2BlueBox3';
    private static $clickAssociateMediaCss='#txtDescription_medting_associate_media > span.mceIcon.mce_medting_associate_media';
    private static $clickAssociateFileCss='#txtDescription_medting_associate_file > span.mceIcon.mce_medting_associate_file';
    private static $clickuploadfromwordCss='#txtDescription_medting_import_word > span.mceIcon.mce_medting_import_word';
    private static $clickinserteditCss='#txtDescription_linkUnlink > span.mceIcon.mce_linkUnlink';
    private static $fullScreenCss='#txtDescription_fullscreen > span.mceIcon.mce_fullscreen';
    private static $backtocaseCss='#mce_fullscreen_fullscreen > span.mceIcon.mce_fullscreen';
    private static $ChooseSpecialityFromSelectSpecialityListCss='#select2-results-1';
    private static $AddSubSpecialityButtonClickCss='#select2-chosen-40';
    private static $ChooseSubSpecialityFromSelectSpecialityListCss='#select2-results-40';
    private static $groupsandworkflowCss='#h2BlueBox2';
    private static $addFromMyFilesId='btnSelectFiles';
    private static $filesuploadButtonId='btnUploadAttachment';
    private static $AddFilesImagesVideosSectionCss='#divMediaUploader_browse > span.ui-button-text';
    private static $addFromMyMediaId='btnSelectMedia';
    private static $verifyAcceptTermsErrorMsgCss='#liCaseEditorButtons > div > div.divErrorBox';
    private static $texttxtFFieldId='lblField__477';
    private static $texttxtFAlpmandFieldId='lblField__478';
    private static $shareCaseWithButtonId='btnShareCase';
    private static $sharedCaseWithValueId='txtShareName';
    private static $HomepageIconCss='#liHome > a';
    private static $tinymceworkflowstatuscommentCss='#tinymce';
    private static $ShareCaseId='btnSaveShareCase';
    private static $verifydownloadpdfbuttonCss='#btnDownloadPdf > span';
    private static $postcommenticonCss='#divCaseCommentsWrapper > div.divBlueBoxContent > ul > li:nth-child(3) > a';
    private static $groupNewTabCss='#all';
    private static $createNewPostinNewCss='#btnAddNews';
    private static $enterPostTileTextBoxCss='#txtNewNewsItemTitle';
    private static $postContentCss='#txtNewNewsItemContent';
    private static $postitembuttonId='btnCreateNewsItem';


    private static $addsnomedtagValueId='';




} 