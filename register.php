<?php
function getConnection() {
    $dbhost='localhost'; // IP
    $dbuser='root';   // nombre usuario
    $dbpass='ybagtami_22'; // contraseña
    $dbname='newsletter';    //nombre de la base de datos
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);  //crea el objeto
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // prueba la conexion
    return $dbh;
}

function registerNewsletter($username, $mail) {
  $sql = 'INSERT INTO users (user, mail) VALUES (:user,:mail)';
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user', $username);
    $stmt->bindParam(':mail', $mail);
    $stmt->execute();

    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}
$usuario=$_GET["user"];
$correo=$_GET["mail"];
registerNewsletter($usuario,$correo);

?>
