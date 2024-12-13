<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Evaluación</title>
    <link rel="stylesheet" href="css/all.min.css" />
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css" /> -->
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/main.js"></script>
  </head>

  <body>

  <?php
    if(isset($list)) {
    ?> 
        
        <?php if(isset($message)) { ?> 
    
        <div class="alert">El menu se guardo correctamente</div>

        <?php } ?>
        
        <?php if(isset($message_update)) { ?> 
    
        <div class="alert">El menu se actualizo correctamente</div>

        <?php } ?>

        <?php if(isset($message_delete)) { ?> 
    
        <div class="alert">El menu se elimino correctamente</div>

        <?php } ?>

        <div class="main_div">
            <a href="/new" class="button_main"><i class="fa-solid fa-plus"></i> Nuevo Menu</a>
            <a href="/menu" class="button_main"><i class="fa-solid fa-eye"></i> Ver Menu</a>
        </div>
        <br>


        <table>
            <thead>
                <tr >
                    <td colspan="5" class="table_header">Menu</td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Menu Padre</td>
                    <td>Descripción</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $value) { ?> 
                <tr>
                    <td><?php echo $value['id']; ?> </td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['parent']; ?></td>
                    <td><?php echo $value['description']; ?></td>
                    <td><a href="/edit?id=<?php echo $value['id']; ?>" class="button"><i class="fa-solid fa-pen-to-square"></i> Editar</a>   <a onclick="remove(<?php echo $value['id']; ?>);" href="#" class="button"><i class="fa-solid fa-trash"></i> Eliminar</a></td>
                </tr>
            <?php } ?>     
            </tbody>
        </table>
    <?php
    }
    ?>

    <?php
    if(isset($menu)) {
    ?> 
        <div class="main_div">
            <a href="/" class="button_main"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
        <br>

        <nav role="navigation">
            <ul>
                <?php
                    echo $menu;
                ?>  
            </ul>
        </nav>

        <div  id="menu_description" class="centered">
        </div>
    <?php
    }
    ?>



    <?php
    if(isset($new)) {
    ?> 

    <div class="div_form">
    <div class="form-style-2-heading">Nuevo Menu</div>
    <form method="post" name="form_menu" action="/store" onsubmit="return validateForm()">
       
        <label for="country">Menu Padre</label>
        <select id="menu" name="menu">
            <option value="0">Seleccione una Opción</option>
            <?php foreach($all_menu as $value) { ?> 
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?> 
        </select>

        <label for="fname">Nombre</label>
        <input type="text" id="name" name="name" placeholder="">

        <label for="lname">Descripción</label>
        <textarea class="textarea" id="description" name="description" ></textarea>
    
        <button type="submit" class="button">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>

        <a class="frm_btn_back" href="/"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
    </form>
    </div>

    <?php
    }
    ?>


    <?php
    if(isset($store)) {
    ?> 
    <script>
        window.location.href = "/?message=true"; 
    </script>
    <?php
    }
    ?>

<?php
    if(isset($edit)) {
    ?> 

    <div class="div_form">
    <div class="form-style-2-heading">Editar Menu</div>
    <form method="post" name="form_menu" action="/update" onsubmit="return validateForm()">
        <input type="hidden" name="menu_id" value="<?php echo $menu_id; ?>" >
        <label for="country">Menu Padre</label>
        <select id="menu" name="menu">
            <option value="0">Seleccione una Opción</option>
            <?php foreach($all_menu as $value) { ?> 
            <option <?php if($edit[0]['parent_id'] == $value['id']) { ?> selected <?php } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?> 
        </select>

        <label for="fname">Nombre</label>
        <input type="text" id="name" name="name" value="<?php echo $edit[0]['name']; ?>">

        <label for="lname">Descripción</label>
        <textarea class="textarea" id="description" name="description" ><?php echo $edit[0]['description']; ?></textarea>
    
        <button type="submit" class="button">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>


        <a class="frm_btn_back" href="/"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
    </form>
    </div>

    <?php
    }
    ?>

<?php
    if(isset($update)) {
    ?> 
    <script>
        window.location.href = "/?message_update=true"; 
    </script>
    <?php
    }
    ?>











  </body>

  


</html>