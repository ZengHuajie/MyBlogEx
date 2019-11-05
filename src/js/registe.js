
// 处理的方式，通过ajax传参，$().serialize()的方式，将表格的参数传给php文件
// php文件拿到后进行判断，以及连接数据库等后续操作
// php 输出的结果，在ajax的success中返回

$('.btn').on('click', function (e) {
    e.preventDefault();
    // 判断是提交的表名
    // let formName = $(this).closest('form').attr('class');
    // console.log(typeof formName);
    ajax('../registe.php', 'POST', $('.form-email').serialize());
})

