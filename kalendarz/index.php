<html>
<head>
</head>
<body>
<?PHP


  $year = date("Y");
  $monthNum = date("n");
  $daysofmonth = date("t");
  $dayofweek = date("w");
  $dayofmonth = date("j");
  $firstdayofmonth = date("w", mktime(0,0,0,$monthNum, 1, $year));


  if (isset($_POST['wstecz']))
  {
  $fp=fopen("wstecz.txt","w+");
  $stare=fread($fp, 100);
  $nowe=$stare+1;
  fputs($fp, $nowe);

  $dayofmonth=$dayofmonth-7*$nowe;


  }


  if (isset($_POST['dalej']))
  {
  $fp=fopen("dalej.txt","w+");
  $stare=fread($fp, 100);
  $nowe=$stare+1;
  fputs($fp, $nowe);

  $dayofmonth=$dayofmonth+7*$nowe;


  }



  if($dayofweek == 0) $dayofweek = 7;
  if($firstdayofmonth == 0) $firstdayofmonth = 7;

  switch($monthNum){
    case 1 : $monthName = "Styczeń";break;
    case 2 : $monthName = "Luty";break;
    case 3 : $monthName = "Marzec";break;
    case 4 : $monthName = "Kwiecień";break;
    case 5 : $monthName = "Maj";break;
    case 6 : $monthName = "Czerwiec";break;
    case 7 : $monthName = "Lipiec";break;
    case 8 : $monthName = "Sierpień";break;
    case 9 : $monthName = "Wrzesień";break;
    case 10 : $monthName = "Październik";break;
    case 11 : $monthName = "Listopad";break;
    case 12 : $monthName = "Grudzień";break;
  }

  echo("<TABLE><TR>");
  echo("<TD bgcolor='yellow' align='center' colspan='7'>");
  echo($monthName." ".$year);
  echo('</TD></TR><TR>');
  ?>
  <TR>
  <TD align="center" bgcolor="pink">Pn</TD>
  <TD align="center" bgcolor="pink">Wt</TD>
  <TD align="center" bgcolor="pink">Sr</TD>
  <TD align="center" bgcolor="pink">Cz</TD>
  <TD align="center" bgcolor="pink">Pi</TD>
  <TD align="center" bgcolor="pink">So</TD>
  <TD align="center" bgcolor="pink">Nd</TD>
  </TR>

  <?php
  $j = $daysofmonth + $firstdayofmonth - 1;
  $i=$dayofmonth-$dayofweek +4;
  $k=1;

  while ($i < $j){
   /* if($i < $firstdayofmonth - 1){
      echo("<TD bgcolor='white'></TD>");
      continue;
    }

    if(($i % 7) == 0){
      echo("</TR><TR>");
    }*/
    if(($i - $firstdayofmonth + 2) == $dayofmonth){
      $color = "yellow";
    }
    else{
      $color = "green";
    }
    echo("<TD bgcolor='$color' align='center'>");
    echo($i - $firstdayofmonth + 2);
    echo("</TD>");


  if($dayofweek==1 and $i - $firstdayofmonth + 2==$dayofmonth+6 )
  {
  echo ("</table>");
  break;}


  if($dayofweek==2 and $i - $firstdayofmonth + 2==$dayofmonth+5 )
  {
  echo ("</table>");
  break;}


  if($dayofweek==3 and $i - $firstdayofmonth + 2==$dayofmonth+4 )
  {
  echo ("</table>");
  break;}


  if($dayofweek==4 and $i - $firstdayofmonth + 2==$dayofmonth+3 )
  {
  echo ("</table>");
  break;}


  if($dayofweek==5 and $i - $firstdayofmonth + 2==$dayofmonth+2 )
  {
  echo ("</table>");
  break;}

  if($dayofweek==6 and $i - $firstdayofmonth + 2==$dayofmonth+1 )
  {
  echo ("</table>");
  break;}

  if($dayofweek==7 and $i - $firstdayofmonth + 2==$dayofmonth+0 )
  {
  echo ("</table>");
  break;}
$i++;
  }

/**/


?>
<form action="index.php" method="POST">
<button name="wstecz" > wstecz </button>
<button name="dalej" > dalej </button>
</form>

</body>
</html>
