
处理的方式，通过ajax传参，$().serialize()的方式，将表格的参数传给php文件
    参数会以name=value&name=value&...的形式传过去
php文件拿到后进行判断，以及连接数据库等后续操作
php 输出的结果，在ajax的success中返回

难点1：
    php返回的结果，中文会乱码
解决方法：
    php加上header("Content-Type:text/html;charset=gbk"); 
    
难点2：
    校验数据
解决方法：
    利用php的正则校验preg_match('//', 需要校验的数据)

    
    