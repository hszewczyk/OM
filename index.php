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
    <section class="box">
        <div class="left">
            <?php
                $alphabet = range("A", "T");

                if (isset($_GET['m']) && isset($_GET['n'])) {
                    $m_value = intval($_GET['m']);
                    $n_value = intval($_GET['n']);
                }

                function fxy($x, $y, $m, $n) {
                    $diff = $x-$y;
                    while ($diff < 0) {
                        $diff += $m;
                    }
                    $a = ($diff % $m) * $n;
                    $b = $y % $n;
                    $score = $a + $b + 1;
                    $num = array($a, $b, $score);
                    return $num;
                }

                $minvalue = 80;
                $total = intval($m_value) * intval($n_value);
                $shades = array();
                for ($i = 0; $i < $total; $i++) {
                    $greyValue = intval($minvalue + (255 - $minvalue) * ($i / ($total - 1)));
                    $hexValue = sprintf("#%02X%02X%02X", $greyValue, $greyValue, $greyValue);
                    $shades[] = "$hexValue";
                }

                echo "<table>";
                for ($i = 0; $i < 20; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 20; $j++) {
                        $num = fxy($j, $i, $m_value, $n_value);
                        $id = "left_" . $alphabet[$i] . $alphabet[$j];
                        echo "<td id=\"$id\" style=\"background-color:" . $shades[$num[2]] . "\">";
                        echo $num[2];
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                echo "<div class='right'>";
                echo "<section class='both'>";
                echo "<div class='up'>";
                echo "<table>";
                for ($i = 0; $i < 20; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 20; $j++) {
                        $num = fxy($j, $i, $m_value, $n_value);
                        $id = "right_" . $alphabet[$i] . $alphabet[$j];
                        echo "<td class=\"small\" id=\"$id\" style=\"background-color:" . $shades[$num[2]] . "\">";
                        echo $num[0] . "+" . $num[1];
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                ?>
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                        const leftCells = document.querySelectorAll('td[id^="left_"]');
                        const rightCells = document.querySelectorAll('td[id^="right_"]');

                        leftCells.forEach(leftCell => {
                            const corrRightCellId = leftCell.id.replace("left_", "right_");
                            const corrRightCell = document.getElementById(corrRightCellId);

                            leftCell.addEventListener('mousedown', () => {
                                leftCell.style.backgroundColor = 'yellow';
                                corrRightCell.style.backgroundColor = 'yellow';
                            });

                            /*
                            leftCell.addEventListener('mouseout', () => {
                                leftCell.style.backgroundColor = '';
                                corrRightCell.style.backgroundColor = '';
                            });
                            */
                        });

                        rightCells.forEach(rightCell => {
                            const corrLeftCellId = rightCell.id.replace("right_", "left_");
                            const corrLeftCell = document.getElementById(corrLeftCellId);

                            rightCell.addEventListener('mousedown', () => {
                                rightCell.style.backgroundColor = 'yellow';
                                corrLeftCell.style.backgroundColor = 'yellow';
                            });

                            /*
                            rightCell.addEventListener('mouseout', () => {
                                rightCell.style.backgroundColor = '';
                                corrLeftCell.style.backgroundColor = '';
                            });
                            */
                        });
                    });
                </script>
                </div>
            </section>
        </div>
    </section>
</body>
</html>