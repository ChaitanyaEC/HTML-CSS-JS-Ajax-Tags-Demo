<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Contatct Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">

    <style>
    #loading-img{
    display:none;
    }
    .response_msg{
    margin-top:10px;
    background:#E5D669;
    color:#ffffff;
    width:250px;
    padding:3px;
    display:none;
    }
    </style>
  </head>

  <body>
    <div class="sidenav">
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="Contact.php">Contact</a>
    </div>
    <div class="content">
      <div class="row">
          <div class="col-md-8">
            <h1><img src="img/Inquiry.png" width="50%">Contact Us</h1>
            <form name="contact-form" action="" method="post" id="contact-form">
              <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" class="form-control" name="your_name" placeholder="Name" required>
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="your_email" placeholder="Email" required>
              </div>
              <div class="form-group">
              <label for="Phone">Phone</label>
              <input type="text" class="form-control" name="your_phone" placeholder="Phone" required>
              </div>
              <div class="form-group">
              <label for="comments">Comments</label>
              <textarea name="comments" class="form-control" rows="3" cols="28" rows="5" placeholder="Comments"></textarea> 
              </div>
              <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
              <img src="img/loading.gif" id="loading-img">
            </form>
            <div class="response_msg"></div>
          </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
      $("#contact-form").on("submit",function(e){
      e.preventDefault();
      if($("#contact-form [name='your_name']").val() === '')
      {
        $("#contact-form [name='your_name']").css("border","1px solid red");
      }
      else if ($("#contact-form [name='your_email']").val() === '')
      {
        $("#contact-form [name='your_email']").css("border","1px solid red");
      }
      else
      {
        $("#loading-img").css("display","block");
        var sendData = $( this ).serialize();
        $.ajax({
        type: "POST",
        url: "get_response.php",
        data: sendData,
        success: function(data){
        $("#loading-img").css("display","none");
        $(".response_msg").text(data);
        $(".response_msg").slideDown().fadeOut(3000);
        $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
      }
      });
      }
      });
      $("#contact-form input").blur(function(){
      var checkValue = $(this).val();
      if(checkValue != '')
      {
        $(this).css("border","1px solid #eeeeee");
      }
      });
      });
    </script>
  </body>
</html>
