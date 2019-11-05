// 封装ajax方法
/**
 * ajax函数，参数如下：
 * @param url
 * @param type
 * @param data
 * @param success
 */
let ajax = (url, type, data, dateType, success) => {
    $.ajax({
        url: url,
        type: type,
        data: data,
        dateType: dateType,
        success: success ? success : (res) => {
            console.log(res);
        },
        error: () => {
            console.log('error');
        }
    })
}


