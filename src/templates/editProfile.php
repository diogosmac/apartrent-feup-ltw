<?php
    include_once('../includes/init.php');
    include_once('../actions/validSession.php');
    
    include_once('../actions/profileAction.php');         
?>

<div class="edit-profile-container">
    <div class="edit-personals">
        <div class="profile-picture">
            <div class="image">
                <?php echo('<img src="'.$profile_picture.'">'); ?>
            </div>
        </div>
        <form class="account-details" action="../actions/editProfileAction.php" method="POST" enctype="multipart/form-data">
            <div class="button">
                <label for="profile_pic" class="button">Upload Image</label>
                <input id="profile_pic" type="file" style="visibility:hidden;" name="profile_pic">
            </div>
            <div class="username">
                <?php echo('<input type="text" name="username" placeholder="New Username">'); ?>
            </div>
            <div class="password">
                <input type="password" name="password" placeholder="New Password">
            </div>
            <div class="confirm-password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
            </div>
            <div class="button">
                <input id="update-profile" type="submit" value="Confirm">
            </div>
        </form>
    </div>
    <div class="description">
        <div><label for="description">Description</label></div> 
        <div><textarea id="about" name="description" rows="5"></textarea></div> 
    </div>
</div>
