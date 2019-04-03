var comm = (function () {
    var layer, form, laydate, element, $, method = {};
    layui.use(["layer", "form", "laydate", "element", "jquery"], function () {
        layer = layui.layer;
        form = layui.form;
        laydate = layui.laydate;
        element = layui.element;
        $ = layui.jquery;
    })

    method.verifyInfo = function (params) {
        debugger
        $.ajax({
            url: params.url,
            type: params.type || 'GET',
            dataType: params.dataType || 'json',
            data: {
                info: params.info
            },
            success: function (res) {
                debugger
                if (res == 1) {
                    $('#ri').removeAttr('hidden');
                    $('#wr').attr('hidden', 'hidden');

                } else {
                    $('#wr').removeAttr('hidden');
                    $('#ri').attr('hidden', 'hidden');
                    layer.msg('当前用户名已被占用! ')
                }

            }
        })
    }

    return method;
}())