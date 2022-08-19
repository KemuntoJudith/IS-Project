<?php include('partials.front/menu.php'); ?>

    <!--Registration Form Starts Here -->
    <section class="request-service">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to submit your registration request.</h2>
            
            <p class= "text-center" style='color:darkblue;'><b>Listing is subject to verification of your certificates and a practical interview</b></p>
            

            <form action="" method="POST" class="request">
                
                <fieldset>
                    <legend>Your Details</legend>
                    <div class="request-label">Full Name</div>
                    <input type="text" name="fullname" placeholder="E.g. Jane Doe" class="input-responsive" required>

                    <div class="request-label">Phone Number</div>
                    <input type="tel" name="phonenumber" placeholder="E.g. 254xxxxxx" class="input-responsive" required>

                    <div class="request-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. janedoe@gmail.com" class="input-responsive" required>

                    <div class="request-label">Skills</div>
                    <textarea name="skills" rows="10" placeholder="E.g. I have 5 years of plumbing experience...., I have a certificate from the Technical College of...in Carpentry...etc "
                     class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Complete Request" class="btn btn2-primary">
                </fieldset>
            </form>

            <?php 
            //check whether submit button is clicked.
            if(isset($_POST['submit'])) {
                //get all the details entered by client

                $fullname = $_POST['fullname'];
                $phonenumber = $_POST['phonenumber'];
                $email = $_POST['email']; 
                $skills = $_POST['skills'];


                //save the registration details in the database
                $sql2 = "INSERT INTO registrations SET
                fullname = '$fullname',
                phonenumber = '$phonenumber',
                email = '$email',
                skills = '$skills'
                ";

                //echo $sql2; die();

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true) {
                    //query executed and request saved
                    $_SESSION['register'] = "<div class='success text-center'>Registration Submitted Successfully.</div>";
                    header('location:'.HOMEURL);

                }
                else {
                    //failed to save request
                    $_SESSION['register'] = "<div class='error text-center'>Submission Not Seccessful!</div>";
                    header('location:'.HOMEURL);
                }
            }
            ?>
        </div>
    </section>
    <!--Registration Form Ends Here -->

    <?php include('partials.front/footer.php'); ?>

</body>
</html>