<?php include('partials.front/menu.php'); ?>

    <!-- Search Section Starts Here -->
    <section class="search text-center">
        <div class="container">

            <form action="<?php echo HOMEURL; ?>handyman-search.php" method="POST">
                <input type="search" name="search" placeholder="Search">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>

    </section>
    <!-- Search Section Ends Here -->


    <!-- Handymen List Section Starts Here -->
    <section class="handymen-list">
        <div class="container">
            <h2 class="text-center">Listed handymen</h2>

            <?php 
            
            //display all the listed handymen
            $sql = "SELECT * FROM handymen";

            $res=mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0) {
                //handymen listed
                while($row=mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $phone = $row['phone'];
                    $specialty = $row['specialty'];
                    $city = $row['city'];
                    ?>

                    <div class="handymen-box">
                            <div class="handyman-img">
                                <img src="images/logo.jpg" alt="find-a-fundi-logo" class="img-responsive img-curve">
                            </div>

                            <div class="handyman-desc">
                                <h4><?php echo $firstname; ?></h4>
                                <p class="handyman-town"><?php echo $city; ?></p>
                                <p class="handyman-info"><?php echo $specialty; ?></p>
                                <br>

                                <a href="<?php echo HOMEURL; ?>request.php?handyman_id=<?php echo $id; ?>" class="btn btn-primary">Request Service</a>
                            </div>
                    </div>
                    <?php
                }

            }
            else {
                //handymen not listed
                echo"<div class='error'>No Listed Handyman!</div>";
            }
            
            ?>


            <div class="clearfix"></div>

        </div>

    </section>
    <!--Handymen List Section Ends Here -->

    <?php include('partials.front/footer.php'); ?>

</body>
</html>