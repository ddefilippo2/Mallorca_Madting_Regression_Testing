<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/22/14
 * Time: 4:55 PM
 */


class BasePage
{

    protected function waitForControlStyleBecomesDisplayed(WebDriverBy $byObj,RemoteWebDriver $driver)
    {
        for ($x=0;$x<60*4;$x++)
        {
            try
            {
                if($driver->findElement($byObj)->getAttribute('style')=='display: block;')
                {
                    return true;
                }
                else
                {
                    sleep(250);
                }
            }
            catch(Exception $e)
            {
                continue;
            }
        }
    }
    /**
     * @param WebDriverBy $byObj
     * @param RemoteWebDriver $driver
     * @return bool
     * @notes Waits for the Element to Present
     */
    protected function waitForElementPresent(WebDriverBy $byObj,RemoteWebDriver $driver)
    {
        for ($x=0;$x<60*4;$x++)
        {
            try
            {
                if($driver->findElement($byObj)!=null)
                {
                    return true;
                }
                else
                {
                    sleep(250);
                }
            }
            catch(Exception $e)
            {
              continue;
            }
        }
    }

    /**
     * @param WebDriverBy $byObj
     * @param RemoteWebDriver $driver
     * @return bool
     * @notes Waits for the Element to Display
     */
    protected function waitForElementDisplayed(WebDriverBy $byObj,RemoteWebDriver $driver)
    {
        for ($x=0;$x<60*4;$x++)
        {
            try
            {
                if($this->waitForElementPresent($byObj,$driver))
                {
                    if($driver->findElement($byObj)->isDisplayed()==true)
                    {
                        return true;
                    }
                    else
                    {
                        sleep(250);
                    }
                }
                else
                {
                    sleep(250);
                }
            }
            catch(Exception $e)
            {
                continue;
            }
        }
    }

