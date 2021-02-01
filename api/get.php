<?php 
require('../config.php');
$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get'){

    //pegando o id na url
    $id = filter_input(INPUT_GET,'id');

    //verificando se o id nao e nulo
    if($id){
          $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
          $sql->bindValue(':id', $id);
          $sql->execute();

          if($sql->rowCount() > 0){
        
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            //colocando os dados para dentro do array result
            $array['result'] = [
              'id' => $data['id'],
              'title' => $data['title'],
              'body' => $data['body']
            ];
        
          } else {
            $array['error'] = 'ID inexistente';
          }

  
    } else {
      $array['error'] = 'ID não enviado';
    }
} else {
  $array['error'] = 'Método não permitido ( apenas GET )';
}

require('../return.php');
