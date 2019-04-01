var comm = (function () {
    var obj = {};

    //是否存在JWT-Token
    obj.tonkenVerify = function () {
        layui.use(['layer', 'form'], function () {
            var layer = layui.layer;
            var jwt = localStorage.getItem('jwt');
            if (jwt) {
                axios.defaults.headers.common['X-token'] = jwt;
                axios.get('user.php')
                    .then(function (response) {
                        if (response.data.result === 'success') {
                            var uName = response.data.info.data.username;
                            $(".login-bar-item").removeClass("layui-show");
                            $("#loginUser").text(uName);
                            $("#loginB").addClass("layui-show");
                            //注销登录
                            $("#loginOut").on("click", function () {
                                localStorage.removeItem('jwt');
                                comm.tonkenVerify();
                                layer.msg("注销成功！");
                            })

                        } else {
                            console.log(response.data.msg);
                            // var flag = true;
                            // if (flag) {
                            //     layer.msg(response.data.msg);
                            //     location.href = '/index.html';
                            //     flag = false;
                            // }
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            } else {
                $(".login-bar-item").removeClass("layui-show");
                $("#loginA").addClass("layui-show");
            }
        })
    }

    return obj;
}())