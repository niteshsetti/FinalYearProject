function call(k) {
    $(document).ready(function () {
        setInterval(timestamp, 1000);
    });
        function timestamp()
        {
        $.ajax({
            url: '../backend/updatetime.php',
            method: "post",
            async: false,
            data: {
                "fetch": 1,
                "cand": k
            },
            success: function (data) {
                $("#" + k).text(data);
                if(data === "----Time Up")
                {
                    document.getElementById(k).style.color="red";
                }
            }
        });
    }
}
for (i = 0; i < ti.length; i++) {
    var k = ti[i];
    call(k)
}