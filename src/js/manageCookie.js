
// 封装一个存取cookie的方法
(function (root) {
    function ManageCookie() {

    };
    ManageCookie.prototype = {
        setCookie: function (name, value) {
            document.cookie = name + '=' + value;
            return this;
        },
        removeCookie: function (name) {
            return this.setCookie(name, '', -1);
        },
        getCookie: function (name, callback) {
            let allCookieArr = document.cookie.split('; ');
            console.log(allCookieArr);
            console.log(`cookie的数据类型：${typeof allCookieArr}`);
            for(var i = 0; i < allCookieArr.length; i ++) {
                var itemCookieArr = allCookieArr[i].split('=');
                console.log(itemCookieArr);
                if(itemCookieArr[0] == name) {
                    callback(itemCookieArr[1]);
                    return this;
                }
            }
            callback(undefined);
            return this;
        }
    }
    root.manageCookie = new ManageCookie();

})(window.player || (window.player = {}));