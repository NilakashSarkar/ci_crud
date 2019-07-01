<!DOCTYPE html>
<html>
<head>
	<title>Login Test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			 <div class="col-md-8  col-lg-6 m-auto">
			 	<h1 className="display-4 text-center text-muted" >Login Page</h1>
			 	<hr>
			 	 <?php
        if($this->session->flashdata('error')){ ?>
         <div class="alert alert-danger text-center" style="margin-top:20px;">
            <?php echo $this->session->flashdata('error'); ?>
          </div>
          <?php
        }
       ?>


			<form method="post" action="<?php echo base_url(); ?>login/page">
		  <div class="form-group">
		    <label for="formGroupExampleInput">Email</label>
		    <input type="text" class="form-control" name="email" id="formGroupExampleInput" placeholder="Email input">
		     <span class="text-danger"><?php echo form_error('email'); ?></span>
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput2">Password</label>
		    <input type="text" class="form-control" name="password" id="formGroupExampleInput2" placeholder="Password input">
		     <span class="text-danger"><?php echo form_error('password'); ?></span>
		  </div>
		   <div class="form-group">
		     <button  class="btn btn-primary  my-3 " type="sunmit" name="login">Login</button>
		  </div>
		</form>
	    </div>
		</div>
	</div> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>