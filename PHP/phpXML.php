<?php

// Register the Error handler first before it can be used
function customError($errno,$errstr)
{
    echo "<b>Error:</b> Error No: [$errno]; Error String: $errstr<br>";
    echo "Ending Script";
    echo "<br>";
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
</note>"; // < missinga angle bracket 

$xml=simplexml_load_string($myXMLData); //  <- this will report an error: 2            //or die("Error: Cannot create object");

print_r($xml);

echo($test); // <- undefinded variable 


$newXml = simplexml_load_file("books.xml");

foreach($newXml->children() as $books)
{
    echo $books->title['lang'];
    echo "<br>";
}


// XML Expat Parser Demo

$parser = xml_parser_create();
$currentAtt;

function start($parser, $element_name, $element_atts)
{
    switch($element_name)
    {
        case "BOOK":
            echo "--- Book for ".$element_atts['CATEGORY']."----";
            break;
        case "TITLE":
            echo "Book Title is: ";
            if(count($element_atts)>0)
            {
                $GLOBALS['currentAtt'] = $element_atts;
            }
            else
            {
                $currentAtt = null;
            }
            break;
        case "AUTHOR":
            echo "Author is: ";
            break;
        case "YEAR":
            echo "Publish Year is: ";
            break;
        case "PRICE":
            echo "Selling price is: ";
            break;
        
    }
}

function stop($parser, $element_name)
{

    if($element_name == "TITLE" && isset($GLOBALS['currentAtt']))
    {
        echo " (Language is: <b>".$GLOBALS['currentAtt']['LANG']."</b>)";
    }

    echo "<br>";
}

function DataContent($parser, $data)
{
    echo $data;
}

xml_set_element_handler($parser, "start", "stop");

xml_set_character_data_handler($parser, "DataContent");

$fp = fopen("Books.xml","r");

while($data = fread($fp, 8192))
{
    xml_parse($parser, $data, feof($fp));
}

xml_parser_free($parser);

// XML DOM 

$xmlDoc = new DOMDocument();
$xmlDoc->load("Books.xml");

$x = $xmlDoc->documentElement;

foreach($x->childNodes AS $item)
{
    print $item->nodeName."=".$item->nodeValue."<br>";
}
?>