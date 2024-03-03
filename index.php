
<?php
$queryParams = $_GET;

// Check if a specific string exists in the URL
if (isset($queryParams['signup.php'])) {
    include 'signup.php';
} else if (isset($queryParams['login'])) {
include_once 'login.php';
} else if(isset($queryParams['reset'])) {
    include_once 'reset.php';
}
else {
    include("header.php");
    // Execute a set of commands if 'specific_string' is found in the URL
    // Your commands here...
    if(isset($_SESSION["uname"])){
        if(isset($_GET["search"])){
            echo '     
            <main>
                    <section class="hero">
                        <div class="container">
                            <div class="hero-inner">
                                <div class="hero-copy nav">
                                <h1 class="hero-title mt-0">'.$_SESSION["uname"].': Search</h1>

                                    <form method="post">
                                        <div class="form-group">
                                            <label for="name">Search</label>
                                            <input class="form-control form-control-lg search" type="text" name="search" placeholder="eg. '.$_SESSION["uname"].'" norequired>
                                            <button type="submit" class="button button-primary" name="sesub">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="hero-figure anime-element">
                                <h1>Search Results</h1>
                                    <div class="results">
                                        ';
                                        if (isset($_POST['search'])) {
                                            $search = $_POST['search'];
                                            $sql = "SELECT * FROM account WHERE uname LIKE '%$search%'";
                                            $result = mysqli_query($conn, $sql);
                                            $queryResult = mysqli_num_rows($result);
                                        
                                            if ($queryResult > 0) {
                                                // Display search results if found
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    // Display details of the found user
                                                    echo "<div class='user-box'>
                                                        <h3>Username: " . $row['uname'] . "</h3>
                                                        <p>Email: " . $row['uemail'] . "</p>
                                                        <p>Registration Number: " . $row['regno'] . "</p>
                                                        <p>Phone Number: " . $row['phoneno'] . "</p>
                                                        <p>Address: " . $row['addr'] . "</p>
                                                    </div>";
                                                    // Your code to display user details
                                                }
                                            } else {
                                                // If no results found for the search term
                                                echo "User not found!";
                                            }
                                        } else {
                                            echo "please search for a user";
                                        }'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
        
                    
                ';
        }else {
            echo '
            <main>
                    <section class="hero">
                        <div class="container">
                            <div class="hero-inner">
                                <div class="hero-copy nav">
                                <h1 class="hero-title mt-0">Profile: '.$_SESSION["uname"].'</h1>';
        
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
                                            echo "<p class='gerr'>Update successful</p>";
                                        }
                                    }
                                    echo '
                                    <form action="function.php" method="post">
                                        <div class="form-group">
                                            <label for="name">Registration Number</label>
                                            <input class="form-control form-control-lg" type="text" name="regno" placeholder="eg. CS/M/0000/00/00" norequired>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Phone Number</label>
                                            <input class="form-control form-control-lg" type="text" name="phoneno" placeholder="Eg. 0110003602" norequired>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Address</label>
                                            <input class="form-control form-control-lg" type="text" name="addr" placeholder="PO. Box Number" norequired>
                                        </div>
                                        <div class="hero-cta"><button type="submit" class="button button-primary" name="save">Save</button></div>
                                    </form>
                                </div>
                                <div class="hero-figure anime-element">
                                    
                                </div>
                            </div>
                        </div>
                    </section>
        
                    
                ';
        }
        include("footer.php");
    }else{
    echo '
    <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0">A login system that works</h1>
	                        <p class="hero-paragraph">Welcome to our login system, please feel free to try it out for yourself.</p>
	                        <div class="hero-cta"><a class="button button-primary" href="signup.php">Signup</a><a class="button" href="login.php">Login</a></div>
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

            <section class="features section">
                <div class="container">
					<div class="features-inner section-inner has-bottom-divider">
                        <div class="features-wrap">
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img src="dist/images/feature-icon-01.svg" alt="Feature 01">
                                    </div>
                                    <h4 class="feature-title mt-24">Safe signup</h4>
                                    <p class="text-sm mb-0">Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. A arcu cursus vitae congue mauris. Nam at lectus urna duis convallis. Mauris rhoncus aenean vel elit scelerisque mauris.</p>
                                </div>
                            </div>
							<div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img src="dist/images/feature-icon-02.svg" alt="Feature 02">
                                    </div>
                                    <h4 class="feature-title mt-24">Safe login</h4>
                                    <p class="text-sm mb-0">Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. A arcu cursus vitae congue mauris. Nam at lectus urna duis convallis. Mauris rhoncus aenean vel elit scelerisque mauris.</p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img src="dist/images/feature-icon-03.svg" alt="Feature 03">
                                    </div>
                                    <h4 class="feature-title mt-24">Smooth Password reset</h4>
                                    <p class="text-sm mb-0">Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. A arcu cursus vitae congue mauris. Nam at lectus urna duis convallis. Mauris rhoncus aenean vel elit scelerisque mauris.</p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img src="dist/images/feature-icon-04.svg" alt="Feature 04">
                                    </div>
                                    <h4 class="feature-title mt-24">Search for different accounts</h4>
                                    <p class="text-sm mb-0">Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. A arcu cursus vitae congue mauris. Nam at lectus urna duis convallis. Mauris rhoncus aenean vel elit scelerisque mauris.</p>
                                </div>
                            </div>
							<div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img src="dist/images/feature-icon-05.svg" alt="Feature 05">
                                    </div>
                                    <h4 class="feature-title mt-24">Email OTP Accessibility</h4>
                                    <p class="text-sm mb-0">Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. A arcu cursus vitae congue mauris. Nam at lectus urna duis convallis. Mauris rhoncus aenean vel elit scelerisque mauris.</p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon">
										<img src="dist/images/feature-icon-06.svg" alt="Feature 06">
                                    </div>
                                    <h4 class="feature-title mt-24">Efficient User Access</h4>
                                    <p class="text-sm mb-0">Fermentum posuere urna nec tincidunt praesent semper feugiat nibh. A arcu cursus vitae congue mauris. Nam at lectus urna duis convallis. Mauris rhoncus aenean vel elit scelerisque mauris.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

			<section class="cta section">
				<div class="container">
					<div class="cta-inner section-inner">
						<h3 class="section-title mt-0">Try it out now</h3>
						<div class="cta-cta">
							<a class="button button-primary button-wide-mobile" href="signup.php">Signup</a>
						</div>
					</div>
				</div>
			</section>
        </main>
        ';
        include("footer.php");
    }
}
?>