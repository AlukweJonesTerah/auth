<?php
    include 'header.php';

    if(isset($_GET['selector']) && isset($_SESSION['otp'])){
        echo '<main>
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">Enter your new Password</h1>';
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector) || empty($validator)){
            header("Location: reset.php");
        }else{
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class='berr'>Please fill in all fields!</p>";
                    } else if ($_GET["error"] == "invalidemail") {
                        echo "<p class='berr'>The email format is incorrect. Use example@email.com format!</p>";
                    } else if ($_GET["error"] == "mailerror") {
                        echo "<p class='berr'>An issue occurred while sending the email.</p>";
                    } else if ($_GET["error"] == "wrongemail") {
                        echo "<p class='berr'>Incorrect email!</p>";
                    } else if ($_GET["error"] == "none") {
                        echo "<p class='gerr'>Alright, let's proceed. Please check your email.</p>";
                    } else if ($_GET["error"] == "invalidotp") {
                        echo "Entered OTP: " . $_SESSION['otpi']; // Print entered OTP
                        echo "Stored OTP: " . $_SESSION['otp']; // Print stored OTP
                        echo "<p class='berr'>The OTP code is invalid.</p>";
                        

                    } else if ($_GET["error"] == "pswnotmatch") {
                        echo "<p class='berr'>The passwords don't match!</p>";
                    } else if ($_GET["error"] == "stmtfailed") {
                        echo "<p class='berr'>There was an issue. Please try again later.</p>";
                    }
                }
                echo '<form action="function.php" method="post">
                    <input type="hidden" name="selector" value="'.$selector.'">
                    <input type="hidden" name="validator" value="'.$validator.'">
                    <div class="form-group">
                    <label for="psw">OTP Code</label>
                    <input class="form-control form-control-lg" type="text" name="otp" placeholder="Enter OTP Code">
                    </div>
                    <div class="form-group">
                    <label for="psw">password</label>
                    <input class="form-control form-control-lg" type="password" name="psw" placeholder="Enter a new password">
                    </div>
                    <div class="form-group">
                    <label for="cpsw">Confirm password</label>
                    <input class="form-control form-control-lg" type="password" name="cpsw" placeholder="Confirm new password">
                    </div>
                    <button class="button button-primary" type="submit" name="resetpsw">Reset Password</button>
                    </form>';
            }
        }
                echo '</div>
                <div class="hero-figure anime-element">
                    <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                        <rect width="528" height="396" style="fill:transparent;" />
                    </svg>
                    <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                    <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                    <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                    <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                    <div class="hero-figure-box hero-figure-box-05"></div>
                    <div class="hero-figure-box hero-figure-box-06"></div>
                    <div class="hero-figure-box hero-figure-box-07"></div>
                    <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                    <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                    <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                </div>
            </div>
        </div>
        </section>
        </main>';
    }else{
        echo '<main>
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">Reset</h1>
                        ';if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p class='berr'>Fill in all fields!</p>";
                            }else if($_GET["error"] == "invalidemail"){
                                echo "<p class='berr'>Email wasn't formated properly, eg. example@email.com!</p>";
                            }else if($_GET["error"] == "mailerror"){
                                echo "<p class='berr'>There's an issue that occured while sending the email</p>";
                            }
                            else if($_GET["error"] == "wrongemail"){
                                echo "<p class='berr'>Wrong email!</p>";
                            }
                            else if($_GET["error"] == "none"){
                                echo "<p class='gerr'>Ok then, let's get you sorted, please check your email</p>";
                            }
                        } echo '
                        <form action="function.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your email" norequired>
                            </div>
                            <div class="hero-cta"><button type="submit" class="button button-primary" name="reset">Reset</button><a class="button" href="login.php">Login?</a></div>
                        </form>
                        
                    </div>
                    <div class="hero-figure anime-element">
                        <svg class="placeholder" width="528" height="396" viewBox="0 0 528 396">
                            <rect width="528" height="396" style="fill:transparent;" />
                        </svg>
                        <div class="hero-figure-box hero-figure-box-01" data-rotation="45deg"></div>
                        <div class="hero-figure-box hero-figure-box-02" data-rotation="-45deg"></div>
                        <div class="hero-figure-box hero-figure-box-03" data-rotation="0deg"></div>
                        <div class="hero-figure-box hero-figure-box-04" data-rotation="-135deg"></div>
                        <div class="hero-figure-box hero-figure-box-05"></div>
                        <div class="hero-figure-box hero-figure-box-06"></div>
                        <div class="hero-figure-box hero-figure-box-07"></div>
                        <div class="hero-figure-box hero-figure-box-08" data-rotation="-22deg"></div>
                        <div class="hero-figure-box hero-figure-box-09" data-rotation="-52deg"></div>
                        <div class="hero-figure-box hero-figure-box-10" data-rotation="-50deg"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>';
    }
?>

<?php
    include 'footer.php';
?>