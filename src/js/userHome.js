// 封闭作用域
(function ($) {

    var root = window.player;
    var oMc = root.manageCookie;
    var blogObj = {};
    var blogArr = [];

    var obj = {

        init: function () {
            this.reload();
            this.bindEvent();
            this.getCookie('userName', function (data) {
                console.log(data);
                $('.navbar-right p').text(data);
            });

        },

        // 直接location.reload()的话，会进入死循环，一直请求然后刷新
        reload: function () {
            $(document).ready(function () {
                // 获取当前页面地址并在其中查找#首次出现的位置，找不到就是-1
                if (location.href.indexOf('#') == -1) {
                    // 找不到就是给地址加上#，然后刷新页面
                    location.href = location.href + '#';
                    location.reload();
                }
            })
        },

        bindEvent: function () {
            $('.glyphicon-pencil').on('click', function () {
                location.href = 'writeBlog.html';
            })
            // 连接到writeBlog.php 取得博客数据
            ajax('../getBlog.php', 'POST', {}, '', (res) => {
                // php不加header直接输出json_encode的值的话，返回的是字符串不是对象，js这边就需要先eval('('+data+')')转化为对象
                const result = eval("(" + res + ")");
                console.log(result);
                result.forEach(function (ele, index) {
                    console.log(ele[0]);
                    console.log(ele[1]);
                    console.log(ele[2]);
                    console.log(ele[3]);
                    // console.log(ele[4]);
                    // console.log(ele[5]);
                    // console.log(ele[6]);
                    // console.log(result.length);
                    var oCloneDom = $('.container-box').eq(0).clone().removeClass('template');
                    oCloneDom.find('.title-box a').text(ele[2])
                        .end()
                        .find('article section').text(ele[3])
                        .end()
                        .find('.container-bottom .user-name').text(ele[1])
                        .end()
                        .find('.right-user-browse .like-counts').text(ele[4])
                        .end()
                        .find('.right-user-browse .browse-counts').text(ele[5])
                        .end()
                        .find('.right-user-browse .comment-counts').text(ele[6])
                    $(oCloneDom).insertAfter($('.top-news'))
                })

            });
        },

        // 拿到存在cookie里面的用户名
        getCookie: oMc.getCookie,


    }

    obj.init();

})(window.jQuery)
