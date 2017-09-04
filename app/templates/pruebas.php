 <?php 
 
 ob_start() ?>
 <h1>Pruebas</h1>
 <h3>Esto es pruebas  </h3>
 

 <?php 

 $mail = "at@gmail.com";

$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM propietarios WHERE email = '$mail'";
        
        $s = $conn->prepare($sql);
        $s->execute();
        $conn = null; 
        $m = $s->fetch();

echo "<pre>";
print_r($m);
echo "</pre>";
 
 $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>