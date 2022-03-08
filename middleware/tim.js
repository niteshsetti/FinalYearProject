function tims(){
$(document).ready(function(){
    tims()
   $.ajax({
    url:"../backend/gettime.php",
    method:"post",
    async:false,
    data:{
        "fetch":1
    },
    success:function(data)
    {
       $("#cool").text(data);
    }
   });
});
}
tims()