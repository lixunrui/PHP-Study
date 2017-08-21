<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint="";

// lookup all hints from array if $q is different from ""

if($q !== "") // !==: Returns true if $x is not equal to $y, or they are not of the same type
    $q=strtolower($q);

    $len = strlen($q);

    foreach($a as $name) // foreach ($array as $value)
    {
        if(stristr($q,substr($name, 0, $len)))
        {
            if($hint === "") // ===:  	Returns true if $x is equal to $y, and they are of the same type
            {
                $hint = $name;
            }
            else
            {
                $hint.=",$name";
            }
        }
    }

echo $hint === "" ? "no suggestion":$hint;
?>
