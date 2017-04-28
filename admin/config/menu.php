<?php if (! isset($_GET["modal"])){?> 
		<nav class="qpc-side-nav">
			<ul>
				<li class="qpc-label">Main</li>
				<li class="overview">
					<a href="#" sect="dashboard"  lev="dv" class="amenu">Dashboard</a>
				</li>
				<li class="has-children comments">
					<a href="#" sect="operatori" lev="list"><i class="ti-home"></i> <span><?php printLabel($config["lang"],"menu1"); ?></span></a>
				</li>
				<li class="has-children notifications active">
					<a href="#" sect="menu" lev="list"><i class="ti-home"></i> <span><?php printLabel($config["lang"],"menu2"); ?></span></a>
				</li>
				<li class="bookmarks">
					<a href="#" sect="pagine" lev="list"><i class="ti-home"></i> <span><?php printLabel($config["lang"],"pagine1"); ?></span></a>
				</li>
				<li class="images">
					<a href="#" sect="news" lev="list"><i class="ti-home"></i> <span><?php printLabel($config["lang"],"news1"); ?></span></a>
					<a href="#" sect="album" lev="list"><i class="ti-home"></i> <span><?php printLabel($config["lang"],"album1"); ?></span></a>
					<a href="#" sect="filemanager" lev="dialog"><i class="ti-home"></i> <span><?php printLabel($config["lang"],"filemanager1"); ?></span></a>
					<a href="pagine.php">Pagine<span class="count">4</span></a>
				</li>
        
			</ul>
		</nav>
<?php }?>    