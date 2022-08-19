<?php include('partials.front/menu.php'); ?>

    <!-- Services Section Starts Here -->
    <section class="services">
        <div class="container">
            <h2 class="text-center">Services</h2>

            <?php 
            //display all the services that are active and featured
            $sql = "SELECT * FROM services WHERE active='Yes'";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0) {

                //services are available. retrieve the values
                while($row=mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $servicetype = $row['servicetype'];
                    $imagename = $row['imagename'];
                    ?>

                    <a href="<?php echo HOMEURL; ?>services-handymen.php?service_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                if($imagename="") {
                                    //image not available
                                    echo"<div class='error'>Image not found!</div>";
                                }
                                else {
                                    //image available
                                    ?>
                                        <img src="<?php echo HOMEURL; ?>images/logo.jpg<?php echo $imagename; ?>" class="img-responsive img-curve">
                                    <?php
                                    
                                }
                                
                            
                            ?>

                                <h3 class="float-text float white"><?php echo $servicetype; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else {
                //services not available
                echo"<div class='error'>Service not found!</div>";
            }
            
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Services Section Ends Here -->


    <?php include('partials.front/footer.php'); ?>

</body>
</html>