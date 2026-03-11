<?php

include "config.php";

if(isset($_POST['phone']) && isset($_POST['otp'])){

    $phone = $_POST['phone'];
    $userotp = $_POST['otp'];

    // Get user details
    $sql = "SELECT * FROM users WHERE phone='$phone'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $row = $result->fetch_assoc();

        // Check if OTP exists
        if(empty($row['otp'])){
            echo "No OTP found. Please request a new OTP.";
            exit();
        }

        // OTP expiry check
        if(time() > strtotime($row['otp_expiry'])){
            echo "OTP Expired. Please request a new OTP.";
            exit();
        }

        // OTP match check
        if($row['otp'] == $userotp){

            // Update verification status
            $update = "UPDATE users 
                       SET otp_status='verified', otp=NULL, otp_expiry=NULL 
                       WHERE phone='$phone'";

            if($conn->query($update)){
                echo "Phone Verified Successfully";
            }
            else{
                echo "Verification failed. Try again.";
            }

        }
        else{

            echo "Invalid OTP";

        }

    }
    else{

        echo "Phone number not found";

    }

}
else{

    echo "Invalid Request";

}

?>