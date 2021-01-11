<link rel="stylesheet" href="<?php echo URL?>public/gestor_de_contenido/category.css">



<h1>Añadir Categoria</h1>
<p id="mensaje"></p>
<form class="add" method="POST" name="formulario" id="formulario">
    <div class="conte1">
        <input type="hidden" name="urlname" value="<?php if(isset($url[2])) echo $url[2]; ?>">
        <input type="text" alt="Categoria" name="categoria" placeholder="Categoria">
        <textarea alt="Descripcion" name="descripcion" placeholder="Descripcion" cols="30" rows="10" maxlength="150"></textarea>
        <input type="button" name="añadir" value="Guardar" id="añadir">
    </div>

    <div class="conte2">
    <div id="getContainer">
    <table id="tableCategory">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </table>
</div>
    <div id="paginacion"></div>
</div>
</form>


<script src="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.js"></script>
<script src="<?php echo URL?>public/gestor_de_contenido/category.js"></script>