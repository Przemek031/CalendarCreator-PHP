<!Doctype HTML>
<html>
<head>
<style>
table
{

border-style:solid;
border-width:1px;
border-color:black;
}
th
{
font-size:25px;
padding:10px;
}
#nd 
{
color:red;
}
#choosenday
{
 background:lightgrey;
}
</style>
</head>
<body>
</br>
<h3>Proszę podać datę aby wygenerować odpowiednią kartkę z kalendarza</h3>
<form action="zad1.php" method="POST">
<input type="date" name="data">
<input type="submit" name="Generate"value="Generate">
</form>
</br></br><center>
<?php
if (isset($_POST['Generate']) && (null !== $_POST["data"]))
{
$inputdate = strtotime($_POST['data']);
if($inputdate)
    {
        echo "<table border='1'><tr><th>Pon </th><th>Wto </th><th>Śro </th><th>Czw </th><th>Pią </th><th>Sob </th><th id='nd'>Nie </th></tr>";
    $d = date('d',$inputdate);
    $m = date('m',$inputdate);
    $y = date('Y',$inputdate);
    $amountdays = date('t',$inputdate);
    $firstday = (date("N", mktime(0,0,0,$m,1,$y)))-1;
    echo "Podana data to ".$d."-".$m."-".$y;
    
$day = 1;
$k=0;
$nd=0;
for($i=0;$i<6;$i++)
{
$da=7;
echo "<tr>";
for($j=0;$j<$da;$j++)
    {
    for(;$k<$firstday;$k++)
        {
        echo "<th></th>";
        $da--;
        $nd++;
        }
    if($day > $amountdays)
        {
        break;
        }
    else if($j==6)
        {
        echo "<th id='nd'>".$day."</th>";
        $day++;
        }
    else if(($nd+$day)==7)
        {
        echo "<th id='nd'>".$day."</th>";
        $day++;
        }
    else if($d == $day)
        {
        echo "<th id='choosenday'>".$day."</th>";
        $day++;
        }
    else
        {
        echo "<th>".$day."</th>";
        $day++;
        }
    }
echo "</tr>";
}
}}
?>
</table>
</center>
</body>
</html>