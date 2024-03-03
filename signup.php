<?php
    include 'header.php';
?>
<main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">Signup</h1>
                            
                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "stmtfailed"){
                                    echo "<p class='berr'>Were experiencing some minor issues with the server</p>";
                                }
                            else if($_GET["error"] == "emptyinput"){
                                echo "<p class='berr'>Please fill in all fields, thankyou</p>";
                            }
                            else if($_GET["error"] == "invaliduname"){
                                echo "<p class='berr'>Please enter a valid username, only letters and numbers allowed</p>";
                            }
                            else if($_GET["error"] == "invalidemail"){
                                echo "<p class='berr'>Please enter a valid email</p>";
                            }
                            else if($_GET["error"] == "pswnotmatch"){
                                echo "<p class='berr'>Passwords do not match</p>";
                            }
                            else if($_GET["error"] == "unameexists"){
                                echo "<p class='berr'>The Account you're trying to register already exists</p>";
                            }
                            else if($_GET["error"] == "none"){
                                echo "<p class='gerr'>Signup successful, please try logging in</p>";
                            }
                        }
                        ?>
	                        <form action="function.php" method="post">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input class="form-control form-control-lg" type="text" name="uname" placeholder="Enter your name" norequired>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control form-control-lg" type="text" name="email" placeholder="Enter your email" norequired>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control form-control-lg" type="password" name="psw" placeholder="Enter your password" norequired>
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input class="form-control form-control-lg" type="password" name="cpsw" placeholder="Confirm your password" norequired>
                                </div>
                                <div class="hero-cta"><button type="submit" class="button button-primary" name="signup">Signup</button><a class="button" href="login.php">Login?</a></div>
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