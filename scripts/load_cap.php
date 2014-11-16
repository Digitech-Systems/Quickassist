<?php 
$ranStr = md5(microtime());
$ranStr = substr($ranStr, 0, 6);

echo '<img height="60" width="140" id="capImg" src="scripts/captcha.php?df='.$ranStr.'" style="margin: 10px;">
<input type="hidden" id="capVal" name="capVal" value="' .$ranStr.'>';
    
	  ?>
