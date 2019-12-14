<?php
    include_once('../includes/init.php');
    include_once('../actions/validSession.php');            
?>

<div class="profile-container">

    <div class="profile-side-menu">
        <a href="../pages/editProfile.php">Edit Profile</a>
        <a href="../pages/add_listings.php">Add Listings</a>
        <a href="../pages/viewListings.php">My Listings</a>
        <a href="../pages/viewRentals.php">My Rentals</a>
    </div>

    <?php
       include_once('../actions/profileAction.php');          
    ?>

    <div class="profile-info-container">
        <div class="profile-picture">
            <?php echo '<img src="'.$profile_picture.'">'; ?>
        </div>
        <div class="personal-details">
            <div class="name">
                <?php echo '<h1>'.$name.'</h1>'; ?>
            </div>
            <div class="description">
                <?php echo '<article>'.$description.'</article>'; ?>
            </div>
        </div>
    </div>

</div>
