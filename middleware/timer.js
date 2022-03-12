function call(k) {
    var count = 0;
    $(document).ready(function () {
        setInterval(timestamp, 1000);
    });
    function timestamp() {
        var tab = $("#tabno").val();
        $.ajax({
            url: '../backend/updatetime.php',
            method: "post",
            async: false,
            data: {
                "fetch": 1,
                "cand": k
            },
            success: function (data) {
                $("#" + k).html(data);
                if (data === " ----Time Up Play Quiz") {
                    count += 1
                    $("#cool" + k).attr('href', "http://localhost/FinalYearProject/frontend/quiz.php?%20tabno="+tab);
                    document.getElementById(k).style.color = "red";
                }
                else if(data!=" ----Time Up Play Quiz")
                {
                    document.getElementById(k).style.color="green";
                }
            }
        });
    }
}
for (i = 0; i < ti.length; i++) {
    var k = ti[i];
    call(k)
}