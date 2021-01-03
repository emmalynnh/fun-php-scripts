<? 

//======================================================================
// fun-php-scripts - PHP CLI CLOCK
//======================================================================

/*
* Run from shell with the following command:
*
*   php clock.php
*
*/

function clock() {
  for ($i = 0; ++$i;) {
    system('clear');
    echo date(("m/d/Y h:i:sa"));
    sleep(1);
  }
}

clock();
?>

