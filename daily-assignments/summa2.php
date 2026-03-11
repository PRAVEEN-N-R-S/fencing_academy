march 4
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    label{
        width:150px;
        display: inline-block;
        padding: 1%;
    }
    #form_val{
        margin:auto;
    }
</style>
</head>
<body>
    <?php
     session_start();
    $eid=$_SESSION["id"];
    echo $eid; 
    
    $cid= $_COOKIE["fid"];
echo($cid);

    if (isset($_GET["id"])){
        $id =$_GET["id"];
        echo($id);
    }
    ?>
    <section>
        <form id="fomval"  >
            <div>
                <label>First Name</label>
                <input type="text" name="first_name" id="first_name" required/>
           </div>
            <!-- <div>
                <label>Second Name</label>
                <input type="text" name="second_name" id="second_name" required />
            </div>
         -->
             <div>
                <label>Age</label>
                <input type="text" name="age" id="age" required />
            
            </div>
        
             <div>
                <label>City</label>
                <input type="text" name="city" id="city" required />
            </div>

             <div>
                <label>Mobile Number</label>
                <input type="number"  name="mobile_number" id="mobile_number" required />
            
            </div>
              <div>
                <label>Add Profile Image</label>
                <input type="file"  name="pro_image" id="form_files" required />
            
            </div>
        
        
            
            <div>
            
                <input type="submit" name="submit" id="submit" />
            </div>
        
        
        </form>

    </section>
    <script>
         
         document.getElementById("fomval").addEventListener("submit",function(e){
        e.preventDefault();

        let eform=document.getElementById("fomval");
        let formdata= new FormData(eform);

        
        fetch("file_form_post.php",{
            method:"POST",
            body :formdata   
        })
        .then(res=>res.text())
        .then(data=> console.log(data))


})

 /*
        document.getElementById("fomval").addEventListener("submit",function(e){
        e.preventDefault();

        fname=document.getElementById("first_name").value;
        sage=document.getElementById("age").value;
        scity=document.getElementById("city").value;
        smob=document.getElementById("mobile_number").value;
        pro_img=document.getElementById("form_files").files[0];

        //let eform=document.getElementById("fomval");
        let formdata= new FormData();
        
        
        formdata.append('first_name',fname);
        formdata.append('age',sage);
        formdata.append('city',scity);
        formdata.append('mobile_number',smob);
        formdata.append('pro_image',pro_img);


fetch("file_form_post.php",{
 method:"POST",
 body :formdata   
})
.then(res=>res.text())
.then(data=> console.log(data))
 

})
*/
    /*     
let formval  =new FormData();

formval.append("file",)
 fetch("url",{
    method:"POST",
    body:formval,
 })
 .then
 */

</script>

</body>
</html>
<?php
include("db.php");

$fname=$_POST["first_name"];
//$sname=$_POST["second_name"];
$age=$_POST["age"];
$city=$_POST["city"];
$mobile_no=$_POST["mobile_number"];
// pro_image=["name"=>cat1.jpg,"type"=>image/jpeg, "size"=>3456,"error"=>, "tmp_name"=>url]
$image_name=rand(1000,100000)."-". $_FILES["pro_image"]["name"];  
$ima_size=$_FILES["pro_image"]["size"];
$ima_type=$_FILES["pro_image"]["type"];
$temp_folder=$_FILES["pro_image"]["tmp_name"];

$des_folder="img/";
 

if(move_uploaded_file($temp_folder,$des_folder.$image_name)){
    echo"image moved";
    
$sql="insert into student_detail value('','$fname',$age,'$mobile_no','$image_name') ";

$result=mysqli_query($conn,$sql);

if($result){
echo "data inserted";
}
else {
    echo"not insert"; 
}
}

?>

march 4 doubt clarify
<?php
include("db.php");

$fname=$_POST["first_name"];
//$sname=$_POST["second_name"];
$age=$_POST["age"];
$city=$_POST["city"];
$mobile_no=$_POST["mobile_number"];
// pro_image=["name"=>cat1.jpg,"type"=>image/jpeg, "size"=>3456,"error"=>, "tmp_name"=>url]
$image_name=rand(1000,100000)."-". $_FILES["pro_image"]["name"];  
$img_size=$_FILES["pro_image"]["size"];
$file_type=$_FILES["pro_image"]["type"];
$temp_folder=$_FILES["pro_image"]["tmp_name"];



if($img_size<10000000 && ( $file_type=='image/jpeg' || $file_type=='application/pdf' || $file_type=='application/doc')){
// new file size in KB

$new_file_name= strtolower($image_name);

$final_file=str_replace(' ','-',$new_file_name);


$des_folder="img/";
 

if(move_uploaded_file($temp_folder,$des_folder.$final_file)){
    echo"image moved";
    
$sql="insert into student_detail value('','$fname',$age,'$mobile_no','$final_file') ";

$result=mysqli_query($conn,$sql);

if($result){
echo "data inserted";
}
else {
    echo"not insert"; 
}
}
}
else{
    echo "this file is not supported";
}

?>

march 4 code 3
<?php
/*class Emp{
public $ename;
private $emp_no;
protected $emp_age;
 
/* function __construct($g){
echo ($g);

 }
 */
/* public function putname($a){
    $this->emp_age=$a;
    echo $this->emp_age;
    $this->getname();
 }
 
 private function getname(){
    echo "<br> hello";
 }

 }


$emp = new Emp(); // object creation 
//emp->emp_age="raj";
//echo $emp->emp_age;
//$emp->getname(); // class varible access
$emp->putname("rajan"); // class method access
//$emp1->getname();
 */

abstract class  Par{
   abstract public function prin();
    
   
}
class Chil extends Par {
    public function prin()
    {
      
        echo "<br> from child Class";
           
    }
}
class Chil1 extends Par{
    public function prin()
    {
      
        echo "<br> from child2 Class";
         
    }
}


$ch=[new Par(), new Chil1(),new Chil()];

foreach ($ch as $vl){
$vl->prin();
}
?>
