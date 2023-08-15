<?php  
/*  1 - CONEXÃO  */

/* Para erros com o banco de dados*/
try {
    $pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost","root", ""); /* dizer qual banco de dados utilizar e passar quatro informações */
// bdname = nome do banco de dados
// host = nome do servidor
// o usuario e a senha
// o usuario vem como padrão a palavra root
// e a senha vem por padrao vazia

} catch (PDOException $e) {
    echo "Erro com o banco de dados: " .$e ->getMEssage(); /*  Mostrar a mensagem do erro */
    
}
/*  para qualquer erro que nao seja o banco de dados */
catch (Exception $e){
    echo "Erro generico: "  .$e ->getMEssage();  /*  Mostrar a mensagem do erro */
}




/* 2 - INSERT */
/*----------------  1º Forma e a mais utilizada ---------------------------*/

/* 
$res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES (:n, :t, :e)");  */
/* serve para quando precisamos passar algum parametro e substituir */

/* Possui duas formas de fazer a subtituição dos valores  */
/* 1 Forma - mais conhecido de fazer a substituição -  aceita valores, variaveis e funções*/

/*
 $res->bindValue(":n","Roberta");
$res->bindValue(":t","1111111");
$res->bindValue(":e","Roberta@gmail.com");
$res->execute(); */


/* 2 Forma - a diferença é que ele não aceita valor passado diretamente, apenas variaveis, ex: */
/* $nome = "Miriam"; */
/* $res->bindparam(":n", $nome); */



/*  ------------------- 2º forma -----------------------------------------------
usar quando precisar passar informações diretamente ou nao possuir nenhum parametro*/

/* necessario usar aspas simples. Não precisa usar o comando execute(), ele ja executa */ 

//$pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES ('Paulo', '2222222', 'Paulo@gmail.com') ");  



/*  3 - DELETE E UPDATE */

/* DELETE - duas formas
$cmd = $pdo ->prepare("DELETE FROM pessoa WHERE id = :id");
$id = 2;
$cmd->bindValue(":id", $id);
$cmd->execute(); */

//ou

//$res = $pdo->query("DELETE FROM pessoa WHERE id = '4'");


/* UPDATE  */

/*  1 forma */
/* $cmd = $pdo->prepare("UPDATE pessoa SET  email = :e WHERE id = :id");

$cmd-> bindValue(":e","Miriam@gmail.com");
$cmd-> bindValue(":id",1);
$cmd->execute(); */


/*  */
/* $res = $pdo->query("UPDATE  pessoa SET  email = 'Paulo@hotmail.com'  WHERE  id = '5'"); */


/* 4 - SELECT */

/* Selecionando todas as cololunas do id */
/* $cmd = $pdo->prepare("SELECT * From pessoa WHERE id = :id");
$cmd->bindValue(":id", 5);
$cmd->execute(); */

/* Pegar a informação que vem do banco de dados e transformar em um array */

//$resultado = $cmd ->fetch(PDO::FETCH_ASSOC); // Quando vem uma unica linha do banco de dados. PDO::FETCH_ASSOC é para trazer apenas os nomes das colunas do banco de dados

 //ou

 // Quando vem mais de um registro do banco de dados
/* $cmd->fetchAll(); */

// uma estrutura de controle usada para percorrer os elementos de um array.

/* foreach ($resultado as $key => $value) {
    echo $key. ": " .$value. "<br>";
} */

// $resultado" é o nome da variável que contém o array
//$key => $value" o valor atual do elemento do array é atribuído à variável "$value", e a chave desse elemento é atribuída à variável "$key"


?>