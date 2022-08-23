<?php
$uploads_dir='./uploads';
$allowed_ext=array('jpg','jpeg','png','gif');
$field_name='myfile';
if(!is_dir($uploads_dir)){
    if(!mkdir($uploads_dir,0777)){
        die("업로드 디렉토리 생성 실패");
    };
}

if(!isset($_FILES[$field_name])){
    die("업로드 된 파일이 존재하지 않는디");
}

$error=$_FILES[$field_name]['error'];
$name=$_FILES[$field_name]['name'];

if($error!=UPLOADS_ERR_OK){
    switch($error){
        case UPLOAD_ERR_INI_SIZE: case UPLOAD_ERR_FORM_SIZE: echo "파일이 너무 큼($error)"; break;
        case UPLOAD_ERR_PARTIAL:echo "파일이 부분적으로 첨부($error)"; break;
        default : echo "파일이 제대로 업로드 되지 않음($error)";
    }
    exit;
}

$upload_file=$uploads_dir.'/'.$name;
$fileinfo=pathinfo($upload_file);
$ext=strtolower($fileinfo['extension']);

$i=1;

while(is_file($upload_file)){
    $name=$fileinfo['filename']."-{$i}.".$fileinfo['extension'];
    $upload_file=$uploads-dir.'/'.$name;
    $i++;
}

if(!in_array($ext,$allowed_ext)){
    echo "확장자가 이상해";
    exit;
}

if(!move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_file)){
    echo "파일이 업로드 되지 않음";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> 파일정보 </h3>
    <ul>
        <li> 파일명 : <?php echo$name;?></li>
        <li> 확장자 : <?php echo$ext;?></li>
        <li> 파일형식 : <?php echo$_FILES[$field_name]['type'];?></li>
        <li> 파일크기 : <?php echo number_format($_FILES[$field_name]['size']);?>바이트</li>
</ul>
</body>
</html>
