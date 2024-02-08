<head>
  <title>PHP Test</title>
  <meta http-equiv="Page-Enter" content="revealTrans(Duration='4.0', Transition='12')">
  <meta http-equiv="Page-Exit" content="revealTrans(Duration='4.0', Transition='12')">
</head>
<body>
<?php

$host= "sql11.freemysqlhosting.net";
$user= "sql11682695";
$pass= "PuXjf7Arf7";
$db=   "sql11682695";

$conn = mysqli_connect($host, $user, $pass, $db) 
    or die("Ошибка " . mysqli_error($conn));
$query="SELECT Item_name, Item_price, MouseOrKey_Res, Manuf_Name, Con_Name, Color_Name, Keyg
FROM Items
JOIN Mouse_Or_Key ON Items.Item_Type = Mouse_Or_Key.MouseOrKey_id
JOIN Manuf ON Items.Item_Company = Manuf.Manuf_id
JOIN Connector ON Items.Item_Connector = Connector.Con_id
JOIN Color ON Items.Item_Color = Color.Color_id
JOIN KeyboardKeys ON Items.Item_Bttns = KeyboardKeys.Key_id;";
$res= mysqli_query($conn,$query);
$result = mysqli_query($conn, $query) or die("Error" . mysqli_error($conn));
if($result)
{
    $rows=mysqli_num_rows($result);
    echo"<table><tr><th> Item_name  </th><th> Item_image </th><th> Item_price </th><th> Item_type </th><th> Item_Company </th><th> Item_connector </th><th> Item_color </th><th> Item_buttons   </th></tr>";
    while($row=mysqli_fetch_row($result))
    {
        echo "<tr>";
        for($i=0;$i<7;$i++)
            echo "<td> $row[$i] </td>";
        echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "подключение к базе данных не выполнено!!";
}
mysqli_close($conn);

?>
  </body>
</html>
