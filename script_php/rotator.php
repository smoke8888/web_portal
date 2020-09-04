<?php
  # file containg your image descriptions


  function showImage() {
    global $IMG_CONFIG_FILE;
	global $style;
    # if no custom ini file has been specified, use the default
    $ini_file = "images/themes/".$style."/images.ini";
    # read the config file into an array or die trying
    $images = @parse_ini_file($ini_file,true);
    if (! $images) {
      die('Unable to read ini file.');
    }
    # pick a random image from the parsed config file
    $img = array_rand($images);
    # output the IMG tag
	$src = $images[$img]['src'];
    echo "style=\"background: black url('".$src."') no-repeat;\";";
  }


?>
