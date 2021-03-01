<?php
$active='Contact';
  include("includes/header.php");
?>
	<div id="content">
		<div class="container">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						Contact Us
					</li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						<center>
							<h2>Feel free to Content Us</h2>
							<p class="text-muted">
								If You have any questions,feel free to contact us Our Customer Service work <strong>24/7</strong>
							</p>
						</center>
						<form action="contact.php" method="post">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email" required>
							</div>
							<div class="form-group">
								<label>Subjet</label>
								<input type="text" class="form-control" name="subjet" required>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" name="message"></textarea>
							</div>
							<div class="text-center">
								<button class="btn btn-primary" type="submit" name="submit">
								<i class="fa fa-user-md"></i> Send Message
								</button>
							</div>
						</form>
						<?php
							if(isset($_POST['submit'])){
								$sender_name=$_POST['name'];
								$sender_email=$_POST['email'];
								$sender_subjet=$_POST['subjet'];
								$sender_message=$_POST['message'];
								$receiver_email="exaucemwililikwa@gmail.com";
								mail($receiver_email,$sender_name,$sender_subjet,$sender_message,$sender_email);
								////Auto reply to sender whith this
								$email=$_POST['email'];
								$subjet="welcome to my website";
								$msg="Thanks for sending us message. ASP we will reply your message";
								$from="exaucemwililikwa@gmail.com";
								mail($email,$subjet,$msg,$from);
								echo"<h2 align='center'> Your Message has sent successfully </h2>";
							}
						?>
					</div>
				</div>		
			</div>
			</div>
	</div>
	 <?php
        include("includes/footer.php");
       ?>
        <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
<script src="js\bootstrap.min.js"></script>
<script src="js\jquery.js"></script>
</body>