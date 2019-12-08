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
            <div class="button">
                <label for="profile-pic-upload" class="button">Upload Image</label>
                <input id="profile-pic-upload" type="file" style="visibility:hidden;">
            </div>
        </div>
        <div class="account-details">
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
                <button id="update-profile" type="button">Confirm</button>
            </div>
        </div>
    </div>
    <div class="description">
        <div><label for="description">Description</label></div> 
        <div><textarea id="about" name="description" rows="5"></textarea></div> 
    </div>
</div>
