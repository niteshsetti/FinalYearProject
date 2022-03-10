$(document).ready(function() {
    setInterval(call, 1000)

    function call() {
        $.ajax({
            url: "../backend/mb.php",
            type: "post",
            async: false,
            data: {
                "fetch": 1
            },
            success: function(data) {
                var arr = []
                var sp = data.split(" ");
                for (i = 0; i < sp.length; i++) {
                    if (sp[i] == '') {
                        continue;
                    } else {
                        arr.push(sp[i])
                    }
                }
               for(j=0;j<arr.length;j++)
               {
                   document.getElementById(arr[j]).style.color="red";
               }
            }
        })
    }
    call()
})