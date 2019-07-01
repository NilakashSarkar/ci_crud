
<?php 
if(!$this->session->userdata('email')){
   //$email=$this->session->userdata('email');
  redirect("Login");
} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			 <div class="col-md-8  col-lg-6 m-auto">
			 	<h1 className="display-4 text-center text-muted" >HomePage</h1>
			 	<hr>
			 	<p class="">Welcome mr <?php echo $this->session->userdata('email')?></p>
			 	
<div class="py-5">
<button type="button" href="#"  class="btn btn-dark add" data-toggle="modal" data-target="#add">Add Contant</button>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
       <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  	<?php
    if (isset($data)) {
      foreach ($data as $key ) {
  ?>
    <tr>
      <th scope="row"><?php echo $key['id']?></th>
      <td><?php echo $key['firstname']?></td>
      <td><?php echo $key['lastname']?></td>
      <td><?php echo $key['email']?></td>
      <td><a data-id="<?php echo $key['id']; ?>"  class="icon edit_class" id="update" href="#"><i class="far fa-edit"></i></a></td>
      <td><a data-id="" class="icon delete_id" id="delete" href="<?php echo base_url('user/delete/'.$key['id']); ?>"><i class="far fa-trash-alt"></i></a></td>
    </tr>
    <?php } } ?>	
  </tbody>
</table>

	
	    </div>
		</div>
	</div> 
<!--Add Model-->
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
 <form class="form" id="submit_add" method="post" action="<?php echo base_url(); ?>user/add">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        	<div class="form-group">
        		<div class="status"></div>
        	</div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" name="firstname" id="firstName">
             <span class="text-danger"><?php echo form_error('firstname'); ?></span>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control"name="lastname" id="lastName">
            <span class="text-danger"><?php echo form_error('lastname'); ?></span>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          </div>       
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary loader" value="insert">Add Contact</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!--End Add Model-->

<!--update Model-->
	<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	  <form class="form" id="update-form" method="post" action="<?php echo base_url(); ?>user/edit">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">update Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

        	<div class="form-group">
        		<div class="status"></div>
        	</div>
            <div class="form-group">
            <input type="hidden" class="form-control id"  name="id">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">First Name:</label>
            <input type="text" class="form-control firstname" id="firstname" name="firstname" >
           <div id="error1"></div>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label ">Last Name:</label>
            <input type="text" class="form-control lastname" id="lastname" name="lastname"  >
            <span class="text-danger"><?php echo form_error('lastname'); ?></span>
             <div id="error2"></div>
          </div>
         
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control email" id="email"  
            name="email">
            <span class="text-danger"><?php echo form_error('email'); ?></span>
             <div id="error3"></div>
          </div>       
     
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit loader" class="btn btn-primary update_loader" value="Update" id="updatebtn update">Update</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!--Update Model-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="public/jquery-3.3.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>
</html>
<script type="text/javascript">
	var $form='';
	var $modal='';

	$(document).on('click', '.edit_class', function(){ 
		
		var id=$(this).attr("data-id");
		//console.log(id)
		$.ajax({
			url:"<?php echo base_url()?>UserAdd/getuseredit",
			method:"GET",
			data:{id:id},
			async: false,
			dataType: 'json',           
             success:function(data){
             console.log(data)
               $modal=$('#update-modal'); 
                 $form=$modal.find('.form');

                	$form.find('.id').val(data.id);  
                     $form.find('.firstname').val(data.firstname); 
                     $form.find('.lastname').val(data.lastname); 
                     $form.find('.email').val(data.email);                 
                     $modal.modal('show'); 
             } 
		})
	})

$(document).ready(function(){
 $('#update-form').on("submit", function(event){  
  event.preventDefault();  
  if($('#firstname').val() == "")  
  {  
   //alert("Name is required"); 
 var firstName ='<span class="text-danger">Please Enter FirstName</span>';
   $('#error1').html(firstName)
  }  
  else if($('#lastname').val() == '')  
  {  
 var lastname ='<span class="text-danger">Please Enter lastName</span>';
   $('#error2').html(lastname)
  }  
  else if($('.email').val() == '')
  {  
  var email ='<span class="text-danger">Please Enter email</span>';
   $('#error3').html(email)
  }
   
  else  
  {  
   $.ajax({  
    url:"<?php echo base_url()?>UserAdd/useredit",  
    method:"POST",  
    data:$('#update-form').serialize(),  
    async: false,
    dataType: 'json',  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){  
     //$('#insert_form')[0].reset(); 
       Swal.fire({
             
              type: 'success',
              title: 'Your work has been updated',
             
              timer: 1500
            })
     $('#update-modal').modal('hide');  

     //$('#employee_table').html(data);  
    },complete:function(){

    }  
   });  
  }  
 })
})



</script>