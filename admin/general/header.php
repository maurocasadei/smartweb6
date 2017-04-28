<?php if (! isset($_GET["modal"])){?> 
<header class="qpc-main-header">
  <a href="#0" class="qpc-logo"><img src="build/images/<?php echo $config["logoadmin"]?>" alt="Logo"></a>
  <div class="qpc-search is-hidden">
    <form action="#0">
      <input type="search" placeholder="<?php printLabel($config["lang"],"l9")?>">
    </form>
  </div> <!-- qpc-search -->
  <a href="#0" class="qpc-nav-trigger"><span></span></a>
  <nav class="qpc-nav">
    <ul class="qpc-top-nav">
      <li><a href="#0">Supporto</a></li>
      <li class="has-children account">
        <a href="#0">
          <img src="build/images/<?php echo $config["logo"]?>" alt="avatar">
          <?php echo $_SESSION["username"]?>
        </a>
        <ul>
          <li><a href="#0">Account</a></li>
          <li><a href="#0">Modifica Account</a></li>
          <li><a href="#0">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header> <!-- .qpc-main-header -->
<?php }?>