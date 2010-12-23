
 <?php 
// $thisdir = getcwd();
$thisdir="../user";
 echo $thisdir;
if(mkdir($thisdir."/myfiles" , 0755))
{
   echo "Directory has been created successfully...";
}
else
{
   echo "Failed to create directory...";}
   $thisdir2="../user/myfiles";
   if(mkdir($thisdir2."/1" , 0755))
{
   echo "Directory has been created successfully...";
}
else
{
   echo "Failed to create directory...";}
     if(mkdir($thisdir2."/2" , 0755))
{
   echo "Directory has been created successfully...";
}
else
{
   echo "Failed to create directory...";}
?>