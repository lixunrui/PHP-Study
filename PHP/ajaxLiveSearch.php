<?php
    $xmlDoc = new DOMDocument();
    $xmlDoc->load("..\\XML\\ajaxLiveSearchLinks.xml");

    $links = $xmlDoc->getElementsByTagName('link');

    $q=$_GET['q'];

    if(strlen($q) > 0){
        $hint="";
        for($i=0; $i<($links->length); $i++){
            $title = $links->item($i)->getElementsByTagName('title');
            $url = $links->item($i)->getElementsByTagName('url');

            if($title->item(0)->nodeType == 1){
                // find a link matching the search text
                if(stristr($title->item(0)->childNodes->item(0)->nodeValue, $q)){ 
                    // in here, since the title has no child, but childNodes still return 1, as it represents itself, 
                    // instead of using childNodes, using nodeName nodeValue is much eaier
                    if($hint==""){
                        $hint="<a href='".$url->item(0)->childNodes->item(0)->nodeValue ."' target='_blank'> ".$title->item(0)->childNodes->item(0)->nodeValue ." </a>";
                    }
                    else{
                        $hint = $hint."<a href='".$url->item(0)->childNodes->item(0)->nodeValue ."' target='_blank'> ".$title->item(0)->childNodes->item(0)->nodeValue ." </a>";
                    }
                }
            }
        }
    }

    // set output to "no suggestion" if hint was not found
    if($hint == ""){
        $response = "no suggestion";
    } else {
        $response = $hint;
    }

    echo $response;
?>
