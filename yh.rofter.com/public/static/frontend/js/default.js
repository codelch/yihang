/**
 * Theme:Coffee Dou
 * Author:Kakaci
 */

// Copyright 2014-2015 Twitter, Inc.
// Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
// fix page on Windows Phone 8
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style')
    msViewportStyle.appendChild(
        document.createTextNode(
            '@-ms-viewport{width:auto!important}'
        )
    )
    document.querySelector('head').appendChild(msViewportStyle)
}

jQuery(document).ready(function() {
    "use strict";
    jQuery('.krakatoa').krakatoa({
        width: '100%',
        height: '630px',
        items: 5,
        buttons: false,
        gutter: 0,
        loop: true
    });

    jQuery('.krakatoa_hezuo').krakatoa({
        width: '100%',
        height: '800px',
        items: 1,
        buttons: false,
        gutter: 0,
        loop: true,
        autoplay: false
    });

    jQuery('.krakatoa_micro').krakatoa({
        width: '100%',
        height: '750px',
        items: 1,
        buttons: false,
        gutter: 0,
        loop: true,
        autoplay: false
    });
    jQuery('#krakatoa_team').krakatoa({
        width: '100%',
        height: '320px',
        items: 1,
        buttons: false,
        gutter: 0,
        loop: true,
        autoplay: false
    });

    jQuery("#content-team").mCustomScrollbar({
        scrollButtons: { enable: true },
        axis: "y",
        theme: "dark-thick",
        scrollbarPosition: "outside",
        mouseWheel: { scrollAmount: 220 },
        scrollInertia: 800
    });

    //教师确认课程信息并编辑上课时间
    jQuery('.account_table a.class_confirm').on('touchstart click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var $a = jQuery(this);
        var student_name = $a.attr('data-student-name'),
            student_id = $a.attr('data-student-id'),
            student_class = $a.attr('data-student-class');
        var $form = jQuery('#class_confirm form');
        $form.find('input#student-name').attr('value', student_name);
        $form.find('input#student-id').attr('value', student_id);
        $form.find('input#student-class').attr('value', student_class);
        jQuery('#class_confirm').modal('show');
    });

    //微课3视频弹框
    var $vedio_modal = jQuery('#vedio_modal');
    $vedio_modal.on('shown.bs.modal', function(e) {
        var button = jQuery(e.relatedTarget);
        var vedio_url = button.data('href');
        var modal = jQuery(this);
        modal.find('iframe').attr('src', vedio_url);
    });

    function closew() {
        $vedio_modal.on('hide.bs.modal', function(e) {
            var modal = jQuery('#vedio_modal');
            modal.find('iframe').attr('src', '');
        });
    }


});

// 获取form 表单数据
$.fn.serializeObject = function() {
    var $disabled = this.find(':disabled').removeAttr('disabled');
    var o = Object.create(null),
        elementMapper = function(element) {
            element.name = $.camelCase(element.name);
            return element;
        },
        appendToResult = function(i, element) {
            var node = o[element.name];

            if ('undefined' != typeof node && node !== null) {
                o[element.name] = node.push ? node.push(element.value) : [node, element.value];
            } else {
                o[element.name] = element.value;
            }
        };

    $.each($.map(this.serializeArray(), elementMapper), appendToResult);
    $disabled.attr('disabled', 'disabled');
    return o;
}

$.fn.formWarning = function(text) {
    this.parents('.input-group').next().text(text)
}

// ajax 全局设置
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// 登陆
$('#login_modal').on('submit', 'form', function() {
    var $form = $(this),
        send_data = $form.serializeObject()
    $form.find('.form-warning').text('')
    var modal = $('#login_modal')

    $.ajax({
        url: 'http://127.0.0.1/yh.rofter.com/public/login',
        data: send_data,
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function() {
            if (!send_data['phone']) {
                $('input[name="phone"]').formWarning('手机号必须!')
                return false
            }

            if (!send_data['password']) {
                $('input[name="password"]').formWarning('密码必须!')
                return false
            }

            return true

        }
    }).done(function(data) {
        if (data.code == 200) {
            modal.modal('hide')
            window.location.href = '{{url(' / ')}}';
        } else {
            $('input[name="phone"]').formWarning(data.msg)
        }
    })

    return false;
})