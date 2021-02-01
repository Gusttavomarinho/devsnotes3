<?php 
require('../config.php');
$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'delete'){

    //Recebendo dados que foi enviado
    parse_str(file_get_contents('php://input'),$input); // forma do php conseguir pegar outros metodos sem ser post ou get

    $id = $input['id'] ?? null; // verificando se ele nao e null 

    $id = filter_var($id);

    //verificando se o id nao e null
    if($id){
          $sql = $pdo->prepare("DELETE   FROM  notes WHERE id = :id");
          $sql->bindValue(':id', $id);
          $sql->execute();

            $array['result'] = [
                'msg' => 'Nota Deletada'
              ];
    } else {
      $array['error'] = 'ID não enviado';
    }
} else {
  $array['error'] = 'Método não permitido ( apenas DELETE )';
}

require('../return.php');
