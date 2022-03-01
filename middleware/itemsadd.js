$(document).ready(function(e) {

    $(".php-email-form").on('submit', (function(e) {
      e.preventDefault();
      $.ajax({
        url: "../backend/save.php", 
        type: "POST", 
        data: new FormData(this), 
        contentType: false, 
        cache: false, 
        processData: false, 
        success: function(data)
        {
            if(data==="Success")
            {
                swal("Success","Item Inserted Successfully",'success');
                document.getElementById("form").reset();
            }
            else
            {
            swal("Error", data, "error");
            }
        }
      });
    }));
  });