<?php
/*    Using "mysqli" instead of "mysql" that is obsolete.
*     Utilisation de "mysqli" à la place de "mysql" qui est obsolète.
* Change the value of parameter 3 if you have set a password on the root userid
* Changer la valeur du 3e paramètre si vous avez mis un mot de passe à root
*/

/*$mysqli = new PDO('127.0.0.1', 'root', '');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
echo 'Connection OK';
$mysqli->close();
*/

/*
try {
	$mysqli = new PDO ("mysql:localhost;dbname=EnablerActivation;charset=utf8", 'root','');
	echo "Connection OK";
	$mysqli=null;

} catch (PDOException $e) {
	echo "Error".$e->getmessage();	
}

*/
$lines=array();
$fp=fopen('C:\Users\raymondl\Desktop\Testing\TestActivationFile.xml', 'r');
while (!feof($fp))
{
    $line=fgets($fp);

    //process line however you like
    $line=trim($line);

	$parts = explode('=', $line);
    //add to array
    
    print_r($line."<br>");

    $lines[$parts[0]]=$parts[1];

}
fclose($fp);

print_r($lines);

echo "<BR>";
echo "<BR>";
echo "<BR>";

$string = "/wwwservices/DataService.php/Customers/";
$token = strtok($string, "\/\?");

print_r($token);echo "   here<BR>";

while ($token !== false)
{
echo "$token<br>";
$token = strtok("\/\?");
} 

$two = explode("/\?", $string);
print_r($two);

?>
