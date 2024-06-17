<?php
require_once('../Account/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Profile</title>
    <link rel="stylesheet" href="government.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="header">
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
            <h1>West Java Provincial Government</h1>
            <p>The government in West Java consists of provincial, regency/city, and district levels, 
                led by a governor, regents/mayors, and sub-district heads. <br> Local government focuses on 
                developing education, healthcare, infrastructure, and the economy to improve the quality 
                of life for the community.</p>
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
    
    <!-- tentang kami -->
    <div class="about-us">
        <img src="/govspeak 2/images/pic-1.svg" alt="">
        <div class="text">
            <p>About Us</p>
            <h1>Getting to Know the <br> Government in West Java</h1>
            <p id="p">The governance in West Java consists of three levels: provincial, regency/city, and sub-district. 
                It's the largest province in Indonesia, covering about 35,000 square kilometers, divided into 18 regencies 
                and 9 cities. The provincial government is led by a Governor, assisted by a Vice Governor. Each regency/city 
                is led by a Regent/Mayor, assisted by a Vice Regent/Vice Mayor. Each regency/city is further divided into 
                sub-districts, each led by a Sub-district Head.
                <br><br>
                The local government in West Java is committed to enhancing the quality of life through various development 
                programs. The provincial government focuses on education, healthcare, infrastructure, and economic development. 
                These programs are implemented collaboratively among the provincial government, regencies/cities, and the community. 
                With a spirit of cooperation and mutual assistance, the government in West Java strives to create a conducive environment 
                for economic growth and community welfare.</p>
        </div>
    </div>

    <!-- principle -->
    <div class="principle">
        <p>Principle</p>
        <h1>Our Principle</h1>    
        <div class="box-besar">
            <div class="box">
                <h2>Decentralized Governance Approach</h2>
                <p>The government in West Java follows a decentralized approach, allowing autonomy for provinces, 
                    regencies/cities, and sub-districts to manage their own affairs according to local needs.</p>
            </div>
            <div class="box">
                <h2>Active Community Participation</h2>
                <p>Local governments in West Java prioritize community participation in decision-making and development 
                    programs. By actively involving the community, governments can better understand their needs and aspirations, 
                    ensuring the success of development initiatives.</p>
            </div>
            <div class="box">
                <h2>Enhanced Collaboration and Partnerships</h2>
                <p>West Java's governments and communities collaborate closely to plan, implement, and monitor 
                    development programs, partnering with stakeholders to boost economic growth and community welfare.</p>
            </div>
        </div>
    </div>

    <!-- quotes -->
    <div class="quotes">
        <div class="kutip-kiri">
            <img src="/govspeak 2/images/kutip-kiri.svg" alt="">
        </div>
        <h1>Empowering Communities, Inspiring Change,<br>Building a Better Tomorrow</h1>
        <div class="kutip-kanan">
            <img src="/govspeak 2/images/kutip-kanan.svg" alt="">
        </div>
    </div>

    <!-- konten -->
    <div class="konten">
        <div class="text">
            <div class="sub-judul">
                <p>Galery</p>
                <h1>Explore the concrete <br> steps taken by our <br> government</h1>
            </div>
            <p>From implementing innovative policies to investing in key sectors, our government is 
                committed to delivering tangible results and building a brighter future for all.</p>
        </div>

        <div class="box-besar">
            <div class="box-1">
                <img src="/govspeak 2/images/gal-1.svg" alt="" id="gal-1">
                <img src="/govspeak 2/images/gal-2.svg" alt="" id="gal-2">
            </div>
            <div class="box-2">
                <div class="box-2-1">
                    <img src="/govspeak 2/images/gal-3.svg" alt="" id="gal-3">
                    <img src="/govspeak 2/images/gal-4.svg" alt="" id="gal-4">
                </div>
                <div class="box-2-2">
                    <img src="/govspeak 2/images/gal-5.svg" alt="" id="gal-5">
                    <div class="box-3">
                        <img src="/govspeak 2/images/gal-6.svg" alt="" id="gal-6">
                        <div class="box-3-1">
                            <img src="/govspeak 2/images/gal-7.svg" alt="" id="gal-7">
                            <img src="/govspeak 2/images/gal-8.svg" alt="" id="gal-8">
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- video -->
    <div class="video">
        <video controls src="/govspeak 2/images/video.mp4"></video>
        <h1>What the Government Says</h1>
        <p>Government actions aim to provide effective solutions to complex challenges, focusing <br>
            on transparency, community participation, and improving public services.</p>
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