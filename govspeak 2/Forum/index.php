<?php
require_once('../Account/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="forum.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        // Function to toggle delete form visibility
        function toggleDeleteForm(questionId) {
            var deleteForm = document.getElementById('delete-form-' + questionId);
            if (deleteForm.style.display === 'none') {
                deleteForm.style.display = 'block';
            } else {
                deleteForm.style.display = 'none';
            }
        }

        // Function to toggle comment form visibility
        function toggleCommentForm(questionId) {
            var commentForm = document.getElementById('comment-form-' + questionId);
            if (commentForm.style.display === 'none') {
                commentForm.style.display = 'block';
            } else {
                commentForm.style.display = 'none';
            }
        }
    </script>
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

    <div class="box">
        <!-- create-statement -->
        <div class="cre-state">
            <form action="submit_question.php" method="POST">
                <p>Create a new question</p><br>
                <hr class="custom-line"><br>
                <div>
                    <label for="title">Title of Question</label>
                    <input type="text" id="title" name="title" placeholder="Please write the title of the question" required>
                </div><br>
                <div>
                    <label for="question">Description of Question</label>
                    <textarea name="description" id="question" placeholder="Type something here" required></textarea>
                </div><br>
                <button type="submit">Ask a question</button>
            </form>
        </div>
    
        <!-- display-questions -->
        <div class="display-questions">
            <h3>Questions</h3>
            <?php
            include 'db.php';

            $sql = "SELECT * FROM questions ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='question'>";
                    echo "<h4>" . $row['title'] . "</h4>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<div class='actions'>
                            <button onclick='toggleDeleteForm(" . $row['id'] . ")'>Delete</button>
                            <form id='delete-form-" . $row['id'] . "' class='delete-form' action='delete_question.php' method='POST' style='display:none;'>
                            <input type='hidden' name='id' value='" . $row['id'] . "'>
                            <button type='submit'>Confirm Delete</button>
                            </form>
                            <button onclick='toggleCommentForm(" . $row['id'] . ")'>Comment</button>
                        
                            <div>
                                <form id='comment-form-" . $row['id'] . "' class='comment-form' action='submit_comment.php' method='POST' style='display:none;'>
                                    <input type='hidden' name='question_id' value='" . $row['id'] . "'>
                                    <textarea name='text' placeholder='Add a comment'></textarea>
                                    <button type='submit'>Submit Comment</button>
                                </form>
                            </div>

                          </div>";

                    // Fetch comments for the question
                    $comment_sql = "SELECT * FROM comments WHERE question_id=" . $row['id'] . " ORDER BY created_at DESC";
                    $comment_result = $conn->query($comment_sql);

                    if ($comment_result->num_rows > 0) {
                        echo "<div class='comments'>";
                        while($comment_row = $comment_result->fetch_assoc()) {
                            echo "<p>" . $comment_row['text'] . "</p>";
                        }
                        echo "</div>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<p>No questions found</p>";
            }

            $conn->close();
            ?>
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

        // Function to toggle delete form visibility
        function toggleDeleteForm(questionId) {
            var deleteForm = document.getElementById('delete-form-' + questionId);
            if (deleteForm.style.display === 'none') {
                deleteForm.style.display = 'block';
            } else {
                deleteForm.style.display = 'none';
            }
        }

        // Function to toggle comment form visibility
        function toggleCommentForm(questionId) {
            var commentForm = document.getElementById('comment-form-' + questionId);
            if (commentForm.style.display === 'none') {
                commentForm.style.display = 'block';
            } else {
                commentForm.style.display = 'none';
            }
        }

        // Handling comment submission (console example)
        function submitComment(questionId) {
            var commentText = document.getElementById('comment-text-' + questionId).value;
            console.log('Submitting comment for question ID ' + questionId + ': ' + commentText);
            // Perform AJAX request or form submission here
        }

        // Example usage:
        // toggleCommentForm(1); // Replace 1 with the actual question ID
        // submitComment(1); // Replace 1 with the actual question ID

    </script>
</body>
</html>
