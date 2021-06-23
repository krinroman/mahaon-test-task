<?php
    //File name
    const FILE_NAME_SETTINGS = 'settings.php';

    //Testing
    testConfig("site_url");
    testConfig("db.user");
    testConfig("app.services.resizer.fallback_format");
    testConfig("db.host", "localhost");
    testConfig("db.host");

    //Testing function
    function testConfig($optionName, $defaultValue = null)
    {
        echo "optionName: ".$optionName."<br>defaultValue: ".$defaultValue."<br>";
        try {
            echo "value: ".config($optionName, $defaultValue);
        } catch (Exception $ex) {
            echo "exception: ".$ex->getMessage();
        }
        echo "<br><br>";
        
    }

    //Main function
    function config($optionName, $defaultValue = null)
    {
        $settings = include FILE_NAME_SETTINGS;
        try {
            return getOption($optionName, $settings);
        } catch (Exception $ex) {
            if($defaultValue !== null){
                return $defaultValue;
            }else{
                throw new Exception($ex->getMessage());
            }
        }     
    }

    //Accessory recursive function
    function getOption($optionName, $array)
    {
        $key = $optionName;
        $pos = strpos($optionName, '.');
        if($pos){
            $key = substr($optionName, 0, $pos);
        }

        if(array_key_exists($key, $array)){
            if($pos){
                return getOption(substr($optionName, $pos+1), $array[$key]);
            }else{
                return $array[$key];
            }
        }else{
            throw new Exception('Option name: "'.$key.'" not found');
        }
    }
    
?>