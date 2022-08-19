<?php include('partials.front/menu.php'); ?>


     <!--Search section starts-->
     <section class="search text-center">
        <div class="container">

            <form action="<?php echo HOMEURL; ?>handyman-search.php" method="POST">
                <input type="search" name="search" placeholder="Search">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>

    </section>

    <!--Search section Ends-->

    <?php 
        if(isset($_SESSION['request'])) {
            echo $_SESSION['request'];
            unset($_SESSION['request']); 
        }
    
    ?>

     <!--Services section starts-->
     <section class="services">
        <div class="container">
            <h2 class="text-center">Services</h2>

        <a href="services-handymen.php">
            <div class="box-3 float-container">
                <img src="images/electrician.jpg" alt="Electrician" class="img-responsive img-curve">

                <h3 class="float-text text-white">Electrician</h3>
            </div>
        </a>

        <a href="services-handymen.php">
            <div class="box-3 float-container">
                <img src="images/painter.jpg" alt="Painter" class="img-responsive img-curve">

                <h3 class="float-text text-white">Painter</h3>
            </div>
        </a>

        <a href="services-handymen.php">
            <div class="box-3 float-container">
                <img src="images/carpenter.jpg" alt="Carpenter" class="img-responsive img-curve">

                <h3 class="float-text text-white">Carpenter</h3>
            </div>
        </a>

            <div class="clearfix"></div>

        </div>

    </section>

    <!--Services section Ends-->

     <!--Handymen list section starts-->
     <section class="handymen-list">
        <div class="container">
            <h2 class="text-center">Explore featured handymen</h2>

            <?php 
            
            //getting listed handymen from the database
            $sql2 = "SELECT * FROM handymen LIMIT 4";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0) {
                //handyman available

                while($row=mysqli_fetch_assoc($res2)) {

                    //get all the values
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
                                <h4><?php echo $firstname ?></h4>
                                <p class="handyman-town"><?php echo $city ?></p>
                                <p class="handyman-info"><?php echo $specialty ?></p>
                                <br>

                                <a href="<?php echo HOMEURL; ?>request.php?handyman_id=<?php echo $id; ?>" class="btn btn-primary">Request Service</a>
                            </div>
                    </div>
                    <?php

                }
            }
            else {
                //handyman not available
                echo"<div class='error'>No Featured Handyman!</div>";
            }


            ?>

            <div class="clearfix"></div>
        </div>
    </section>

    <!--Handymen list section Ends-->

    <?php include('partials.front/footer.php'); ?>
    
</body>
</html>