<?php 
require('../config.php');
$method = strtolower($_SERVER['REQUEST_METHOD']);
if($method === 'get'){

  $sql = $pdo->query('SELECT * FROM notes');
  if($sql->rowCount() > 0){

    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    //Apos consultar no banco de dados  vamos por os dados dentro do array
    foreach($data as $item){
      $array['result'][] = [
        'id' => $item['id'],
        'title' => $item['title']
      ];
    }

  }
    
} else {
  $array['error'] = 'Método não permitido ( apenas GET )';
}

require('../return.php');
