    <?php
        include_once('../includes/init.php');
        include_once('../actions/validSession.php');            
    ?>

    <div class="profile-container">

        <div class="profile-side-menu">
            <a href="../pages/editProfile.php">Edit Profile</a>
            <a href="../pages/view_rentals.php">My Rentals</a>
            <a href="../pages/listings.php">My Listings</a>
            <a href="../pages/listings.php?manage=1">Manage Listings</a>
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
                    <!-- <article>Sobrevivente da ocorrência 2018/19 da unidade curricular de Concepção e Análise de Algoritmos.</article> -->
                    <?php echo '<article>'.$description.'</article>'; ?>
                </div>
            </div>
        </div>

    </div>