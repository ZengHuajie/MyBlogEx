var loginUserName = '';
var a = 'asd';
var root = window.player;
var oMc = root.manageCookie;
// 点击登录
$('.btn').on('click', function (e) {
    ajax('../login.php', 'POST', $('.form-email').serialize(), '',(res) => {
        console.log(typeof res, res);
        alert(res);
        console.log('data---->', $('.form-email').serialize());
        if(res == "登录成功") {
            loginUserName = $('#exampleInputEmail1').val();
            console.log(loginUserName);
            // 将用户名保存到cookie里面
            oMc.setCookie('userName', loginUserName);
            location.href = 'userHome.html';
        }
    })
    e.preventDefault();
})



