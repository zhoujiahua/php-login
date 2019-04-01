//后台页面JS
$(function(){
    $("#seviceIP").on("click",function(){
        var ipUrl = "http://192.168.1.1/login.cgi",
            params = {user:"cnki",password:"cnkicnki"};
        postCurrent(ipUrl,params);
    })
})

//表单模拟提交
function postCurrent(url,params){
    var form = $("<form method='post' target='_blank'></form>");
    var input;
    form.attr({"action":url});
    $.each(params,function (key,value) {
        input = $("<input type='hidden'>");
        input.attr({"name":key});
        input.val(value);
        form.append(input);
    });

    $("#formLink").html(form);
    form.submit();
}
