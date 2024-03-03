<?php
    include 'header.php';
?>
<main>
        <section class="hero">
            <div class="container">
                <div class="hero-inner">
                    <div class="hero-copy">
                        <h1 class="hero-title mt-0">Login</h1>

                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "empInput"){
                                    echo "<p class='berr'>Fill in all fields!</p>";
                                }else if($_GET["error"] == "unonexist"){
                                    echo "<p class='berr'>Account doesn't exist, please try signing up</p>";

                                }
                                else if($_GET["error"] == "wrongpsw"){
                                    echo "<p class='berr'>Wrong password, if you cant remember it, please try to reset your password.</p>";

                                }else if($_GET["error"] == "none2"){
                                    echo "<p class='gerr'>Congratulations, password has been changed successfully, please try logging in.</p>";

                                }
                            }
                        ?>
                        <form action="function.php" method="post">
                            <div class="form-group">
                                <label for="email">User Name</label>
                                <input class="form-control form-control-lg" type="text" name="uname" placeholder="Enter your email" norequired>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-lg" type="password" name="psw" placeholder="Enter your password" norequired>
                            </div>
                            <div class="hero-cta"><button type="submit" class="button button-primary" name="login">Login</button><a class="button" href="signup.php">Signup?</a><a class="button" href="reset.php">Forgot Password?</a></div>
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
    </main>
<?php
    include 'footer.php';
?>