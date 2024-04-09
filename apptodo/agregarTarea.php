<?php

// Conexion a la BD
try {
    $conn = new PDO('mysql:host=localhost;port=3307;dbname=aplicacion', 'root', '');
    #echo "<strong><em>Conexion establecida...</em></strong>";
} catch (PDOException $e) {
    echo "<strong><em>Error de conexion: " . $e->getMessage() . "</em></strong>";
}

// Recepcionamos el input de tipo hidden y el checkbox, y luego actualizamos la lista de tareas
if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $completado = (isset($_POST['completado']))?1:0;

    $sql = "UPDATE tareas SET completado=? WHERE id=?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$completado,$id]); // Pasamos los argumentos en un arreglo

}


// Insertamos
if (isset($_POST['agregar_tarea'])) { // Si se presiono el boton "agregar_tarea"
   
    $tarea = $_POST['tarea'];
    $sql = "INSERT INTO tareas(tarea) VALUE(?)";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$tarea]); // NOTA: el metodo execute, recibe si o si arreglos

}

// Borramos
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "DELETE FROM tareas WHERE id = ?";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute([$id]); // Pasamos el argumento en un arreglo

}

// Leemos
$sql = "SELECT * FROM tareas";
$registros = $conn->query($sql);



?>