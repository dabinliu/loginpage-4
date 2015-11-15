<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_POST['add']))//
{
$dbhost = '127.0.0.1:3306';
$dbuser = 'root';
$dbpass = 'root';
$dbname='demo';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
  die('Could not connect: ' . mysqli_connect_error());//mce tells error is happened
}
else
{
    echo "connection successfull";
}
if(!get_magic_quotes_gpc() )
{
   $name = addslashes ($_POST['name']);
   $address = addslashes ($_POST['address']);
   $email = addslashes ($_POST['email']);
    $phone = addslashes ($_POST['phone']);
}
else
{
   $name = $_POST['name'];
   $address = $_POST['address'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
}


$sql = "INSERT INTO rajat ".
       "(name,address, email,phone) ".
       "VALUES('$name','$address','$email','$phone')";//now funct tells present date nd time

$retval = mysqli_query($conn, $sql);
if(!$retval )
{
  die('Could not enter data: ' . mysqli_connect_error());//die trminte the conction 
}
echo "Entered data successfully\n";
mysqli_close($conn);
}
else
{
        ?>
        <form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>
<td width="100">Name</td>
<td><input name="name" type="text" id="name" required></td>
</tr>
<tr>
<td width="100">Address</td>
<td><input name="address" type="text" id="address" required></td>
</tr>
<tr>
<td width="100">email</td>
<td><input name="email" type="email" id="email" required</td>
</tr>
<tr>
    <td width="100">phone</td>
    <td><input name="phone" type="tel" id="phone" required pattern="^[0-9]" ></td>
</tr>
<tr>    
<td width="100"> </td>
<td> </td>
</tr>
<tr>
<td width="100"> </td>
<td>
<input name="add" type="submit" id="add" value="SUBMIT">
</td>
</tr>
</table>
</form>
<?php
}
?>
    </body>
</html>
//type =email is done to enter the email compulsory
required is also the same
for phone number // required pattern="^[0-9]"// is used
