$(function () {
    var Popup = require('../../component/popup');
    var service = require('../../service/articleService');
    $successPop = new Popup({
        width: 200,
        height: 150,
        contentBg: '#fff',
        maskColor: '#000',
        maskOpacity: '0.6',
        content: $('#successTpl').html()
    });
    $loadingPop = new Popup({
        width: 128,
        height: 128,
        contentBg: 'transparent',
        maskColor: '#000',
        maskOpacity: '0.6',
        content: $('#loadingTpl').html()
    });

    $promptPop = new Popup({
        width: 400,
        height: 225,
        contentBg: '#fff',
        maskColor: '#000',
        maskOpacity: '0.6',
        content: $('#promptTpl').html()
    });
    $.validate({
        form: '#form',
        validateOnBlur: false,
        onSuccess: function ($form) {
            moreValidate();
            return false;
        }
    });


    // 上传图片（举例）
    var editor = new wangEditor('content');
    if (editor.config) {
        editor.config.uploadImgUrl = '/api/article/img/image-upload';
        editor.config.uploadHeaders = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        };
        // 隐藏掉插入网络图片功能。该配置，只有在你正确配置了图片上传功能之后才可用。
        editor.config.hideLinkImg = true;
        editor.create();
    }

    function moreValidate() {
        if (parseInt($.params.id) == 0) {
            service.store({
                data: $('#form').serialize(),
                params: $.params,
                beforeSend: function () {
                    $loadingPop.showPop();
                },
                sucFn: function (data, status, xhr) {
                    $loadingPop.closePop();
                    $successPop.showPop();
                    setTimeout(skipUpdate, 2000);
                    function skipUpdate() {
                        $successPop.closePop();
                        window.location.href = '/article/index';
                    }
                },
                errFn: function (data, status, xhr) {
                    $loadingPop.closePop();
                    $('.text').html(showError(data));
                    $promptPop.showPop();
                }
            });
        } else {
            service.update({
                data: $('#form').serialize(),
                params: $.params,
                beforeSend: function () {
                    $loadingPop.showPop();
                },
                sucFn: function (data, status, xhr) {
                    $loadingPop.closePop();
                    $successPop.showPop();
                    setTimeout(skipUpdate, 2000);
                    function skipUpdate() {
                        $successPop.closePop();
                        window.location.href = '/article/index';
                    }
                },
                errFn: function (data, status, xhr) {
                    $loadingPop.closePop();
                    $('.text').html(showError(data));
                    $promptPop.showPop();
                }
            });
        }
    }

    $(document).on('click', '#pop_close', function () {
        $promptPop.closePop();
    });

    function showError(data) {
        var info = '';
        var messages = [];
        var i = 0;
        for (var key in data) {
            messages.push(++i + "、" + data[key][0]);
        }
        info = messages.join('</br>');
        return info;
    }
});