<?php

    require __DIR__."/function.php";

    /**
     * Function for function "config" tests
     *
     * @param string $optionName
     * @param string $defaultValue
     * @return string
     */
    function testConfig($optionName, $defaultValue = null)
    {
        echo sprintf("OptionName: %s".PHP_EOL."DefaultValue: %s".PHP_EOL, $optionName, $defaultValue);
        try {
            echo sprintf("Value: %s", config($optionName, $defaultValue));
        } catch (Exception $ex) {
            echo sprintf("Exception: %s", $ex->getMessage());
        }
        echo PHP_EOL.PHP_EOL;
    }