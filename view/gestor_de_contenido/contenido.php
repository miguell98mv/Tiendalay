<link rel="stylesheet" href="<?php echo URL?>public/gestor_de_contenido/content.css">
<script src="<?php echo URL?>public/gestor_de_contenido/gestor_de_contenido.js"></script>

<h1>Añadir articulo</h1>
<p id="mensaje"></p>
<form class="add" method="POST" name="formulario" id="formulario">
    <div class="conte1">
        <input type="hidden" name="urlname" value="<?php if(isset($url[2])) echo $url[2]; ?>">
        <input type="text" alt="Articulo" name="articulo" placeholder="Articulo">
        <input type="text" alt="Precio" name="precio" placeholder="Precio">
        <input type="text" alt="Costo" name="costo" placeholder="Costo">
        <div>
            <div class="optionSelect">
                <input id="label" type="text" placeholder="Etiqueta">
            </div>
            <div class="optionSelect">
                <select id="category">
                    <option>Categoria</option>
                </select>
            </div>
        </div>
    </div>

    <div class="conte2">
        <textarea alt="Descripcion" name="descripcion" placeholder="Descripcion" cols="30" rows="10" maxlength="150"></textarea>
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
<div id="paginacion"></div>


<script src="<?php echo URL?>public/gestor_de_contenido/addArticle.js"></script>