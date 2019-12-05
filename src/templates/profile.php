    <?php
        include_once('../includes/init.php');
        include_once('../actions/validSession.php');            
    ?>

    <div class="profile-container">

        <div class="profile-side-menu">
            <a href="edit_profile.php">Edit Profile</a>
            <a href="add_listings.php">Add Listings</a>
            <a href="view_listings.php">My Listings</a>
            <a href="view_rentals.php">My Rentals</a>
        </div>

        <?php
           include_once('../actions/profileAction.php');          
        ?>

        <div class="profile-info-container">
            <div class="profile-picture">
                <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909__340.png">
            </div>
            <div class="personal-details">
                <div class="name">
                    <?php echo '<h1>'.$name.'</h1>'; ?>
                </div>
                <div class="description">
                    <article>Sobrevivente da ocorrência 2018/19 da unidade curricular de Concepção e Análise de Algoritmos.</article>
                </div>
            </div>
        </div>

    </div>