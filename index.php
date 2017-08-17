<?php


$testURL="https://docs.expressionengine.com/latest/cp/settings/urls.html";
echo "now start";
echo "<br>";
echo $_SERVER["REQUEST_URI"];

$testparse_url = parse_url($testURL, PHP_URL_PATH);
$trimName = trim(parse_url($testURL, PHP_URL_PATH), "/");
$basename = basename(trim(parse_url($testURL, PHP_URL_PATH), "/"),'.php');
echo "<br>";
echo $testparse_url;
echo "<br>";
echo $trimName;
echo "<br>";
echo $basename;
echo "<br>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $value = explode('.', $_FILES['image']['name']);
      $file_ext=strtolower(end($value));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors['type']="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 1) {
         $errors['size']='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
}
?>
<html>
<header
    <link rel="stylesheet" type="text/css" href="styles.css">
</header>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/> 
			
         <ul>
            <li><label Sent file: </label> <?php if(isset($_FILES['image'])) { echo $_FILES['image']['name']; } ?>
            <li><label File size: </label> <?php if(isset($_FILES['image'])) { echo $_FILES['image']['size']; } ?> <input type="text" id="error" value="<?php if(isset($errors['size'])) {print_r ($errors['size']);} ?>">
            <li><label id="label1" File type: </label> <?php if(isset($_FILES['image'])) { echo $_FILES['image']['type']; }?>  <input type="text" value="<?php if(isset($errors['type'])) {print_r ($errors['type']);} ?>">
         </ul>

      </form>
      
   </body>
</html>



<!--  How to set inline error
    https://www.paciellogroup.com/blog/2016/01/simple-inline-error-message-pattern/
    -->