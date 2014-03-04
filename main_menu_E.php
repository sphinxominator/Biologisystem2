	<?php
		$path = $_SERVER['PHP_SELF'];
		$page = basename($path);
		$page = basename($path, '.php');
	?>
	
	<ul>
		<li><a<?php if($page == 'index'): ?> class="active"<?php endif ?> href="index.php"><span>Home</span></a></li>
		<li><a<?php if($page == 'projekter'): ?> class="active"<?php endif ?> href="projekter.php"><span>XXX</span></a></li>
		<li><a<?php if($page == 'about'): ?> class="active"<?php endif ?> href="about.php"><span>XXX</span></a></li>
		<li><a<?php if($page == 'kontakt'): ?> class="active"<?php endif ?> href="kontakt.php"><span>XXX</span></a></li>
	</ul>
	
		