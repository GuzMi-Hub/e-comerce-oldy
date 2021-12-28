  <!-- BARRA LATERAL -->
  <aside id="lateral">
    <div id="login" class="block_aside">
      <?php if (!isset($_SESSION['identity'])):?>
      <h3>Entrar a la web</h3>
      <form action="<?=base_url?>usuario/login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="password">Contraseña</label>
        <input type="password" name="password">
        <input type="submit" value="Enviar">
      </form>
      <?php else: ?>
      <h3>Bienvenido <?= $_SESSION['identity']->nombre. " " . $_SESSION['identity']->apellidos?></h3>
      <ul>
        <li><a href="">Mis pedidos</a></li>
        <li><a href="">Gestionar pedidos</a></li>
        <li><a href="">Gestionar categorias</a></li>
        <li><a href="<?=base_url?>usuario/logout">Cerrar Session</a></li>
      </ul>
      <?php endif?>
      </div>
  </aside>
  <!-- CONTENIDO CENTRAL -->
  <div id="central">