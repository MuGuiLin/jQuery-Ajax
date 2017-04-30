<?php
    header('Content-Type:Text/Html; Charset=utf-8');
    error_reporting(0);//关闭错误报告  0 不提示
    
    var_dump($_FILES); //PHP的 $_FILES文件上传接收变量，二维数组
    
    echo '<pre>'; //格式化数据显示
    print_r($_FILES);
    
    $file = $_FILES['myFiles']; //form表单中的 file name属性名
    
    $name =  $file['name']; //上传文件名称
    
    $type =  $file['type']; //上传文件MIME类型
    
    $tmp_name =  $file['tmp_name']; //上传到服务器上的临时文件名
    
    $size =  $file['size']; //上传文件大小
    
    $error =  $file['error']; //上传文件错误号 

    //判断目录是否存在，不存在则创建目录
    $filePath = './upload/';
    if(!is_dir($filePath)){
        mkdir($filePath, 0777, true);
    }
    //获取上传文件的扩展名
    $extension_name = end(@explode('.', $_FILES['myFiles']['name']));
    
    //设置新文件名，注：文件名相同，则被覆盖
    //$fileName = md5(time());
   
    $fileName = date('Y-m-d-h-i-s' , time());  //年-月-日-时-分-秒
    
    //$fileName = date('Y-m-d-h-i-s-' , time()).rand(1, 9999); //年-月-日-时-分-秒     1-9999的随机数
 
    var_dump($fileName);
    
    
    if($error === UPLOAD_ERR_OK && $error === 0){

        //if(@file_put_contents($filePath.$fileName.'.'.$extension_name, $_FILES['myFiles']['tmp_name'])){

        //if(@copy($filePath.$fileName.'.'.$extension_name, $_FILES['myFiles']['tmp_name'])){
            
        if(@move_uploaded_file($tmp_name, $filePath.$fileName.'.'.$extension_name)){  
            echo '文件'.$name.'上传成功！';
        }
        else{
            echo '文件'.$name.'上传失败！';
        }
    }
    else{
        switch ($error){
            case 1:
                echo '错误号：【 '.$error.'】 上传文件大小超过服务器允许上传的最大值，php.ini中设置upload_max_filesize选项限制的值 ';
                break;
            case 2:
                echo '错误号：【 '.$error.'】 上传文件大小超过HTML表单中隐藏域MAX_FILE_SIZE选项指定大小的值';
                break;
            case 3:
                echo '错误号：【 '.$error.'】 文件只有部分被上传';
                break;
            case 4:
                echo '错误号：【 '.$error.'】 没有选择上传文件';
                break;
            case 6:
                echo '错误号：【 '.$error.'】 没有找到临时目录 / 文件夹PHP 4.3.10 和 PHP 5.0.3 引进';
                break;
            case 7: 
                echo '错误号：【 '.$error.'】 文件写入失败 / 没有写入权限。PHP 5.1.0 引进';
                break;
            case 8:
                echo '错误号：【 '.$error.'】 php文件上传扩展没有打开';
                break;
        }
    }
    