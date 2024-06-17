<?php
require_once('../Account/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel</title>
    <link rel="stylesheet" href="detail-artikel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
    <?php 
        include 'artikelDatabase.php'; 
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
    ?>
        <!-- navbar -->
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
                <?php if (isLoggedIn()) : ?>
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
            <h1>Detail Article</h1>
            <p>The article details page explains how the government is working to make education better. 
                It talks about the programs and <br>policies they're using to improve schools and help all 
                students. It also mentions the problems they're trying to solve and what <br>they plan  to do 
                next.Overall,  it gives a clear picture of the government's efforts to make education fair 
                and effective for everyone.</p>
        </div>
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
    
    <!-- detail-artikel -->
    <div class="detail-artikel">
        <img src="images/detail-artikel2.svg" alt=""><br><br>
        <h1><?php echo $artikel[$id-1]->name ?></h1><br>
        <p><?php echo $artikel[$id-1]->content ?>
    </div>

    <!-- artikel -->
    <div class="artikel">
        <div class="container">
            <div class="box">
                <img src="/govspeak 2/images/ar-1.svg" alt="">
                <h2>Transforming Public Services for the Future...</h2>
                <p>From implementing advanced technology to adopting best practices, the...<span><a href="detail-artikel.php?id=7"> See detail</a></span></p>
            </div>
            <div class="box">
                <img src="/govspeak 2/images/ar-2.svg" alt="">
                <h2>A Look Back at Government Actions...</h2>
                <p>By prioritizing strategic projects and implementing investment-friendly policies, ...<span><a href="detail-artikel.php?id=8"> See detail</a></span></p>
            </div>
            <div class="box">
                <img src="/govspeak 2/images/ar-3.svg" alt="">
                <h2>Government and Citizen Collaboration in...</h2>
                <p>From participatory programs to public dialogue forums, the government has...<span><a href="detail-artikel.php?id=9"> See detail</a></span></p>
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
        // Script untuk meng-handle dropdown pada profil user
        document.addEventListener("DOMContentLoaded", function () {
            var profileDropdown = document.getElementById('profileDropdown');
            var profileBtn = document.getElementById('profileBtn');

            profileBtn.addEventListener('click', function () {
                profileDropdown.classList.toggle('show');
            });

            // Tutup dropdown ketika user mengklik di luar dropdown
            window.onclick = function (event) {
                if (!event.target.matches('#profileBtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        });

        // Script untuk menangani modal edit profile
        document.addEventListener("DOMContentLoaded", function () {
            var modal = document.getElementById('editProfileModal');
            var openEditProfile = document.getElementById('openEditProfile');
            var closeBtn = document.getElementsByClassName('close')[0];

            openEditProfile.onclick = function () {
                modal.style.display = 'block';
            }

            closeBtn.onclick = function () {
                modal.style.display = 'none';
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
