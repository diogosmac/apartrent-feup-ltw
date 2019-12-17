<?php
include_once('../includes/init.php');
include_once('../actions/validSession.php');
include_once('../actions/profileAction.php');
?>

<script>
    function validate(form) {
        return (document.getElementById('password').value == document.getElementById('confirm_password').value);
    }
</script>

<script src="../js/confirmPasswords.js"></script>
<script src="../js/imagePreview.js" defer></script>


<div class="edit-profile-container">
    
    <div class="profile-side-menu">
        <a href="../pages/editProfile.php">Edit Profile</a>
        <a href="../pages/viewRentals.php">My Rentals</a>
        <a href="../pages/listings.php">My Listings</a>
        <a href="../pages/listings.php?manage=1">Manage Listings</a>
    </div>

    <div class="edit-personals">
        <div class="profile-picture">
            <div class="image">
                <img id="page-picture" src=" <?php echo $profile_picture ?> ">
            </div>
        </div>
        <form class="account-details" action="../actions/editProfileAction.php" method="POST" enctype="multipart/form-data" onsubmit='return checkMatch();'>
            <div id="image-upload" class="button">
                <label for="profile_pic" class="button">Upload Image</label>
                <input id="profile_pic" type="file" style="visibility:hidden;" name="profile_pic">
            </div>
            <div class="username">
                <input type="text" name="username" placeholder="New Username" pattern='^(?=. {5,12}$)(?!.*[._-] {2})[a-zA-Z][a-zA-Z0-9._-]*[a-zA-Z0-9]$' title="A username must have between 5 and 12 characters. It cannot start nor end with special characters and those cannot appear more than once in a row">
            </div>
            <div class="password">
                <input type="password" id="password" name="password" placeholder="New Password" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,64})" 
                                         title="Password must contain at least 8 characters, with one Uppercase letter, one lowercase letter, one number and one special character." onkeyup='checkMatch();'>
            </div>
            <div class="confirm-password">
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onkeyup='checkMatch();'>
                <span id='message'></span>
            </div>
            <div class="description">
                <div><label for="description">Description</label></div>
                <div><textarea id="description" name="description" rows="5"></textarea></div>
            </div>
            <div class="button">
                <input id="update-profile" type="submit" value="Confirm" name="edit_profile_button">
            </div>
        </form>
    </div>
</div>
