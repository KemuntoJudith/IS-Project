<?php include('partials.front/menu.php'); ?>

<?php 
//check whether handyman id is saved
if(isset($_GET['handyman_id'])) {

    //get the handyman id and details
    $handyman_id = $_GET['handyman_id'];

    //get the details of the selected handyman
    $sql = "SELECT * FROM handymen WHERE id=$handyman_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count==1) {

        //we have data
        $row = mysqli_fetch_assoc($res);
        
        $firstname = $row['firstname'];
        $specialty = $row['specialty'];
        $city = $row['city'];
    }
    else {
        //service not available. redicrect to homepage
        header('location:'.HOMEURL);
    }
}
else {
    //redirect to homepage
    header('location:'.HOMEURL);
}
?>

    <!--search Section Starts Here -->
    <section class="request-service">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to complete your request.</h2>

            <form action="" method="POST" class="request">
                <fieldset>
                    <legend>Selected Handyman</legend>

                    <div class="handyman-img">
                        <img src="images/logo.jpg" alt="find-a-fundi-logo" class="img-responsive img-curve">
                    </div>
    
                    <div class="handyman-desc">
                        <h3><?php echo $firstname; ?></h3>
                        <input type="hidden" name="handymanfname" value="<?php echo $firstname; ?>">


                        <p class="city"><?php echo $city; ?></p>
                        <input type="hidden" name="handymancity" value="<?php echo $city; ?>">
                        

                        <div class="request-label"><?php echo $specialty; ?></div>
                        <input type="text" name="servicedesc" class="input-responsive" placeholder="E.g repair, installation, servicing...etc" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Your Details</legend>
                    <div class="request-label">Full Name</div>
                    <input type="text" name="clientname" placeholder="E.g. Jane Doe" class="input-responsive" required>

                    <div class="request-label">Phone Number</div>
                    <input type="tel" name="clientphone" placeholder="E.g. 254xxxxxx" class="input-responsive" required>

                    <div class="request-label">Email</div>
                    <input type="email" name="clientemail" placeholder="E.g. janedoe@gmail.com" class="input-responsive" required>

                    <div class="request-label">Address</div>
                    <textarea name="clientaddress" rows="10" placeholder="E.g. Street, City, County" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Complete Request" class="btn btn2-primary">
                </fieldset>

            </form>

            <?php 
            //check whether submit button is clicked.
            if(isset($_POST['submit'])) {
                //get all the details entered by client

                $handymanfname = $_POST['handymanfname'];
                $handymancity = $_POST['handymancity'];
                $servicedesc = $_POST['servicedesc']; 

                $status = "Unassigned"; //In Progress, Updated, Waiting, Resolved

                $clientname = $_POST['clientname'];
                $clientphone = $_POST['clientphone'];
                $clientemail = $_POST['clientemail'];
                $clientaddress = $_POST['clientaddress']; 

                //save the order in the database
                $sql2 = "INSERT INTO requests SET
                handymanfname = '$handymanfname',
                handymancity = '$handymancity',
                servicedesc = '$servicedesc',
                status = '$status',
                clientname = '$clientname',
                clientphone = '$clientphone',
                clientemail = '$clientemail',
                clientaddress = '$clientaddress'
                ";

                //echo $sql2; die();

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true) {
                    //query executed and request saved
                    $_SESSION['request'] = "<div class='success text-center'>Request Successfull.</div>";
                    header('location:'.HOMEURL);

                }
                else {
                    //failed to save request
                    $_SESSION['request'] = "<div class='error text-center'>Request Not Seccessful!</div>";
                    header('location:'.HOMEURL);
                }

            }
            else {

            }
            
            
            ?>

        </div>
    </section>
    <!--search Section Ends Here -->

    <?php include('partials.front/footer.php'); ?>

</body>
</html>