<?php 
include("check.php");
include("header.php");
include("connect.php");
?>
<html>  
    <head>  
       <style type="text/css">
  .required:after{
    content:"*";
    color: red;
    padding: 5px;
  }
</style>
        <title></title>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="http://parsleyjs.org/dist/parsley.js"></script>

  <link rel="stylesheet" type="text/css" href="parsley-style.css">
    </head>
 
    <body>  
        <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold mb-0" style="color:#191978;">Add Store</h3>
                </div>
                <div>
                      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home">Home</a></li>
    <li class="breadcrumb-item"><a href="storelist">storelist</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Store</li>
  </ol>
</nav>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 grid-margin">
             <div class="card">
                <div class="card-body">
 
     <form id="validate_form" >
      
      <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <label class="required">Name</label>
            <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter id" />
         <input type="text" name="name" id="name" placeholder="Enter Name" data-parsley-length="[3, 20]" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" class="form-control"/>
        </div>
       </div>

       <div class="col-md-6">
        <div class="form-group">
         <label class="required">Contact</label>
         <input type="text" name="contact_number" id="contact_number" maxlength="10" placeholder="Mobile" required required data-parsley-length="[10,10]" data-parsley-pattern="^[0-9]+$" data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>
      </div>

       <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <label class="required">Email</label>
         <input type="email" name="email" id="email" placeholder="Enter Email" data-parsley-length="[3, 50]" required data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>

       <div class="col-md-6">
        <div class="form-group">
         <label class="required">GST</label>
         <input type="text" name="gst" id="gst" placeholder="Enter GST number" maxlength="15" required required data-parsley-length="[15,15]" data-parsley-trigger="keyup" class="form-control" />
        </div>
       </div>
      </div>

       <div class="row">
       <div class="col-md-6">
      <div class="form-group">
       <label class="required">Location</label>
       <input type="text" name="location" id="location" placeholder="Location" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" class="form-control" />
      </div></div>

 <div class="col-md-6">
      <div class="form-group">
       <label class="required">Status</label>
        <select class="form-select" name="status" id="status" required data-parsley-trigger="keyup" aria-label="Default select example">
  <option disabled></option>
  <option value="1">Active</option>
  <option value="2">Inactive</option>
      </select></div></div></div>
 
 <div class="row">
  <div class="col-md-6">
      <div class="form-group">
       <label class="required">start_year</label>
       <input type="date" name="start_year" id="start_year" placeholder="start_year" required data-parsley-type="end_year" data-parsley-trigger="keyup" class="form-control" />
      </div>
    </div>
     <div class="col-md-6">
      <div class="form-group">
       <label class="required">end_year</label>
       <input type="date" id="end_year" name="end_year" placeholder="end_year" required data-parsley-type="end_year" data-parsley-trigger="keyup" class="form-control" />
      </div>
    </div></div>
      <div class="form-group">
       <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success text-white" />
         <a href="home" class="btn btn-default" role="button">Cancel</a>
      </div>
     </form>
    </div>
   </div>  
  </div>
    </body>  
</html>  


<script>  
$(document).ready(function(){  
    $('#validate_form').parsley();
 
 $('#validate_form').on('submit', function(event){
  event.preventDefault();
  if($('#validate_form').parsley().isValid())
  {
   // alert($(this).serialize()); 
   $.ajax({
    url:"action.php",
    method:"POST",
    data:$(this).serialize(),
    beforeSend:function(){
     $('#submit').attr('disabled','disabled');
     $('#submit').val('Submitting...');
    },
    success:function(data)
    {
     $('#validate_form')[0].reset();
     $('#validate_form').parsley().reset();
     $('#submit').attr('disabled',false);
     $('#submit').val('Submit');
     alert(data);
    }
   });
  }
 });
});  
</script>