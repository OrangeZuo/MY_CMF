/**
 * Created by 95 on 3/12/14.
 */

/**应用初始化
 */
$(function () {
    bindGoTop();//回到顶部
});


/**
 * 模拟U函数
 * @param url
 * @param params
 * @returns {string}
 * @constructor
 */
function U(url, params, rewrite) {
    var website = _ROOT_ + '/index.html';
    url = url.split('/');
    if (url[0] == '' || url[0] == '@')
        url[0] = APPNAME;
    if (!url[1])
        url[1] = 'Index';
    if (!url[2])
        url[2] = 'index';
    website = website + '?s=/' + url[0] + '/' + url[1] + '/' + url[2];
    if (params) {
        params = params.join('/');
        website = website + '/' + params;
    }
    if (!rewrite) {
        website = website + '.html';
    }
    return website;
}

/**
 * 绑定回到顶部
 */
function bindGoTop() {
    $(window).scroll(function () {
        var sc = $(window).scrollTop();
        //var rwidth=$(window).width()
        if (sc > 200) {
            $("#goTopBtn").css("display", "block");
            $("#goTopBtn").css("right", "50px")
        } else {
            $("#goTopBtn").css("display", "none");
        }
    })

    $("#goTopBtn").click(function () {
        var sc = $(window).scrollTop();
        $('body,html').animate({scrollTop: 0}, 1000);
    });
}
/**播放背景音乐
 *
 * @param file 文件路径
 */
function playsound(file) {
    $('embed').remove();
    $('body').append('<embed src="' + file + '" autostart="true" hidden="true" loop="false">');
    var div = document.getElementById('music');
    div.src = file;
}
/**
 * 成功提示
 * @param text 内容
 * @param title 标题
 */
function op_success(text, title) {
    if( title == '' ){
        title = '温馨提示';
    }

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-center",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.success(text, title);
}
/**
 * 失败提示
 * @param text 内容
 * @param title 标题
 */
function op_error(text, title) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-center",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.error(text, title);
}
/**
 * 信息提示
 * @param text 内容
 * @param title 标题
 */
function op_info(text, title) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "positionClass": "toast-center",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.info(text, title);
}
/**
 * 警告提示
 * @param text 内容
 * @param title 标题
 */
function op_warning(text, title) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "positionClass": "toast-center",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr.warning(text, title);
}


/**
 * Ajax系列
 */

/**
 * 处理ajax返回结果
 */
function handleAjax(a) {
    //弹出提示消息
    var interval = 2000;
    if (a.status) {
        op_success(a.info);

        //需要跳转的话就跳转
        if (a.url == "refresh" || a.url == null || a.url == '') {
            setTimeout( function () {
                location.href = a.url;
                location.reload();
                $(".ajax-form")[0].reset();
            }, interval);
        } else if (a.url) {
            setTimeout( function () {
                location.href = a.url;
            }, interval);
        }

    } else {
        if( a.url != "refresh" && a.url != null && a.url != '' ){
            setTimeout( function () {
                location.href = a.url;
            }, interval);
        }
        op_error(a.info);
    }
}


$(function () {
    /**
     * ajax-form
     * 通过ajax提交表单，通过oneplus提示消息
     * 示例：<form class="ajax-form" method="post" action="xxx">
     */
    $(document).on('submit', 'form.ajax-form', function (e) {
        //取消默认动作，防止表单两次提交
        e.preventDefault();

        if ( $(this).hasClass('confirm') ) {
            if(!confirm( '确认要执行该操作吗?' )){
                return false;
            }
        }

        //禁用提交按钮，防止重复提交
        var form = $(this);
        //$('[type=submit]', form).addClass('disabled');

        if( $(this).attr("data-attr") ){
            op_error( '请不要重复提交~' );        //请不要重复提交
            return false;
        }else{
            $(this).attr('data-attr',1);
        }

        //获取提交地址，方式
        var action = $(this).attr('action');
        var method = $(this).attr('method');

        //检测提交地址
        if (!action) {
            return false;
        }

        //默认提交方式为get
        if (!method) {
            method = 'get';
        }

        //获取表单内容
        var formContent = $(this).serialize();
        //发送提交请求
        if (method == 'post') {
            $.post(action, formContent, function (a) {
                form.removeAttr('data-attr');
                handleAjax(a);
                //$('[type=submit]', form).removeClass('disabled');
            });
        }else if( method == 'get' ){
            $.get(action, formContent, function (a) {
                form.removeAttr('data-attr');
                handleAjax(a);
                //$('[type=submit]', form).removeClass('disabled');
            });
        }

        //返回
        return false;
    });



    //ajax get请求
    $('.ajax-get').click(function(){
        var target;
        var that = this;
        if ( $(this).hasClass('confirm') ) {
            if(!confirm( '确认要执行该操作吗?' )){
                return false;
            }
        }
        if ( (target = $(this).attr('href')) || (target = $(this).attr('url')) ) {
            $.get(target).success(function(data){

                handleAjax(data);
                
            });
        }
        return false;
    });
})


/**
 * 初始化聊天框
 */
function op_initTalkBox() {
    $('#scrollArea').slimScroll({
        height: '400px',
        alwaysVisible: true,
        start: 'bottom'
    });
}
/**
 * 向聊天窗添加一条消息
 * @param html 消息内容
 */
function op_appendMessage(html) {
    $('#scrollContainer').append(html);
    $('#scrollArea').slimScroll({scrollTo: $('#scrollContainer').height()});
    ucard();
}
/**
 * 渲染消息模板
 * @param message 消息体
 * @param mid 当前用户ID
 * @returns {string}
 */
function op_fetchMessageTpl(message, mid) {
    var tpl_right = '<div class="row talk_right">' +
        '<div class="time"><span class="timespan">{ctime}</span></div>' +
        '<div class="row">' +
        '<div class="col-md-10 bubble_outter">' +
        '<h3>我</h3>' +
        '<i class="bubble_sharp"></i>' +
        '<div class="talk_bubble">{content}' +
        '</div>' +
        '</div>' +
        ' <div class="col-md-2 "><img ucard="{uid}" class="avatar-img talk-avatar"' +
        'src="{avatar128}"/>' +
        '</div> </div> </div>';

    var tpl_left = '<div class="row">' +
        '<div class="time"><span class="timespan">{ctime}</span></div>' +
        '<div class="row">' +
        '<div class="col-md-2 "><img ucard="{uid}" class="avatar-img talk-avatar"' +
        'src="{avatar128}"/>' +
        '</div><div class="col-md-10 bubble_outter">' +
        '<h3>{username}</h3>' +
        '<i class="bubble_sharp"></i>' +
        '<div class="talk_bubble">{content}' +
        '</div></div></div></div>';
    var tpl = message.uid == mid ? tpl_right : tpl_left;
    $.each(message, function (index, value) {
        tpl = tpl.replace('{' + index + '}', value);
    });
    return tpl;
}
