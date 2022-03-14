<?php
defined('_magaz') or die;
$hcolor = "#884422";
$bcolor = "#cccccc";
$addbbz = "</b>";
if (LANG == 'ru') {
	$months=array("Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
	$value[1] = "Пн|Вт|Ср|Чт|Пт|Сб|Вс|";
} else {
	$months=array("January","February","March","April","May","June","July","August","September","October","November","December");
	$value[1] = "M|T|W|T|F|S|S|";
}
$qi = "2"; $value[2] = "";
$daysamount = date('t',time())+1;
$weeks = floor($daysamount/7);
$firstday = date('w',mktime(0,0,0,date('n'),0,date('y')));
for($i=0;$i<$firstday;$i++) {$value[$qi].="|";}
for($q=1;$q<$daysamount;$q++) {$value[$qi].="$q|"; if(intval (($i+$q)/7)==($i+$q)/7) {$qi++; $value[$qi]="";}}
$vmax=count($value); $i="0"; $ii="0"; $add="";
echo "<div class='kip'><table align='center' border='1' cellpadding='1' cellspacing='0' bordercolor=$bcolor><caption><font face='Verdana' size='-1'><b>". $months[date('n')-1] ."</b></font></caption><tr align='middle' valign='middle'>";
 while ($ii<"7") {
   if ($ii=="6") {$add="class='sun'";} else {$add="";}
    while ($i<$vmax) {$i++;
       $rdt=explode("|", $value[$i]);
       if ($ii=="6") {$add="class='sun'";} else {$add="";}
       if (!isset($rdt[$ii])) {$add=""; $rdt[$ii]="&nbsp;";} else {if ($rdt[$ii]=="") {$add=""; $rdt[$ii]="&nbsp;";}}
       if ($i=="1") {$addbb="<b>";} else {$addbb="";}
       if($rdt[$ii]==date('d')) {$addse="class='seg'"; } else {$addse="";}
       echo "<td "; if ($addse=="class='seg'") $add="";
       echo "$addse $add width='22'>$addbb$rdt[$ii]"; if ($addbb=='<b>') echo $addbbz;
       echo "</td>\r\n";
      }
   if ($ii<"6") {echo "</tr><tr align='middle' valign='middle'>\r\n";}
   $i="0"; $ii++;
   }
echo "</tr></table></div>";
