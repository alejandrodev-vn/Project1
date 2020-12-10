<?php 
    function create_account($conn, $full_name, $email, $address, $phone, $date, $username, $password) {
        try {
            $sql = "INSERT INTO user (idUser, fullName, email, address, phoneNumber, dateOfBirth, username, password, idRole)
VALUES (null, '$full_name', '$email', '$address', '$phone', '$date', '$username', '$password', 4)";
        $conn->exec($sql);  
        return true;
        } catch(PDOException $e) {
            return false;
        }
    }
?>