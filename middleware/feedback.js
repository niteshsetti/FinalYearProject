const feed=()=>{
   var name=$("#cname").val();
   var phone=$("#cphone").val();
   var msg=$("#cmsg").val();
   if(name == "" || phone =="" || msg == "" )
   {
       alert("Complete All Fields");
   }
   else{
       $.ajax({
            url: '../backend/feedback.php',
            method: "post",
            async: false,
            data: {
              "feedname": name,
              "feedphno": phone,
              "feedmsg":msg
            },
            success: function (data) {
                alert(data);
                $("#cname").val('');
                $("#cphone").val("");
                $("#cmsg").val("");
            }
       });
   }
}