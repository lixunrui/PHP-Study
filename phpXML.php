<?php

// Register the Error handler first before it can be used
function customError($errno,$errorstring)
{
    echo "<b>Error:</b> Error No: [$errno]; Error String: $errstr<br>";
    echo "Ending Script";
  //die();
}

set_error_handler("customError");

$myXMLData = 
"<?xml version='1.0' encoding='UTF-8'?>
<note>
    <to>Tove</to>
    <from>Jani</from>
    <heading>Reminder</heading>
    <body>Don't forget me this weekend!</body>
</note"; // < missing a angle bracket 

$xml=simplexml_load_string($myXMLData); //  <- this will report an error: 2            //or die("Error: Cannot create object");

print_r($xml);

echo($test); // <- undefinded variable 

// nex test

?>