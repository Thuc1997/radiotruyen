
<?php 
$content = file_get_contents('https://blogradio.vn/radio-online-cm687.html');     
$subject = $content;
$parent ='#class="item".*<img src="(.*)">.*</div>#imsU';
preg_match_all($parent,$subject,$matchet);
$matchet1 = array_slice($matchet[1],0,8);


?>