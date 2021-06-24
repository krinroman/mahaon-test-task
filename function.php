<?php

//File path
const FILE_PATH_SETTINGS = __DIR__.'/settings.php';

/**
 * Function for getting settings 
 *
 * @param string $optionName
 * @param string $defaultValue
 * @return string
 */
function config($optionName, $defaultValue = null)
{
    if(!file_exists(FILE_PATH_SETTINGS)){
        throw new Exception('File on the path "'.FILE_PATH_SETTINGS.'" not found');
    }

    $settings = include FILE_PATH_SETTINGS;

    $options = explode(".", $optionName);

    return getOption($options, $settings, $defaultValue);  
}

/**
 * Accessory recursive function
 *
 * @param array $options
 * @param array $array
 * @param string $defaultValue
 * @return string
 */
function getOption($options, $array, $defaultValue = null)
{
    $key = array_shift($options);

    if(array_key_exists($key, $array)){
        if(!empty($options)) {
            return getOption($options, $array[$key], $defaultValue);
        } else {
            return $array[$key];
        }
    }else{
        if($defaultValue !== null) {
            return $defaultValue;
        } else {
            throw new Exception('Option name: "'.$key.'" not found');
        }
    }
}