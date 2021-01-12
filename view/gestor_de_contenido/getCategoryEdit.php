<h1>Añadir Categoria</h1>
<p id="mensaje"></p>
<form class="add" method="POST" name="formulario" id="formulario">
    <div class="conte1">
        <input type="text" alt="Categoria" name="categoria" placeholder="Categoria" value="<?php echo $dataCategoryArticle['Category'];?>" disabled>
        <textarea alt="Descripcion" name="descripcion" placeholder="Descripcion" cols="30" rows="10" maxlength="150"><?php echo $dataCategoryArticle['Description']; ?></textarea>
        <input type="button" name="añadir" value="Guardar" id="añadir">
    </div>
</form>

<script src="<?php echo URL?>public/gestor_de_contenido/editCategory.js"></script>