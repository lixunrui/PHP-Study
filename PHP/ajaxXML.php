<?php

    $q=$_GET["q"];

    $xmldoc= new DOMDocument();

    $xmldoc->load("..\\XML\\cd_catelog.xml");

    $x=$xmldoc->getElementsByTagName('ARTIST');

    for($i=0; $i < $x->length-1; $i++) {
        if($x->item($i)->nodeType == 1) {
            /*
                If the node is an element node, the nodeType property will return 1.

                If the node is an attribute node, the nodeType property will return 2.

                If the node is a text node, the nodeType property will return 3.

                If the node is a comment node, the nodeType property will return 8.
            */
            if($x->item($i)->childNodes->item(0)->nodeValue == $q) {
                $y = ($x->item($i)->parentNode);
            }
        }
    }

    /*
    For Example:
    CD->childNodes has 13 items
    /n
    Title
    /n
    ARTIST
    /n
    ...


    each /n is counted as a item, so when writing XML, be careful about this, MAYBE there is a solution for this
    */
    $cd = ($y->childNodes);

    for($i=1; $i<$cd->length;$i++){
        if($cd->item($i)->nodeType == 1) {
            echo ("<b>".$cd->item($i)->nodeName."</b> ");
            echo ($cd->item($i)->childNodes->item(0)->nodeValue);
            echo ("<br>");
        }
    }
?>