<?php
session_start();
$_SESSION['user'];
if($_SESSION['user']=="")
{
    session_destroy();
    header("Location:index.php#pricing");
    exit();
}
?>
<?php
// addslashes preventing sql injection
$name1=addslashes($_POST['name']);
$dob=$_POST['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
$currentage=$diff->format('%y');
$currtage=(int)$currentage;
if($currtage<18)
{
                $ms1g="CANDIDATE AGE CAN'T BE LESS THAN 18, age is $currtage";
              ?>
    <script type="text/javascript">
      alert("<?php echo $ms1g; ?>");
      window.location='admin_dashboard.php';
    </script>
<?php 
exit();
}
else
{

$aadhar=addslashes($_POST['aadhar']);

$fname=addslashes($_POST['fhname']);
$mname=addslashes($_POST['mname']);
$mob=addslashes($_POST['mob']);
$email=addslashes($_POST['email']);
$elcnm=addslashes($_POST['elcnm']);
$about=addslashes($_POST['about']);
$gender=addslashes($_POST['gender']);
// connection to db
include 'dbsele.php';
// checking if aadhar already exist
$chkdata="SELECT id from election where aadhar='$aadhar'";
$result=mysql_query($chkdata);
$res=mysql_num_rows($result);
// checking if any row found it will getback to result page
if($res>0)
{
    $msg="CANDIDATE ALREADY REGISTERED !";
                echo "<script type='text/javascript'> alert('$msg');";
                echo "window.location='view_result.php'";
                echo "</script>";
}    
else 
{
    $filename1 = "candidateimg";
    $filename2 = "education";
    $filename3 = "policevery";
    mkdir("img/canimg/$aadhar");
     $target_dir1 = "img/canimg/$aadhar/";
     $target_dir2 = "img/canimg/$aadhar/";
     $target_dir3 = "img/canimg/$aadhar/";
     $target_file1 = $target_dir1 . basename($_FILES["imgcandi"]["name"]);
     $target_file2 = $target_dir2 . basename($_FILES["heimg"]["name"]);
     $target_file3 = $target_dir3. basename($_FILES["policevery"]["name"]);


     // Select file type
     $imgext1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
     $imgext2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
     $imgext3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

     // Valid file extensions
     $extensions_arr = array("jpg","jpeg","png");
     $filenm1=$filename1.".".$imgext1;
     $filenm2=$filename2.".".$imgext2;
     $filenm3=$filename3.".".$imgext3;

     // Check extension
     if( in_array($imgext1 && $imgext2 && $imgext3,$extensions_arr) )
     {

      // Insert record
      $qry="INSERT INTO election (name,aadhar,fhname,mname,gender,email,mob,dob,canimg,canhe,canpv,elecname,about) values ('$name1','$aadhar','$fname','$mname','$gender','$email','$mob','$dob','".$filenm1."','".$filenm2."','".$filenm3."','$elcnm','$about')";

      // Upload file move
      // move_uploaded_file($_FILES['imgcandi']['tmp_name'],$target_dir.$filename1);
      // move_uploaded_file($_FILES['heimg']['tmp_name'],$target_dir.$filename2);
      // move_uploaded_file($_FILES['policevery']['tmp_name'],$target_dir.$filename3);

      //copy file to folder
     $img1= copy($_FILES['imgcandi']['tmp_name'],$target_dir1.$filenm1);
     $img2 =copy($_FILES['heimg']['tmp_name'],$target_dir2.$filenm2) ;
     $img3= copy($_FILES['policevery']['tmp_name'],$target_dir3.$filenm3);
     }
    if(!$img1 && !$img2 && !$img3)
    {
      $msg9="ERROR UPLOADING FILE  !";
                echo "<script type='text/javascript'> alert('$msg9');";
                echo "window.history()";
                echo "</script>";
    }
    else
    {
      $fire=mysql_query($qry) or die(mysql_error());
      if($fire)
      {
               $msg12="CANDIDATE REGISTERED  !";
                echo "<script type='text/javascript'> alert('$msg12');";
                echo "window.location='view_result.php'";
                echo "</script>";
      }
      else
      {
                $msg4="ERRRRRRRRRROR  !";
                echo "<script type='text/javascript'> alert('$msg4');";
                echo "window.location='view_result.php'";
                echo "</script>";
      }
    }

}
}
?>