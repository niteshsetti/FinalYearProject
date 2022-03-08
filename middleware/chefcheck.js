function cartcount(){
    $(document).ready(function(){
        $.ajax({
            url:"../backend/chefview.php",
            method:"post",
            async:false,
            paging:false,
            data:{
                "fetch":1,
            },
            success:function(data)
            {
                $("#num").html(data);
            }
        });
    });
}
cartcount()