<h1>Añadir</h1>
<p id="mensaje"></p>
<form class="add" method="POST" name="formulario" id="formulario">
<input type="text" alt="Articulo" name="articulo" placeholder="Articulo">
<input type="text" alt="Articulo" name="precio" placeholder="Precio">
<input type="text" alt="Articulo" name="costo" placeholder="Costo">
<input type="text" alt="Articulo" name="descripcion" placeholder="Descripcion">
<div>
<input type="button" id="loadFileXml" value="Subir imagen" onclick="document.getElementById('filee').click();" />
<input type="file" style="display:none;" id="filee" name="file"/>
<div>
    <p>Categoria</p>
    <select name="">
        <option>Ninguno</option>
        <option>Automil</option>
        <option>Electrodomestico</option>
        <option>Tegnologia</option>
    </select>
</div>
<div>
    <p>Etiqueta</p>
    <select name="">
        <option>Ninguno</option>
        <option>Automil</option>
        <option>Electrodomestico</option>
        <option>Tegnologia</option>
    </select>
</div>
</div>
<input type="button" name="añadir" value="Guardar" id="añadir">
</form>

<script src="<?php echo URL?>public/gestor_de_contenido/addArticle.js"></script>