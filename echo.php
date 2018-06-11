<?php
// echo("<h3> Symmetric Encryption </h3>");
// $key_value = "KEYVALUE";
// $plain_text = "india@11";
// $encrypted_text = mcrypt_ecb(MCRYPT_DES, $key_value, $plain_text, MCRYPT_ENCRYPT);
// echo ("<p><b> Text after encryption : </b>");
// echo ( $encrypted_text );
// $decrypted_text = mcrypt_ecb(MCRYPT_DES, $key_value, $encrypted_text, MCRYPT_DECRYPT);
// echo ("<p><b> Text after decryption : </b>");
// echo ( $decrypted_text );

?>
<html>
<head>
<title>PHP Reanme image example</title>
</head>
<body>
 
<form action="" enctype="multipart/form-data" method="post">
Select image :
<input type="date" name="file" required=""><br/>
<input type="submit" value="Upload" name="Submit1">
 
</form>
 
<?php
 
if(isset($_POST['Submit1']))
{ 
$date=$_POST['file'];

$today = date("Y-m-d");
$diff = date_diff(date_create($date), date_create($today));
echo 'Age is '.$diff->format('%y');
$age=(int)$diff->format('%y');
var_dump($age);
echo $age;

}
 ?>
</body>
</html>