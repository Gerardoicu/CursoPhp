
<?php
require_once 'Model/Persona.php';
require_once 'Model/Personas_modelo.php';
// checar el request y action
//Ponerle el mismo estilo
//Hacer paginacion
// Logica
// VOLVERLO MVC
$persona = new Persona();
$modelo = new Personas_modelo();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $persona->__SET('id',              $_REQUEST['id']);
            $persona->__SET('nombre',          $_REQUEST['Nombre']);
            $persona->__SET('apellido',        $_REQUEST['Apellido']);
            $persona->__SET('direccion', $_REQUEST['Direccion']);
            $modelo->editar_persona($persona);
            header('Location: index.php');
            break;

        case 'registrar':
            $persona->__SET('nombre',          $_REQUEST['Nombre']);
            $persona->__SET('apellido',        $_REQUEST['Apellido']);      
            $persona->__SET('direccion', $_REQUEST['Direccion']);

            $modelo->insertar_persona($persona);
            header('Location: index.php');
            break;

        case 'eliminar':
            $modelo->borrar_persona($_REQUEST['id']);
            header('Location: index.php');
            break;

        case 'editar':
            $persona = $modelo->getPersona($_REQUEST['id']);
			
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MVC CRUD</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    </head>
    <body >

        <div class="pure-g">
            <div class="pure-u-1-12">
                
                <form action="?action=<?php echo $persona->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" >
                    <input type="hidden" name="id" value="<?php echo $persona->__GET('id'); ?>" />
                    
                    <table >
                        <tr>
                            <th >Nombre</th>
                            <td><input type="text" name="Nombre" value="<?php echo $persona->__GET('nombre'); ?>"  /></td>
                        </tr>
                        <tr>
                            <th >Apellido</th>
                            <td><input type="text" name="Apellido" value="<?php echo $persona->__GET('apellido'); ?>"  /></td>
                        </tr>
                      
                        <tr>
                            <th >Direccion</th>
                            <td><input type="text" name="Direccion" value="<?php echo $persona->__GET('direccion'); ?>"  /></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th >Nombre</th>
                            <th >Apellido</th>                     
                            <th >Direccion</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($modelo->get_personas() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            <td><?php echo $r->__GET('apellido'); ?></td>    
                            <td><?php echo $r->__GET('direccion'); ?></td>
                            <td>
                                <a href="?action=editar&id=<?php echo $r->__GET('id'); ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->__GET('id'); ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>     
              
            </div>
        </div>

    </body>
</html>