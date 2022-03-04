function cartcount(){
    $(document).ready(function(){
        cartcount()
        var tabno=$("#tablenumber").val();
        $.ajax({
            url:"../backend/cartcount.php",
            method:"post",
            async:false,
            data:{
                "fecth":1,
                "tabno":tabno
            },
            success:function(data)
            {
                $("#num").text(data);
            }
        });
    });
}
cartcount()