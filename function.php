
<?php
session_start();
$dbserver = "localhost";
$dbuname = "root";
$dbpsw = "";
$db = "loginsys";
$conn = mysqli_connect($dbserver, $dbuname, $dbpsw, $db);
if(!$conn){
    die("Error, Connection Failed: " . mysqli_connect_error());
}
    // let the otp session expire after 30 minutes
    
function uExists($conn, $uname, $email){
    $sql = "SELECT * FROM account WHERE uname = ? OR uemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row; // User exists, return user data
    } else {
        
        return false; // User doesn't exist
    }
    
    mysqli_stmt_close($stmt);
}

if(isset($_POST["signup"])){
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $cpsw = $_POST["cpsw"];


    
    
    function empInput($uname, $email, $psw, $cpsw){
        $result = false;
        if(empty($uname) || empty($email) || empty($psw) || empty($cpsw)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    function invalidUname($uname){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email){
        $result = false;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    
    function pswMatch($psw, $cpsw){
        $result = false;
        if($psw !== $cpsw){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    
    function createUser($conn, $uname, $email, $psw){
        $sql = "INSERT INTO account ( uname, uemail, psw) VALUES ( ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: signup.php?error=stmtfailed");
            exit();
        }
        $hashedPsw = password_hash($psw, PASSWORD_BCRYPT);
        mysqli_stmt_bind_param($stmt, "sss", $uname, $email, $hashedPsw);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: signup.php?error=none");
        exit();
    
    }
    if(empInput($uname, $email, $psw, $cpsw) !== false){
        header("Location: signup.php?error=emptyinput");
        exit();
    }
    if(invalidUname($uname) !== false){
        header("Location: signup.php?error=invaliduname");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("Location: signup.php?error=invalidemail");
        exit();
    }
    if(pswMatch($psw, $cpsw) !== false){
        header("Location: signup.php?error=pswnotmatch");
        exit();
    }
    if (uExists($conn, $uname, $email) !== false) {
        header("Location: signup.php?error=unameexists");
        exit();
    }

    createUser($conn, $uname, $email, $psw);

}else if (isset($_POST["login"])) {
    $uname = $_POST["uname"];
    $psw = $_POST["psw"];

    function empInput($uname, $psw)
    {
        $result = false;
        if (empty($uname) || empty($psw)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    if (empInput($uname, $psw) !== false) {
        header("Location: login.php?error=empInput");
        exit();
    }

    $userExists = uExists($conn, $uname, $uname);

    if ($userExists === false) {
        header("Location: login.php?error=unonexist");
        exit();
    }

    $pswHashed = $userExists["psw"];
    $checkPsw = password_verify($psw, $pswHashed);

    if ($checkPsw === false) {
        header("Location: login.php?error=wrongpsw");
        exit();
    } else {
        session_start();
        $_SESSION["uid"] = $userExists["uid"];
        $_SESSION["uname"] = $userExists["uname"];
        $_SESSION["email"] = $userExists["uemail"];
        header("Location: index.php");
        exit();
    }
}else if(isset($_POST["reset"])){
    $email = $_POST["email"];


function generateNumericOTP($n) { 
    $generator = "1357902468"; 
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
}
    // function to generate 6 random numbers
    $_SESSION["otptime"] = time() + 1800;
    // function to check if the otp session has expired
    function checkOTP() {
        if (isset($_SESSION["otptime"]) && time() > $_SESSION["otptime"]) {
            return true;
        } else {
            return false;
        }
    }
    $otp = generateNumericOTP(6);
    $_SESSION["otp"] = $otp;

    function empInput($email){
        $result = false;
        if(empty($email)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    function validEmail($email){
        $result = false;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
    if (validEmail($email) !== false) {
        header("Location: reset.php?error=invalidemail");
        exit();
    } elseif (empInput($email) !== false) {
        header("Location: reset.php?error=emptyinput");
        exit();
    }else {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        
        $url = "localhost/login/reset.php?selector=" . $selector . "&validator=" . bin2hex($token);
        $expires = date("U") + 1800;
        $_SESSION["email"] = $email;
        
        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: reset.php?error=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: reset.php?error=stmtfailed");
            exit();
        }
        
        $hashedToken = password_hash($token, PASSWORD_BCRYPT);
        mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
        $to = $email;
        $subject = 'Reset your password for your account';
        $otp = generateNumericOTP(6);
        
        $message = '<style>
                        body{background-color:#1D2026;}
                        *{color:#fff;}
                    </style>';
        $message .= '<h1>Welcome, Let\'s help you reset your password</h1><p>We received a password reset request. 
        The link to reset your password is below. If you did not make this request, you can ignore this email</p>';
        $message .= '<p>Here is your password reset link: <a href="' . $url . '">' . $url . '</a></p>';
        $message .= '<p>And your OTP code is: ' . $_SESSION['otp'] . '</p>';

        $headers = "From: tawinia@kabarak.ac.ke \r\n";
        $headers .= "Reply-To: tawinia@kabarak.ac.ke\r\n";
        $headers .= "Content-type: text/html\r\n";

        if (mail($to, $subject, $message, $headers)) {
            // Mail sent successfully
            header("Location: reset.php?error=none");
            exit();
        } else {
            // Capture the error for debugging
            $lastError = error_get_last();
            file_put_contents('mail_errors.txt', print_r($lastError, true), FILE_APPEND); // Log the error to a file
            header("Location: reset.php?error=mailerror");
            exit();
        }
    }
}else if(isset($_POST["resetpsw"])){
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $otpi = $_POST["otp"];
    $psw = $_POST["psw"];
    $cpsw = $_POST["cpsw"];
    $_SESSION["otpi"] = $otpi;

    $requiredFields = [$otpi, $psw, $cpsw];
    foreach ($requiredFields as $field) {
        if (empty($field)) {
            header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=emptyinput");
            exit();
        }
    } if($psw !== $cpsw) {
        header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=pswnotmatch");
        exit();
    } elseif($_SESSION['otpi'] !== $_SESSION['otp']){
        header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=invalidotp");
        exit();
    }

    $currentDate = date("U");
    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=stmtfailed");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(!$row = mysqli_fetch_assoc($result)){
            header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=invalid");
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if($tokenCheck === false){
                header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=invalid");
                exit();
            } else {
                $tokenEmail = $row["pwdResetEmail"];
                $sql = "SELECT * FROM account WHERE uemail = ?;";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=stmtfailed");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if(!$row = mysqli_fetch_assoc($result)){
                        header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=invalid");
                        exit();
                    } else {
                        $sql = "UPDATE account SET psw = ? WHERE uemail = ?;";
                        $stmt = mysqli_stmt_init($conn);

                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=stmtfailed");
                            exit();
                        } else {
                            $hashedPsw = password_hash($psw, PASSWORD_BCRYPT);
                            mysqli_stmt_bind_param($stmt, "ss", $hashedPsw, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?;";
                            $stmt = mysqli_stmt_init($conn);

                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: reset.php?selector=".$selector."&validator=".$validator."&error=stmtfailed");
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: login.php?error=none2");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
}else if(isset($_POST["logout"])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}else if(isset($_POST["save"])){
    session_start();
    $uid = $_SESSION["uid"];
    $regno = $_POST["regno"];
    $phn = $_POST["phoneno"];
    $addr = $_POST["addr"];

    function empInput($regno, $phn, $addr){
        $result = false;
        if(empty($regno) || empty($phn) || empty($addr)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    if(empInput($regno, $phn, $addr) !== false){
        header("Location: index.php?error=emptyinput");
        exit();
    }

    $sql = "UPDATE account SET regno = ?, phoneno = ?, addr = ? WHERE uid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssi", $regno, $phn, $addr, $uid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: index.php?error=none");
    exit();
}else{
    header("Location: index.php");
}
mysqli_close($conn);