$(document).ready(function(){
    $("#randomPlay").click(function(){
        var dataInfo = $("#baseballForm").serialize();
        $.ajax({
            type: "POST",
            url: '/gamechanger/baseball.php',
            data: dataInfo,
            success: function(data){
                $("#formData").empty();
                $("#formData").append(data);

            }

        });
        return false;
    });
});

