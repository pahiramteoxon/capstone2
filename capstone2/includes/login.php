<?php
if (isset($_REQUEST['submit'])) {
  extract($_REQUEST);
  $login = $user->check_login($email,$password);

  if ($login){ 
    header("location:home.php");  
    
  }
  else {
    echo "LOGIN FAILED";
  }   
}

?>

<div class="col-md-6 bg-dark h-100">

	<div class="row">
		<div class="col-md-12 my-5 py-3">

		</div>	
	</div>


	<div class="row">

		<div class="col-md-12">
			<div class="mt-5 mx-5">

				<form method="POST" class="form-signin" name="login">

				    <div class="input-group mb-3">
						 <input type="email" name="email" id="email" class="form-control"  aria-describedby="basic-addon1" placeholder='&#xf0e0; &nbsp; Email'>

<!-- 					   <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1">
						    	<i class="fa fa-check"></i>
						    </span>
					   </div> -->

					</div>

					<div class="input-group mb-3">
						 <input type="password" class="form-control" name="password" id="password"  placeholder='&#xf023; &nbsp; Password'  aria-describedby="basic-addon1">

<!-- 						<div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1">
						    	<i class="fa fa-check"></i>
						    </span>
					    </div> -->
					</div>

					
					<button type="submit" class="btn form-control" name="submit" id="login"> LOGIN
					</button>

				</form>
			</div>
		</div>

	</div>

</div>

<script type="text/javascript">

// validate login 
$(document).ready(function(){

var $form = $("form"),
$successMsg = $(".alert");

$.validator.addMethod("", function(value, element) {
  return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
});

  $form.validate({
  rules: {
    email: {
      required: true,
      email: true,
    },

    password: {
      required: true,
      minlength: 8
      
    }
  },

  messages: {
    email: "Please specify a valid email address",
    password: "Password atleast 8 characters"
  },

  // highlight: function(element, errorClass ,validClass){
  // 	$(element).addClass(errorClass).remove
  // }


  submitHandler: function(form) {
    form.submit();
  }

});


});

// end
</script>



