<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reprezentacja Graficzna</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id='settings'>
        <form action="" method="get">
            <div id='m'>m: <input id='m_value' type="number" name="m"></div>
            <div id='n'>n: <input id='n_value' type="number" name="n"></div>
            <button type="submit">Rysuj</button>
        </form>
    </div>
    <div id='box'>
        <?php
            $colors = array(
                "#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#00FFFF", "#FF00FF", "#FFA500", "#800080", "#00FF00", "#FFC0CB", 
                "#008080", "#E6E6FA", "#A52A2A", "#F5F5DC", "#800000", "#808000", "#000080", "#808080", "#FFFFFF", "#000000", 
                "#FF6347", "#FFD700", "#ADFF2F", "#4B0082", "#8A2BE2", "#D2691E", "#5F9EA0", "#FF7F50", "#6495ED", "#DC143C", 
                "#00CED1", "#008B8B", "#B8860B", "#A9A9A9", "#006400", "#BDB76B", "#8B008B", "#556B2F", "#FF8C00", "#9932CC", 
                "#8B0000", "#E9967A", "#8FBC8F", "#483D8B", "#2F4F4F", "#00CED1", "#9400D3", "#FF1493", "#00BFFF", "#696969", 
                "#1E90FF", "#B22222", "#FFFAF0", "#228B22", "#FF00FF", "#DCDCDC", "#F8F8FF", "#FFD700", "#DAA520", "#BEBEBE", 
                "#808080", "#00FF00", "#7CFC00", "#32CD32", "#FAF0E6", "#FF00FF", "#800000", "#66CDAA", "#0000CD", "#BA55D3", 
                "#9370DB", "#3CB371", "#7B68EE", "#00FA9A", "#48D1CC", "#C71585", "#191970", "#FFE4E1", "#FFE4B5", "#FFDEAD", 
                "#000080", "#FDF5E6", "#808000", "#6B8E23", "#FFA07A", "#BDB76B", "#E6E6FA", "#FFF0F5", "#FFA500", "#FF4500", 
                "#DA70D6", "#EEE8AA", "#98FB98", "#AFEEEE", "#DB7093", "#FFDAB9", "#CD853F", "#FFC0CB", "#DDA0DD", "#B0E0E6", 
                "#800080", "#FF0000"
            );

            if (isset($_GET['m']) && isset($_GET['n'])) {
                $m_value = intval($_GET['m']);
                $n_value = intval($_GET['n']);
            }
            function fxy($x, $y, $m, $n) {
                $score = (($x-$y) % $m) * $n + ($y % $n) + 1;
                return $score;
            }

            echo "<table>";
            for ($i = 0; $i < 25; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 25; $j++) {
                    $number = fxy($j, $i, $m_value, $n_value);
                    #minimalna wartosc - maksymalna wartosc !!! (od Janka)
                    echo "<td>";
                    echo $number;
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</body>
</html>