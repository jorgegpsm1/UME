<li class="sub-menu">
  <a href=""><i class="zmdi zmdi-view-compact"></i>Secretaria</a>
  <ul>
	<?php 
		foreach(self::$USER_ACCESS[1][$Department-1] as $Area){
			switch($Area){
		    case 1:
		   		require_once($_SESSION['BASE_DIR_BACKEND'].'/view/include/Secretaria/area/citas.php');
		    break;
		  }
		} 
	?>
  </ul>
</li>