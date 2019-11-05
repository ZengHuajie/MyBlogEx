
(function ($) {

    var root = window.player;
    var oMc = root.manageCookie;

    var obj = {

        init: function () {
            // 实例化编辑器
            this.ue = UE.getEditor('container');
            this.bindEvent();
        },

        bindEvent: function () {
            var title = '',
                str = '';
            var self = this;

            $('.btn').on('click', function (e) {
                e.preventDefault();
                // 拿到用户名
                self.getCookie('userName', (data) => {
                    $('.blog-account').val(data);
                })
                // 拿到标题
                title = $('.inp').val();
                // 拿到编辑器里的内容
                str = self.ue.getContentTxt();
                // 判断标题和内容是否为空
                if( title && str ) {
                    // 把标题放到中转站
                    $('.blog-title').val(title);
                    // 把内容放到中转站
                    $('.blog-content').val(str);
                    console.log('a');
                    // .serialize()方法 -->前提是选中form表单  返回的是把表单内所有的name和value拼接成一个字符串的形式
                    // .serializeArray() 返回的是json对象的形式
                    console.log('data---->', $('.form-blog').serializeArray()[0].value);
                    ajax('../blogInfo.php', 'POST', $('.form-blog').serialize());
                    if(  confirm('发表成功,是否继续发表?') ) {
                        self.reload();
                    }else {
                        location.href = 'userHome.html';
                    }
                }else {
                    confirm('请输入标题或内容!');
                }

            })

        },

        // 拿到存在cookie里面的用户名
        getCookie: oMc.getCookie,

        // 刷新页面
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

    }

    obj.init();

})(window.jQuery)