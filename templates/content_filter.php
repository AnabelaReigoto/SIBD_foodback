<div class="content_filter">
  <div class="filter">
    <h2>Filtros</h2>
    <h3>Características</h3>
    <form action="searching.php" method="get">
      <input type="checkbox" name="wifi" value="wifi" <?if (isset($_GET['wifi'])) {?>checked<?}?>>Wifi<br>
      <input type="checkbox" name="terrace" value="terrace" <?if (isset($_GET['terrace'])) {?>checked<?}?>>Esplanada<br>
      <input type="checkbox" name="takeaway" value="takeaway" <?if (isset($_GET['takeaway'])) {?>checked<?}?>>Take Away<br>
      <input type="checkbox" name="delivery" value="delivery" <?if (isset($_GET['delivery'])) {?>checked<?}?>>Entregas ao Domicílio<br>
      <input type="checkbox" name="music" value="music" <?if (isset($_GET['music'])) {?>checked<?}?>>Música ao vivo<br>
    <h3>Cozinha</h3>
      <input type="checkbox" name="pt" value="pt" <?if (isset($_GET['pt'])) {?>checked<?}?>>Portuguesa<br>
      <input type="checkbox" name="it" value="it" <?if (isset($_GET['it'])) {?>checked<?}?>>Italiana<br>
      <input type="checkbox" name="ch" value="ch" <?if (isset($_GET['ch'])) {?>checked<?}?>>Chinesa<br>
      <input type="checkbox" name="jp" value="jp" <?if (isset($_GET['jp'])) {?>checked<?}?>>Japonesa<br>
      <input type="checkbox" name="mar" value="mar" <?if (isset($_GET['mar'])) {?>checked<?}?>>Marisqueira<br>
      <input type="checkbox" name="ham" value="ham" <?if (isset($_GET['ham'])) {?>checked<?}?>>Hamburgueria<br>
      <input type="checkbox" name="coffee" value="coffee" <?if (isset($_GET['coffee'])) {?>checked<?}?>>Café<br>
      <input type="checkbox" name="bar" value="bar" <?if (isset($_GET['bar'])) {?>checked<?}?>>Bar<br>
      <input type="checkbox" name="sweet" value="sweet" <?if (isset($_GET['sweet'])) {?>checked<?}?>>Sobremesa<br>
    <h3>Custo para 2 pessoas:</h3>
      <input type="radio" name="radio" value="cost_desc" <?if (isset($_GET['radio']) && $_GET['radio']=='cost_desc') {?>checked<?}?>>Descendente<br>
      <input type="radio" name="radio" value="cost_asc" <?if (isset($_GET['radio']) && $_GET['radio']=='cost_asc') {?>checked<?}?>>Ascendente<br>
      <input type="checkbox" name="10" value="10" <?if (isset($_GET['10'])) {?>checked<?}?>>Menos de 10€<br>
      <input type="checkbox" name="20" value="20" <?if (isset($_GET['20'])) {?>checked<?}?>>Entre 10€ e 20€<br>
      <input type="checkbox" name="30" value="30" <?if (isset($_GET['30'])) {?>checked<?}?>>Entre 20€ e 30€<br>
      <input type="checkbox" name="40" value="40" <?if (isset($_GET['40'])) {?>checked<?}?>>Entre 30€ e 40€<br>
      <input type="checkbox" name="50" value="50" <?if (isset($_GET['50'])) {?>checked<?}?>>Mais de 40€<br>
    <h3>Popularidade</h3>
      <input type="radio" name="radio" value="pop_desc" <?if (isset($_GET['radio']) && $_GET['radio']=='pop_desc') {?>checked<?}?>>Descendente<br>
      <input type="radio" name="radio" value="pop_asc" <?if (isset($_GET['radio']) && $_GET['radio']=='pop_asc') {?>checked<?}?>>Ascendente<br>
    <h3>Localização</h3>
      <h4>Porto</h4>
      <!-- <select id="city" onchange="showZones(this.value)">
        <option value='0'>-</option>
        <option value='1'>Porto</option>
        <option value='2'>Lisboa</option>
      </select> -->
      <div id="porto_zones">
        <input type="checkbox" name="All_Porto" value="All_Porto" <?if (isset($_GET['All_Porto'])) {?>checked<?}?>>Todos<br>
        <input type="checkbox" name="Baixa" value="Baixa" <?if (isset($_GET['Baixa'])) {?>checked<?}?>>Baixa<br>
        <input type="checkbox" name="Boavista" value="Boavista" <?if (isset($_GET['Boavista'])) {?>checked<?}?>>Boavista<br>
        <input type="checkbox" name="Foz" value="Foz" <?if (isset($_GET['Foz'])) {?>checked<?}?>>Foz<br>
        <input type="checkbox" name="Matosinhos" value="Matosinhos" <?if (isset($_GET['Matosinhos'])) {?>checked<?}?>>Matosinhos<br>
        <input type="checkbox" name="Cedofeita" value="Cedofeita" <?if (isset($_GET['Cedofeita'])) {?>checked<?}?>>Cedofeita<br>
        <input type="checkbox" name="Batalha" value="Batalha" <?if (isset($_GET['Batalha'])) {?>checked<?}?>>Batalha<br>
        <input type="checkbox" name="Trindade" value="Trindade" <?if (isset($_GET['Trindade'])) {?>checked<?}?>>Trindade<br>
      </div>
      <h4>Lisboa</h4>
      <div id="lisbon_zones">
        <input type="checkbox" name="All_Lisboa" value="All_Lisboa" <?if (isset($_GET['All_Lisboa'])) {?>checked<?}?>>Todos<br>
        <input type="checkbox" name="Belém" value="Belém" <?if (isset($_GET['Belém'])) {?>checked<?}?>>Belém<br>
        <input type="checkbox" name="Rato" value="Rato" <?if (isset($_GET['Rato'])) {?>checked<?}?>>Rato<br>
        <input type="checkbox" name="Chiado" value="Chiado" <?if (isset($_GET['Chiado'])) {?>checked<?}?>>Chiado<br>
        <input type="checkbox" name="Saldanha" value="Saldanha" <?if (isset($_GET['Saldanha'])) {?>checked<?}?>>Saldanha<br>
        <input type="checkbox" name="Bairro Alto" value="Bairro Alto" <?if (isset($_GET['Bairro Alto'])) {?>checked<?}?>>Bairro Alto<br>
        <input type="checkbox" name="Príncipe Real" value="Príncipe Real" <?if (isset($_GET['Príncipe Real'])) {?>checked<?}?>>Príncipe Real<br>
      </div>
    <div class="filter_search">
      <input type="submit" value="Pesquisar">
    </div>
    </form>
  </div>
</div>
