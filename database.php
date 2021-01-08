<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Database</title>

    <style>
        table {
            table-layout: fixed;
            width: 100%;
            /* font colour */
            color: #3399ff;
            font-family: monospace;
            font-size: 14px;
            text-align: left;
            border-collapse: collapse;
        }

        /* column styles */
        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #cce5ff;
        }

        table,
        th,
        td {
            /* border style */
            border: 1px solid #b0b0b0;
            border-collapse: collapse;
        }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">
        <div class="nav-wrapper">
            <div class="left-side">

                <div class="nav-link-wrapper">
                    <a href="index.html">Home</a>
                </div>

                <div class="nav-link-wrapper">
                    <a href="about.html">About</a>
                </div>

                <div class="nav-link-wrapper active-nav-link">
                    <a href="database.html">Database</a>
                </div>

                <div class="nav-link-wrapper">
                    <a href="submit.html">Submit</a>
                </div>
            </div>

            <div class="right-side">
                <div class="brand">
                    <div>NBA LIVE MOBILE S4 DATABASE</div>
                </div>
            </div>
        </div>

        <div class="content-wrapper">
            <table>
                <tr>
                    <!--PlayerName-->
                    <th>Name</th>
                    <!--Overall-->
                    <th style="width: 33px">OVR</th>
                    <!--PlayerPosition-->
                    <th style="width: 33px">POS</th>
                    <!--PlayerGameplayStyle-->
                    <th>Style</th>
                    <!--PlayerProgram-->
                    <th>Program</th>
                    <!--boosts/abilities-->
                    <th style="width: 18px">+</th>
                    <th>B/A #1</th>
                    <th style="width: 18px">+</th>
                    <th>B/A #2</th>
                    <th style="width: 18px">+</th>
                    <th>B/A #3</th>
                    <th style="width: 18px">+</th>
                    <th>B/A #4</th>
                    <!--general stats-->
                    <th style="width: 33px">Ath</th>
                    <th style="width: 33px">Reb</th>
                    <th style="width: 33px">P.O.</th>
                    <th style="width: 33px">P.D.</th>
                    <th style="width: 33px">I.S.</th>
                    <th style="width: 33px">O.S.</th>
                    <th style="width: 33px">Def</th>
                    <th style="width: 33px">P.M.</th>
                </tr>
                <?php
                // open connection to database
                // <!--host, database username, database password, database name-->
                $conn = mysqli_connect("localhost", "root", "", "youtube");
                if ($conn->connect_error) {
                    die("Connection failed:" / $conn->connect_error);
                }

                $sql = "SELECT PlayerName, Overall, PlayerPosition, PlayerGameplayStyle, PlayerProgram, 
                        FirstValueOfBoost, FirstBoostOrAbility, SecondValueOfBoost, SecondBoostOrAbility, 
                        ThirdValueOfBoost, ThirdBoostOrAbility, FourthValueOfBoost, FourthBoostOrAbility, 
                        Athleticism, Rebounding, PostOffense, PostDefense, InsideScoring, OutsideScoring, Defense, Playmaking
                        from cards";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["PlayerName"] . "</td><td>" . $row["Overall"] . "</td><td>" . $row["PlayerPosition"] . "</td><td>" . $row["PlayerGameplayStyle"] . "</td>
                            <td>" . $row["PlayerProgram"] . "</td>
                            <td style='text-align:right'>" . $row["FirstValueOfBoost"] . "</td><td>" . $row["FirstBoostOrAbility"] . "</td>
                            <td style='text-align:right'>" . $row["SecondValueOfBoost"] . "</td><td>" . $row["SecondBoostOrAbility"] . "</td>
                            <td style='text-align:right'>" . $row["ThirdValueOfBoost"] . "</td><td>" . $row["ThirdBoostOrAbility"] . "</td>
                            <td style='text-align:right'>" . $row["FourthValueOfBoost"] . "</td><td>" . $row["FourthBoostOrAbility"] . "</td>
                            <td>" . $row["Athleticism"] . "</td><td>" . $row["Rebounding"] . "</td><td>" . $row["PostOffense"] . "</td><td>" . $row["PostDefense"] . "</td>
                            <td>" . $row["InsideScoring"] . "</td><td>" . $row["OutsideScoring"] . "</td><td>" . $row["Defense"] . "</td><td>" . $row["Playmaking"] . "</td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    // if chart from database is empty
                    echo "Currently, there are no cards";
                }
                // close connection
                $conn->close();
                ?>
            </table>

        </div>

    </div>
</body>

</html>