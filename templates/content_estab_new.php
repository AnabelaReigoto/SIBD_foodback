<div class="content_edit_new_def">
  <div class="title">
    <h1>Criar um novo Estabelecimento</h1>
  </div>

  <div class="data">
    <form method="post" action="action/estab_new.php" enctype="multipart/form-data">
      <h3>Foto</h3>
      <div class="change_photos">
        <input type="file" name="image_photo">
      </div> <?//TIRAR?>
      <label><b>Nome:</b></label>
      <input type="text" placeholder="Nome" name="name" required>

      <label><b>Morada:</b></label>
      <input type="text" placeholder="Morada" name="address" required>
      <input type="text" placeholder="Zona" name="zone" required>
      <input type="text" placeholder="Cidade" name="city" required>

      <label><b>Categoria:</b></label>
      <select name="category" required>
          <option value="Restaurante">Restaurante</option>
          <option value="Bar">Bar</option>
          <option value="Café">Café</option>
          <option value="Sobremesa">Sobremesa</option>
      </select><p></p>

      <label><b>Cozinha:</b></label>
      <select name="cuisine" required>
          <option value="Portuguesa">Portuguesa</option>
          <option value="Italiana">Italiana</option>
          <option value="Chinesa">Chinesa</option>
          <option value="Japonesa">Japonesa</option>
          <option value="Marisqueira">Marisqueria</option>
          <option value="Hamburgaria">Hamburgaria</option>
          <option value="Café">Café</option>
          <option value="Bar">Bar</option>
          <option value="Sobremesas">Sobremesas</option>
      </select><p></p>

      <label><b>Preço para 2 pessoas:</b></label>
      <input type="text" placeholder="Preço para 2 pessoas" name="price" required>

      <label><b>Horário:</b></label>
      <input type="text" placeholder="Horário" name="schedule1" required>

      <input type="text" placeholder="Horário" name="schedule2" >

      <label><b>Contacto:</b></label>
      <input type="text" placeholder="Contacto" name="contact" >

      <div class="specs">
        <div class="spec_row">
          <input type="checkbox" name="wifi" value="wifi" >
          <h5>Wifi</h5>
        </div>

        <div class="spec_row">
          <input type="checkbox" name="takeaway" value="takeaway" >
          <h5>Take Away</h5>
        </div>

        <div class="spec_row">
          <input type="checkbox" name="terrace" value="terrace" >
          <h5>Esplanada</h5>
        </div>

        <div class="spec_row">
          <input type="checkbox" name="delivery" value="delivery" >
          <h5>Entrega ao Domicílio</h5>
        </div>

        <div class="spec_row">
          <input type="checkbox" name="music" value="music" >
          <h5>Música ao Vivo</h5>
        </div>
      </div>
      <h3>Adicionar Menu</h3>
      <div class="change_menu">
        <h5>Upload de foto </h5>
        <input name="upload[]" type="file" multiple="multiple">
      </div>


      <button class="enterbtn" type="submit">Criar</button>
    </form>
  </div>
</div>
