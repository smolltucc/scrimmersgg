<?php
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/db.php';
    use Medoo\Medoo;
    
    
    $db = new Medoo($cleardb_config);
    
    
    $data = $db->select('users', "*",["username[~]"=>$_POST['usernames']]);
    
    echo json_encode($data);
    
    
    
?>

