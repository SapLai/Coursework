$('#authorization_user').submit(function(e) {
        e.preventDefault();
        var name = $("input[name='name']").val();
        var phone = $("input[name='phone']").val();
        $(".error_notify,.error_notify_empty").hide();
        if(name == '' || phone == ''){
            $(".error_notify_empty").show();
        }else {
            $.ajax({
                type: 'POST',
                url: 'cabinet_form/authorization.php',
                data: {
                    check_form : true,
                    name: name,
                    phone: phone
                },
                success: function (data) {
                    if (data) {
                        window.location.href = '/tasks.php';
                    } else {
                        $(".error_notify").show();
                    }
                }
            });
        }
});