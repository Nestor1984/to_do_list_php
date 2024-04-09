<?php include("agregarTarea.php"); ?>
<!-- bs5-$ -->
<!doctype html>
<html lang="en">

<head>
    <title>TODO list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        .subrayado{
            text-decoration: line-through;
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="container"> <!--El atributo class="container" indica que el contenido dentro del <main> se colocará dentro de un contenedor.-->
        <br />
        <!-- bs5-card-head-foot -->
        <div class="card">
            <div class="card-header">
                Lista de tareas (TODO LIST)
            </div>
            <div class="card-body">
                
                    <!-- bs5-form-input -->
                    <div class="mb-3">
                        <form action="" method="post">
                            <label for="tarea" class="form-label">Tarea:</label>
                            <input type="text"
                                class="form-control" name="tarea" id="tarea"
                                aria-describedby="helpId"
                                placeholder="Escriba su tarea"/>
                                <!-- bs5-button-input -->
                            <br/>
                            <input
                                name="agregar_tarea"
                                id="agregar_tarea"
                                class="btn btn-primary"
                                type="submit"
                                value="Agregar tarea"/>
                        </form>
                    </div>

                    <!--bs5-list-default-->
                    <ul class="list-group">
                    
                    <?php foreach ($registros as $registro) { ?>
                        <li class="list-group-item"> <!--bs5-form-checkbox-->
                        
                        <!--Formulario para hacer checked-->
                        <!--onchange="this.form.submit()": cuando el valor cambie hazme un submit de este formulario-->
                        <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                        <input 
                            class="form-check-input float-start"
                            type="checkbox"
                            name="completado"
                            value="<?php echo $registro['completado'];?>" id=""
                            onchange="this.form.submit()" 
                            <?php echo ($registro['completado']==1)?'checked':''; ?> />
                        </form>

                            &nbsp; 
                            <span class="float-start <?php echo ($registro['completado']==1)? 'subrayado': ''; ?> ">
                            &nbsp; <?php echo $registro['tarea']; ?> 
                            </span> <!--NOTA: '&nbsp;' solo te tolera dos espacios Ejem: '&nbsp;' + ' ' = '  ' -->
                            
                            <h6 class="float-start">
                                &nbsp; <a href="?id=<?php echo $registro['id'];?>"> <span class="badge bg-danger"> x </span></a>
                            </h6>
                        </li>
                    <?php } ?>

                    </ul>
                    
                
            </div>
            <div class="card-footer text-muted">

            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>