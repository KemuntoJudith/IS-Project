<?php include('partials.front/menu.php'); ?>

<?php 

//check whether id is passed
if(isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];

    //get service type based on the service_id
    $sql = "SELECT servicetype FROM services WHERE id=$service_id";

    $res = mysqli_query($conn, $sql);

    //get the values from the database
    $row = mysqli_fetch_assoc($res);

    $service_type = $row['servicetype']; 

}
else {
    //redirect to homepage
    header('location:'.HOMEURL);
}

?>

    <!-- Search Section Starts Here -->
    <section class="search text-center">
        <div class="container">
            
            <h2>Handymen Listed in <a href="#" class="text-white">"<?php echo $service_type; ?>"</a></h2>

        </div>
    </section>
    <!--Search Section Ends Here -->



    <!-- Handymen list Section Starts Here -->
    <section class="handymen-list">
        <div class="container">
            <h2 class="text-center">Explore handymen</h2>

            <?php 
            //sql query to list based on selected service
            $sql2 = "SELECT * FROM handymen WHERE id=$service_id";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);

            if($count2>0) {

                //handymen are available
                while($row2=mysqli_fetch_assoc($res2)) {

                    $firstname = $row2['firstname'];
                    $lastname = $row2['lastname'];
                    $phone = $row2['phone'];
                    $specialty = $row2['specialty'];
                    $city = $row2['city'];

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
                //handymen not available
                echo "<div class='error'>Handymen Not Available!</div>";
            }
            
            ?>

            <div class="clearfix"></div>

        </div>

    </section>
    <!-- Handymen list Section Ends Here -->

    <?php include('partials.front/footer.php'); ?>

</body>
</html>