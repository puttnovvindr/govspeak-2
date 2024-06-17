<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['user_id'])) {
    // Jika pengguna sudah login
    $isLoggedIn = true;
    $userName = $_SESSION['user_name']; // Ganti dengan sesuai field yang Anda simpan pada session
} else {
    // Jika pengguna belum login
    $isLoggedIn = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../Homepage/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <img src="/govspeak 2/images/logo.svg" alt="">
                <h3>Govspeak</h3>
            </div>
            <div class="menu">
                <a href="../Homepage/homepage.php" id="a">Homepage</a>
                <a href="../Artikel/artikel.php" id="a">Articles</a>
                <a href="../Forum/index.php" id="a">Forum</a>
                <a href="../Goverment/government.php" id="a">Government Profile</a>
                <?php if ($isLoggedIn) : ?>
                    <!-- Jika user sudah login, tampilkan nama user dan tombol Profile -->
                    <div class="profile-menu">
                        <div class="dropdown">
                            <button class="dropbtn" id="profileBtn"><i class="fas fa-user-circle"></i></button>
                            <div class="dropdown-content" id="profileDropdown">
                                <div>
                                    <img src="../images/user.svg" alt="">
                                    <a href="#" id="openEditProfile">Edit Profile</a>
                                </div>
                                <div>
                                    <img src="../images/logout.svg" alt="">
                                    <a href="../Account/logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- Tombol Sign Up -->
                    <div class="signup-button">
                        <a href="../Account/signup.php">Sign Up</a>
                    </div>
                <?php endif; ?>


            </div>
        </div>

        <div class="judul">
            <h1>Your Complaints, <br> Our Change Together</h1>
            <p>Each of your complaints is a step towards change. Your voice shapes our future <br> together. Because together, change is our responsibility.</p>
        </div>

    </div>
    
    <div class="container-2">
        <div class="white-box" id="dynamic-form"></div>
    </div>

    <!-- Modal Edit Profile -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Profile</h2><br>
            <form action="../Account/update_profile.php" method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your fullname">
                <span id="nameError" class="error-message"></span><br>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your new email">
                <span id="emailError" class="error-message"></span><br>


                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your new password">
                <span id="passwordError" class="error-message"></span><br>

                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var profileBtn = document.getElementById('profileBtn');
            var profileDropdown = document.getElementById('profileDropdown');

            profileBtn.addEventListener('click', function(event) {
                event.stopPropagation();
                profileDropdown.classList.toggle('show');
            });

            window.onclick = function(event) {
                if (!event.target.matches('#profileBtn')) {
                    var dropdowns = document.getElementsByClassName('dropdown-content');
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        });

        // Script JavaScript untuk menangani tampilan modal edit profile
        var modal = document.getElementById('editProfileModal');
        var profileLink = document.getElementById('openEditProfile');
        var closeBtn = document.getElementsByClassName("close")[0];

        profileLink.onclick = function() {
            modal.style.display = "block";
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="homepage.js"></script>
    
    <!-- about-us -->
    <div class="about-us">
        <p>About Us</p>
        <h1>About Govspeak</h1>    
        <div class="box-besar">
            <div class="box">
                <h2>Facilitating Efficient Complaint Submission</h2>
                <p>Providing an easily accessible channel for citizens 
                    to submit their complaints quickly and efficiently</p>
            </div>
            <div class="box">
                <h2>Facilitating Efficient Complaint Submission</h2>
                <p>Facilitating efficient complaint submission by offering a 
                    convenient channel for citizens to lodge their concerns promptly</p>
            </div>
            <div class="box">
                <h2>Promoting Open Dialogue for Progress</h2>
                <p>Promoting open and ongoing dialogue among stakeholders 
                    to advance common interests in national development</p>
            </div>
        </div>
    </div>

    <!-- government -->
    <div class="government">
        <img src="/govspeak 2/images/pic-1.svg" alt="">
        <div class="text">
            <p>Government</p>
            <h1>Getting to Know Our <br> Government Profile</h1>
            <p id="p">Our government is committed to transparency, accountability, and justice. 
                We aim to provide the best services to all citizens, address challenges, and build 
                a better future through progressive policies and collaboration with the community</p>
            <button><a href="../Goverment/government.php">See More</a></button>
        </div>
    </div>

    <!-- statistik -->
    <div class="statistik">
        <div class="box">
            <p>User</p>
            <h1>888 +</h1>
        </div>
        <div class="box">
            <p>Submission</p>
            <h1>562 +</h1>
        </div>
        <div class="box">
            <p>Respons</p>
            <h1>231 +</h1>
        </div>
        <div class="box">
            <p>Resolution</p>
            <h1>129 +</h1>
        </div>
    </div>

    <!-- about-tim -->
    <div class="about-tim">
        <div class="text">
            <h1>Explore the concrete <br> steps taken by our <br> government</h1>
            <p>From implementing innovative policies to investing in key sectors, our government is 
                committed to delivering tangible results and building a brighter future for all.</p>
        </div>

        <div class="container">
            <div class="box">
                <img src="/govspeak 2/images/tim-1.svg" alt=""><br>
                <img src="/govspeak 2/images/tim-2.svg" alt=""><br>  
            </div>
            <div class="box">
                <img src="/govspeak 2/images/tim-3.svg" alt=""><br>
                <img src="/govspeak 2/images/tim-4.svg" alt=""><br>
                <img src="/govspeak 2/images/tim-5.svg" alt=""><br>
            </div>
            <div class="box">
                <img src="/govspeak 2/images/tim-6.svg" alt=""><br>
                <img src="/govspeak 2/images/tim-7.svg" alt=""><br>
            </div>
        </div>
    </div>

     <!-- video -->
     <div class="video">
        <video controls src="/govspeak 2/images/video.mp4"></video>
        <h1>What the Government Says</h1>
        <p>Government actions aim to provide effective solutions to complex challenges, focusing <br>
            on transparency, community participation, and improving public services.</p>
    </div>

     <!-- faq -->
     <div class="wrapper">
        <div class="text">
            <p>FAQ</p>
            <h1>Frequently Asked Questions about Complaint Forms</h1>
        </div>

        <div class="faq active">
            <button class="accordion">
                How do I submit a complaint through this website?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>To submit a complaint, you need to create an account first. After logging in, click the "Submit Complaint" 
                    button on the homepage, fill out the provided form with the required information, and submit your complaint. 
                    You will receive a ticket number to track the status of your complaint.
                </p>
            </div>
        </div>

        <div class="faq active">
            <button class="accordion">
                What types of complaints can be submitted through this website?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>You can submit various types of complaints related to public services, such as infrastructure, health, 
                    education, security, government administration, environment, and other social services. Make sure to 
                    select the appropriate category when filling out the complaint form.
                </p>
            </div>
        </div>

        <div class="faq active">
            <button class="accordion">
                How long does it take to get a response to my complaint?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
               <p>The response time can vary depending on the complexity of the complaint submitted. 
                However, we strive to provide an initial response within 7 business days. You can track 
                the status of your complaint using the provided ticket number.</p>
            </div>
        </div>

        <div class="faq active">
            <button class="accordion">
                Will my complaint be kept confidential?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
               <p>If you forget your password, click the "Forgot Password" button on the login page. Enter 
                the email address you used to register, and follow the instructions sent to your email to 
                reset your password.</p>
            </div>
        </div>
    </div>

    <!-- artikel -->
    <div class="artikel">
        <div class="container">
            <div class="box">
                <img src="/govspeak 2/images/ar-1.svg" alt="">
                <h2>Transforming Public Services for the Future...</h2>
                <p>From implementing advanced technology to adopting best practices, the...<span><a href="../Artikel/detail-artikel.php?id=7"> See detail</a></span></p>
            </div>
            <div class="box">
                <img src="/govspeak 2/images/ar-2.svg" alt="">
                <h2>A Look Back at Government Actions...</h2>
                <p>By prioritizing strategic projects and implementing investment-friendly policies, ...<span><a href="../Artikel/detail-artikel.php?id=8"> See detail</a></span></p>
            </div>
            <div class="box">
                <img src="/govspeak 2/images/ar-3.svg" alt="">
                <h2>Government and Citizen Collaboration in...</h2>
                <p>From participatory programs to public dialogue forums, the government has...<span><a href="../Artikel/detail-artikel.php?id=9"> See detail</a></span></p>
            </div>
        </div>
    </div>

     <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-logo">
                <div class="images">
                    <img src="/govspeak 2/images/logo.svg" alt="">
                    <h1>iBalance</h1>
                </div>
            <p>Your Complaints is Our Responsibility</p>
            </div>
            <div class="footer-layanan">
                <h3>Services</h3>
                <p>Complaint Form</p>
                <p>Feedback</p>
                <p>Suggestions</p>
                <p>User Guide</p>
            </div>
            <div class="footer-kontak">
                <h3>Contact</h3>
                <div class="box">
                    <img src="/govspeak 2/images/call-footer.svg" alt="">
                    <p>+14 5464 8272</p>
                </div>
                <div class="box">
                    <img src="/govspeak 2/images/message-footer.svg" alt="">
                    <p>govspeak@gmail.com</p>
                </div>
                <div class="box">
                    <img src="/govspeak 2/images/location-footer.svg" alt="">
                    <p>Tower 192, Jakarta Selatan</p>
                </div>
            </div>
            <div class="footer-tautan">
                <h3>Others</h3>
                <a href="">Privacy Policy</a>
                <a href="">Terms of Use</a>
            </div>
        </div>
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for(i = 0; i < acc.length; i++){
            acc[i].addEventListener("click", function
            (){
                this.classList.toggle("active");
                var pannel = this.nextElementSibling;

                if(pannel.style.display === "block"){
                    pannel.style.display = "none"
                }else{
                    pannel.style.display = "block"
                }
            })
        }
    </script>
</body>
</html>
