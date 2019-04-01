$(function () {
    
    layui.use(['form', 'layer', 'element'], function () {
        var form = layui.form,
            layer = layui.layer,
            element = layui.element,
            contentLogin = $("#loginBox").html();

        //登录
        $("#loginBtn").on("click", function () {
            layer.open({
                type: 1,
                title: "登录",
                closeBtn: 1,
                area: ['380px', '280px'],
                shade: 0.8,
                id: 'cnki_login',
                btn: ['登录', '退出'],
                btnAlign: 'c',
                anim: 4,
                resize: false,
                move: false,
                content: contentLogin,
                success: function (layero) {
                    // var btn = layero.find('.layui-layer-btn');
                    // btn.find('.layui-layer-btn0').attr({
                    //     href: 'http://www.layui.com/',
                    //     target: '_blank'
                    // });
                },
                yes: function (index, layero) {
                    // layer.close(index);
                    // layer.msg(index)
                    //监听提交
                    // var userName = $("#userName").val().trim(),
                    //     passWord = $("#passWord").val().trim();
                    // var params = new URLSearchParams();
                    // params.append("user", userName);
                    // params.append("pass", passWord);

                    if (userName.length == 0 || passWord.length == 0) {
                        layer.msg("用户名密码不能为空！");
                        return false;
                    } else {
                        // $.ajax({
                        //     type: "POST",
                        //     url: "/user.php?action=login",
                        //     data: params,
                        //     dataType: "json",
                        //     success: function (res) {
                        //         debugger
                        //         if (res.result == "failed") {
                        //             layer.msg(res.msg);
                        //             return false;
                        //         } else {

                        //         }
                        //     }
                        // });
                        var jwt = localStorage.getItem('jwt');

                        //是否存在JWT-Token
                        // if (jwt) {
                        //     axios.defaults.headers.common['X-token'] = jwt;
                        //     axios.get('user.php')
                        //         .then(function (response) {
                        //             if (response.data.result === 'success') {
                        //                 document.querySelector('#showpage').style.display = 'none';
                        //                 document.querySelector('#user').style.display = 'block';
                        //                 document.querySelector('#uname').innerHTML = response.data.info.data.username;
                        //             } else {
                        //                 document.querySelector('#showpage').style.display = 'block';
                        //                 console.log(response.data.msg);
                        //             }
                        //         })
                        //         .catch(function (error) {
                        //             console.log(error);
                        //         });
                        // } else {
                        //     document.querySelector('#showpage').style.display = 'block';
                        // }
                        loginPost();

                        function loginPost() {
                            var userName = document.getElementById("userName").value,
                                passWord = document.getElementById("passWord").value;

                            //用户信息构造
                            var params = new URLSearchParams();
                            params.append('user', userName);
                            params.append('pass', passWord);

                            //登录请求
                            axios.post('user.php?action=login', params)
                                .then((response) => {
                                    debugger
                                    if (response.data.result === 'success') {
                                        // 本地存储token
                                        localStorage.setItem('jwt', response.data.jwt);
                                        axios.defaults.headers.common['X-token'] = response.data.jwt;
                                        axios.get('user.php').then(function (response) {
                                            debugger
                                            if (response.data.result === 'success') {
                                                comm.tonkenVerify();
                                                layer.close(index);
                                            } else {
                                                
                                            }
                                        });
                                    } else {
                                        layer.msg(response.data.msg);
                                        return false;
                                    }
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                        }
           
                    }
                }

            });
        })

    });
})