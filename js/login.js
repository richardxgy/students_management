/**
 * Created by Administrator on 2017/6/28.
 */
$(document).ready(function () {
    $("#login").click(function () {
       var $username = $("#username").val();
        var $passwd = $("#passwd").val();

        if (!$username){
            $("#err").html('请输入账号');
            return;
        }
        if (!$passwd){
            $("#err").html('请输入密码');
            return;
        }

        $.ajax({
            url:'./login.php',
            type:'POST',
            dataType:'json',
            data:{username:$username,passwd:$passwd},
            success:function (data) {
                console.log(data)
                if (data.r=='invail_username'){
                    $("#err").html('账号无效');
                }else if(data.r=='invail_passwd'){
                    $("#err").html('密码无效');
                }else if (data.r == 'success'){
                    window.location.href = 'index.php'
                }else {
                    $("#err").html('未知错误');
                }

            }

        });

    });

});