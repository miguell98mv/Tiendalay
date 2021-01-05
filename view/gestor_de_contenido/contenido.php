<h1>Añadir</h1>
<p id="mensaje"></p>
<form class="add" method="POST" name="formulario" id="formulario">
<input type="text" alt="Articulo" name="articulo" placeholder="Articulo">
<input type="text" alt="Precio" name="precio" placeholder="Precio">
<input type="text" alt="Costo" name="costo" placeholder="Costo">
<input type="text" alt="Descripcion" name="descripcion" placeholder="Descripcion">
<div>
<div class="optionSelect">
    <select id="category">
        <option>Categoria</option>
        <option>Automil</option>
        <option>Electrodomestico</option>
        <option>Tegnologia</option>
    </select>
</div>
<div class="optionSelect">
    <select id="labelSelection">
        <option>Etiqueta</option>
        <option>Automil</option>
        <option>Electrodomestico</option>
        <option>Tegnologia</option>
    </select>
</div>
</div>
<input type="button" id="loadFileXml" value="Subir imagen" onclick="document.getElementById('filee').click();" />
<input type="file" style="display:none;" id="filee" name="file"/>
<input type="button" name="añadir" value="Guardar" id="añadir">
</form>

<div id="getContainer">
    <table id="tableArticles">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Costo</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Etiqueta</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </table>
</div>
<script src="<?php echo URL?>public/gestor_de_contenido/addArticle.js"></script>