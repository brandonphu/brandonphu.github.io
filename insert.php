<?php
$PlayerName = $_POST['PlayerName'];
$Overall = $_POST['Overall'];
$PlayerPosition = $_POST['PlayerPosition'];
$PlayerGameplayStyle = $_POST['PlayerGameplayStyle'];
$PlayerProgram = $_POST['PlayerProgram'];
$FirstValueOfBoost = $_POST['FirstValueOfBoost'];
$FirstBoostOrAbility = $_POST['FirstBoostOrAbility'];
$Athleticism = $_POST['Athleticism'];
$Rebounding = $_POST['Rebounding'];
$PostOffense = $_POST['PostOffense'];
$PostDefense = $_POST['PostDefense'];
$InsideScoring = $_POST['InsideScoring'];
$OutsideScoring = $_POST['OutsideScoring'];
$Defense = $_POST['Defense'];
$Playmaking = $_POST['Playmaking'];

if (!empty($PlayerName) || !empty($Overall) || !empty($PlayerPosition) || !empty($PlayerGameplayStyle) || !empty($Athleticism) || !empty($Rebounding) || !empty($PostOffense) || !empty($PostDefense) || !empty($InsideScoring) || !empty($OutsideScoring) || !empty($Defense) || !empty($Playmaking)) {

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "youtube";

        // create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
        } else {
            $SELECT = "SELECT PlayerName From cards Where PlayerName = ? Limit 1";
            $INSERT = "INSERT Into cards (PlayerName, Overall, PlayerPosition, PlayerGameplayStyle, PlayerProgram, FirstValueOfBoost, FirstBoostOrAbility, Athleticism, Rebounding, 
                PostOffense, PostDefense, InsideScoring, OutsideScoring, Defense, Playmaking) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
           
           // prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $PlayerName);
            $stmt->execute();
            $stmt->bind_result($PlayerName);
            $stmt->store_result();
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            
            if($rnum==0) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sisssisiiiiiiii", $PlayerName, $Overall, $PlayerPosition, $PlayerGameplayStyle, $PlayerProgram, $FirstValueOfBoost, $FirstBoostOrAbility, 
                    $Athleticism, $Rebounding, $PostOffense, $PostDefense, $InsideScoring, $OutsideScoring, $Defense, $Playmaking);
                $stmt->execute();
                echo "New player inserted successfully";
            }

            $stmt->close();
            $conn->close();

        }
} else {
    echo "Missing required fields";
    die();
}
?>