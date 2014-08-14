<?php
/**
 * Created by PhpStorm.
 * User: YGunisetti
 * Date: 7/28/14
 * Time: 10:11 AM
 */

class App
{

    public static $testResult='passed';
    private static $driver;
    protected static $browserName;
    protected static $url;

    private static function LaunchApplication($browserType)
    {
        switch (strtoupper($browserType))
        {

            case("CHROME"):
            {
                self::$driver = RemoteWebDriver::create(
                    'http://localhost:4444/wd/hub',
                    array(
                        WebDriverCapabilityType::BROWSER_NAME
                        => WebDriverBrowserType::CHROME,
                    )
                );
                break;
            }
            case("FIREFOX"):
            {
                self::$driver = RemoteWebDriver::create(
                    'http://localhost:4444/wd/hub',
                    array(
                        WebDriverCapabilityType::BROWSER_NAME
                        => WebDriverBrowserType::FIREFOX,
                    )
                );
                break;
            }
            case("IE"):
            {
                self::$driver = RemoteWebDriver::create(
                    'http://localhost:4444/wd/hub',
                    array(
                        WebDriverCapabilityType::BROWSER_NAME
                        => WebDriverBrowserType::IE,
                    )
                );
                break;
            }
            case("SAFARI"):
            {
                self::$driver = RemoteWebDriver::create(
                    'http://localhost:4444/wd/hub',
                    array(
                        WebDriverCapabilityType::BROWSER_NAME
                        => WebDriverBrowserType::SAFARI,
                    )
                );
                break;
            }
            case("HTMLUNIT"):
            {
                self::$driver = RemoteWebDriver::create(
                    'http://localhost:4444/wd/hub',
                    array(
                        WebDriverCapabilityType::BROWSER_NAME
                        => WebDriverBrowserType::HTMLUNIT,
                    )
                );
                break;
            }
        }
        self::$driver->manage()->window()->maximize();
        return self::$driver;
    }

    public static function LaunchAndNavigate($broserName,$url)
    {
        $app=self::LaunchApplication($broserName);
        $app->get($url);
        return $app;
    }

    /**
     * @notes Closes the Particular Browser
     * @param RemoteWebDriver $driver
     */
    public static function CloseApplication(RemoteWebDriver $driver)
    {
        $driver->close();
    }
} 