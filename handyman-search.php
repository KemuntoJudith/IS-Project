<?php include('partials.front/menu.php'); ?>

    <!--search Section Starts Here -->
    <section class="search text-center">
        <div class="container">

        <?php 
                //get the search keyword 
                //secure the code with mysqli_real_escape_string 
                //to prevent sql injection by treating special characters as strings
                $search = mysqli_real_escape_string($conn, $_POST['search']); 
        
        ?>
            
            <h2>Handymen on your search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!--search Section Ends Here -->



    <!-- Handymen List Section Starts Here -->
    <section class="handymen-list">
        <div class="container">
            <h2 class="text-center">Handymen List</h2>

            <?php

                //sql query to get results based on search
                $sql = "SELECT * FROM handymen WHERE specialty LIKE '%$search%'  OR city LIKE '%$search%'";

                $res = mysqli_query($conn, $sql); 

                $count = mysqli_num_rows($res);

                if($count>0) {

                    //service available
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

                            <a href="<?php echo HOMEURL; ?>request.php?handyman_id=<?php echo $specialty; ?>" class="btn btn-primary">Request Service</a>
                        </div>
            </div>

                        <?php
                    }
                }
                else {
                    //service not available
                    echo "<div class='error'>Handyman Not Available!</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!--Handymen List Section Ends Here -->

    <?php include('partials.front/footer.php'); ?>

</body>
</html>