<?php 

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$uploadDOK = 1;

$imageFileTyper = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// verifica se o arquivo de imagem é real
if(isset($_POST['submit'])){
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);

    if($check !== false){
        echo "O arquivo é uma imagem - ". $check['mime'] . "<br/>";

    } else {
        echo "O arquivo não é uma imagem";
        $uploadDOK = 0;
    }
}

// verifica se o arquivo já existe

if(file_exists($target_file)){
    echo "Desculpe, o arquivo já existe";
    $uploadDOK = 0;
}

//verifica se o tamanho do arquivo

if($_FILES['fileToUpload']['size'] > 5000000){
    echo "Desculpe, seu arquivo é muito grande";
    $uploadDOK = 0;
}

// verifica que o arquivo é do tipo image,

if($imageFileTyper != "jpg" && $imageFileTyper != "png" && $imageFileTyper != "jpeg" && $imageFileTyper != "gif"){
    echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitivos";
}

// vefirica se a variavel $uploadDK esta com 0 ou 1 (permitada para upload)

if($uploadDOK == 0){
    echo " Desculpe, o seu arquivo não foi enviado para o seu servidor";
} else {
    // verifica se o diretorio / uploads exite

    if(!file_exists('uploads')){
        mkdir('uploads' , 0777, true);
    }

    // move o arquivo da pasta /tmp para a pasta /utloads
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
        echo "O arquivo ". basename($_FILES['fileToUpload']['name']. "foienviado com sucesso!");

    }else {
        echo "Desculpe, houve um erro ao enviar o seu arquivo para o servidor";
    }
}


?>