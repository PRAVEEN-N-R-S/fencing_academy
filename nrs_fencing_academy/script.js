function sendOTP(){

var phone=document.getElementById("phone").value;

var xhr=new XMLHttpRequest();

xhr.open("POST","send_otp.php",true);

xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

xhr.send("phone="+phone);

alert("OTP Sent");

}