    /**
     * @param WebDriverBy $byObj
     * @param RemoteWebDriver $driver
     * @return bool
     * @notes Waits for the Element to Enable
     */
    protected function waitForElementEnabled(WebDriverBy $byObj,RemoteWebDriver $driver)
    {
        for ($x=0;$x<60*4;$x++)
        {
            try
            {
                if($this->waitForElementPresent($byObj,$driver))
                {
                    if($driver->findElement($byObj)->isEnabled()==true)
                    {
                        return true;
                    }
                    else
                    {
                        sleep(250);
                    }
                }
                else
                {
                    sleep(250);
                }
            }
            catch(Exception $e)
            {
                continue;
            }
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @notes Clicks Element by taking Driver instance and WebDriverBy Instance
     */
    protected function ClickElement(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
          if($this->waitForElementPresent($by,$driver))
          {
            $element=$driver->findElement($by);
              if($element!=null)
              {
                  $clickedElement=$element->click();
                  return $clickedElement==$element;
              }
              else
              {
                  return false;
              }
          }
          else
          {
            return false;
          }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @notes Sends the Keys to Element by taking Driver instance and WebDriverBy Instance
     */
    protected function SendKeysToElement(RemoteWebDriver $driver,WebDriverBy $by,$value)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                if($element!=null)
                {
                    $clickedElement=$element->sendKeys($value);
                    return $clickedElement==$element;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
           return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @notes Sends the Keys to Element by taking Driver instance and WebDriverBy Instance
     */
    protected function SendKeysToDisplayedElement(RemoteWebDriver $driver,WebDriverBy $by,$value)
    {
        try
        {
            if($this->waitForElementDisplayed($by,$driver))
            {
                $element=$driver->findElement($by);
                if($element!=null)
                {
                    $clickedElement=$element->sendKeys($value);
                    return $clickedElement==$element;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @notes Clears Value from Input Element by taking Driver instance and WebDriverBy Instance
     */
    protected function ClearInputElement(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                if($element!=null)
                {
                    $clickedElement=$element->clear();
                    return $clickedElement==$element;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @notes Submits Element by taking Driver instance and WebDriverBy Instance
     */
    protected function SubmitElement(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                if($element!=null)
                {
                    $clickedElement=$element->submit();
                    return $clickedElement==$element;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @notes Gets InnerText of An Element by taking Driver instance and WebDriverBy Instance
     */
    protected function GetInnerTextOfElement(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                if($element!=null)
                {
                    $clickedElement=$element->getText();
                    return $clickedElement;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return null|WebDriverElement
     * @notes Gets Element, We can use this instead of Writing FindElement syntax
     */
    protected function GetElement(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                if($element!=null)
                {
                    return $element;
                }
                else
                {
                    return null;
                }
            }
            else
            {
                return null;
            }
        }
        catch(Exception $except)
        {
            return null;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return null|WebDriverElement
     * @notes Get Elements, We can use this instead of Writing FindElements syntax
     */
    protected function GetElements(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $elements=$driver->findElements($by);
                if($elements!=null&&count($elements)!=0)
                {
                    return $elements;
                }
                else
                {
                    return null;
                }
            }
            else
            {
                return null;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return null|WebDriverSelect
     * @notes Gets the WebDriver Select Element
     */
    protected function GetSelectElement(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                $selectElement=new WebDriverSelect($element);
                $selectElement->selectByValue($value);
                if($selectElement!=null)
                {
                    return $selectElement;
                }
                else
                {
                    return null;
                }
            }
            else
            {
                return null;
            }
        }
        catch(Exception $except)
        {
            return null;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @param $value
     * @return bool
     * @notes Select Item from Drop Down
     */
    protected function SelectValueFromDropDown(RemoteWebDriver $driver, WebDriverBy $by,$value)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                $selectElement=new WebDriverSelect($element);
                $selectElement->selectByValue($value);
                if($selectElement->getFirstSelectedOption()->getAttribute('value')==$value)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @param $index
     * @return bool
     * @notes Selects Element By Index
     */
    protected function SelectIndexFromDropDown(RemoteWebDriver $driver, WebDriverBy $by,$index)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                $selectElement=new WebDriverSelect($element);
                $selectElement->selectByIndex($index);
                $optionSelected=$selectElement->getFirstSelectedOption();
                $options=$selectElement->getOptions();
                $indexSelected="0";
                foreach($options as $option)
                {
                    if($option==$optionSelected)
                    {
                        break;
                    }
                    $indexSelected++;
                }
                if($indexSelected==$index)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @param $visibleText
     * @return bool
     * @notes Selects Element By Visible Text
     */
    protected function SelectVisibleTextFromDropDown(RemoteWebDriver $driver, WebDriverBy $by,$visibleText)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                $selectElement=new WebDriverSelect($element);
                $selectElement->selectByVisibleText($visibleText);
                if($selectElement->getFirstSelectedOption()->getText()==$visibleText)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @param $value
     * @return bool
     * @notes De selects By value from Drop down
     */
    protected function DeSelectValueFromDropDown(RemoteWebDriver $driver, WebDriverBy $by,$value)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                $selectElement=new WebDriverSelect($element);
                $selectElement->deselectByValue($value);
                if($selectElement->getFirstSelectedOption()->getText()=="")
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return bool
     * @notes De Selects All Selected Elements
     */
    protected function DeSelectAll(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            if($this->waitForElementPresent($by,$driver))
            {
                $element=$driver->findElement($by);
                $selectElement=new WebDriverSelect($element);
                $selectElement->deselectAll();
                if(count($selectElement->getAllSelectedOptions())==0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param $title
     * @return null|RemoteWebDriver
     * @notes Switches to Window based on the Title Specified
     */
    protected function SwitchToWindow(RemoteWebDriver $driver,$title)
    {
        try
        {
           $handles=$driver->getWindowHandles();
            foreach($handles as $handle)
            {
                if($driver->switchTo()->window($handle)->getTitle()==$title)
                {
                    return $driver;
                }
                else
                {
                    continue;
                }
            }
            return $driver->switchTo()->window($handle[0]);
        }
        catch (Exception $except)
        {
           return $driver->switchTo()->window($handle[0]);
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return null|WebDriver
     * @notes Switches to Frame
     */
    protected function SwitchToFrame(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
           return $driver->switchTo()->frame($by);
        }
        catch(Exception $except)
        {
            return null;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return bool
     * @notes Accept Alert
     */
    protected function AcceptAlert(RemoteWebDriver $driver)
    {
        try
        {
           $alert=$driver->switchTo()->alert();
           return $alert->accept()==$alert;
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return bool
     * @notes Dismiss Alert
     */
    protected function DismissAlert(RemoteWebDriver $driver)
    {
        try
        {
            $alert=$driver->switchTo()->alert();
            return $alert->dismiss()==$alert;
        }
        catch(Exception $except)
        {
            return false;
        }
    }

    /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return bool
     * @notes Get Alert Text
     */
    protected function GetAlertInnerText(RemoteWebDriver $driver,WebDriverBy $by)
    {
        try
        {
            $alert=$driver->switchTo()->alert();
            return $alert->getText();
        }
        catch(Exception $except)
        {
            return false;
        }
    }

      /**
     * @param RemoteWebDriver $driver
     * @param WebDriverBy $by
     * @return bool
     * @notes Send Keys to Alert
     */
    protected function SendKeysToAlert(RemoteWebDriver $driver,WebDriverBy $by,$value)
    {
        try
        {
          $alert=$driver->switchTo()->alert();
          return $alert->sendKeys($value)==$alert;
        }
        catch(Exception $except)
        {
            return false;
        }
    }
} 