
// 进度条配置
$(document).ajaxStart(function() {
    Pace.restart();
});

// 提示组件
function yhNotify(title, msg, type) {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };


    toastr[type || 'success'](msg, title);
}


// 排序
function sortDataPost(sortColumnName) {
    var inputSortDescending = $('input[name="sort_type"]').val();
    var inputSortColumnName = $('input[name="sort_column"]').val();

    if(sortColumnName == inputSortColumnName && inputSortDescending == 'desc') {
        $('input[name="sort_type"]').val('asc');
    } else {
        $('input[name="sort_type"]').val('desc');
    }

    $('input[name="sort_column"]').val(sortColumnName);
    $('#search-form').submit();
}


// ajax 全局设置
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    error: function(jqXHR, textStatus, errorThrown){
        switch (jqXHR.status){
            case(500):
                yhNotify('服务器系统内部错误!')
                break;
            case(401):
                yhNotify('认证失败!')
                break;
            case(403):
                yhNotify('无权限执行此操作!')
                break;
            case(404):
                yhNotify('请求不存在!')
                break;
            default:
                yhNotify('未知错误!');
        }
    }
});

// 初始化 ajax select2
function initAjaxSelect2(obj, url) {
    obj.select2({
        ajax: {
            type:'GET',
            url: url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term 请求参数
                    page: params.page
                };
            },
            processResults: function (dt, params) {
                params.page = params.page || 1;
                var itemList = [];//当数据对象不是{id:0,text:'ANTS'}这种形式的时候，可以使用类似此方法创建新的数组对象
                var arr = dt.data.items;
                for(key in arr){
                    itemList.push({id: arr[key].id, text: arr[key].name})
                }
                return {
                    results: itemList,
                    pagination: {
                        more: (params.page * 10) < dt.data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder:'请选择',//默认文字提示
        language: "zh-CN",
        tags: false, //允许手动添加
        allowClear: true,//允许清空
        escapeMarkup: function (markup) {  // 自定义格式化防止xss注入
            return markup;
        },
        minimumInputLength: 1, //最少输入多少个字符后开始查询
        formatResult: function formatRepo(repo){ // 函数用来渲染结果
            return repo.text;
        },
        formatSelection: function formatRepoSelection(repo){ // 函数用于呈现当前的选择
            return repo.text;
        }
    });
}

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
    $disabled.attr('disabled','disabled');
    return o;
}
