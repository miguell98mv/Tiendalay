<h1>Editar articulo</h1>
<p id="mensaje"></p>
<form class="add" method="POST" name="formulario" id="formulario">
    <div class="conte1">
    <input type="text" alt="Articulo" name="articulo" placeholder="Articulo" value='<?php echo $dataEditArticle['name']?>'>
        <input type="text" alt="Precio" name="precio" placeholder="Precio" value="<?php echo $dataEditArticle['price']?>">
        <input type="text" alt="Costo" name="costo" placeholder="Costo" value="<?php echo $dataEditArticle['cost']?>">
        <input type="hidden" name="id" value="<?php echo $dataEditArticle['id']?>">
        <input type="hidden" name="nameCategory" value="<?php echo $dataEditArticle['category']?>">
        <div>
            <div class="optionSelect">
                <input id="label" type="text" placeholder="Etiqueta" value="<?php if($dataEditArticle['label']==='Ninguno'){}else{echo $dataEditArticle['label'];}?>">
            </div>
            <div class="optionSelect">
                <select id="category">
                    <option>Categoria</option>
                </select>
            </div>
        </div>
    </div>

    <div class="conte2">
        <textarea alt="Descripcion" name="descripcion" placeholder="Descripcion" cols="30" rows="10" maxlength="150"><?php echo $dataEditArticle['description']?></textarea>
    </div>
    
    <input type="button" id="loadFileXml" value="Subir imagen" onclick="document.getElementById('filee').click();" />
    <input type="file" style="display:none;" id="filee" name="file"/>
    <input type="button" name="añadir" value="Guardar" id="añadir">
</form>

<script src="<?php echo URL?>public/gestor_de_contenido/editArticle.js"></script>