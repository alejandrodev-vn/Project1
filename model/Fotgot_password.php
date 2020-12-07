<?php 
    function forgot_password($conn, $email) {
        $to_email = $email;
        $new_password = rand();
        $subject = "Forgot Password";
        $body = "Xin chào, mật khẩu của bạn đã được đổi thành ". $new_password. " . Vui lòng đăng nhập bằng mật khẩu này cho lần đăng nhập tiếp theo";
        $headers = "From j2team.tranminhquang@gmail.com";
        if(empty($to_email)) {
            return "Email are required!";
        } else if(mail($to_email, $subject, $body, $headers)) {
                $query = "UPDATE user SET password = md5('$new_password') WHERE email = '$email';";
                $conn->query($query);
                return "Email sending successfully";
        } else {
            return "Email sending fail";
        }
    }
?>