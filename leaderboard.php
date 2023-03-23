<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "backend/includes/auth-user.php";
    include "backend/includes/leaderboard-results.php";
    

    $typingScores = $leaderboardResults[0];
    $barioScores = $leaderboardResults[1];
    $reactionTimes = $leaderboardResults[2];
    $IDs = array("winner", "runner-up", "second-runner-up");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="css/leaderboard.css">
</head>
<body>		
    <nav class="navbar">
    <ul>
        <li><a href="index.php" class="homepage">Home</a></li>
        <li class="games">Leaderboard</li>

        <li><a href="games.php" class="loginpage">Games</a></li>
    </ul>
</nav>
    <div class="leaderboard">
        <h1>BARIO</h1>
            <table>
                <thead>
                    <tr>
                        <td></td>
                        <td>
                            Player
                        </td>
                        <td>
                            Score
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i=0; $i < count($barioScores); $i++) { 
                        $place = $i + 1;
                        echo "<tr>";
                        if ($i < 3) {
                            echo("<td id={$IDs[$i]}>{$place}</td>");
                        } else {
                            echo("<td>{$place}</td>");
                        }
                        echo("<td><p> {$barioScores[$i]['userName']}</p></td>");
                        echo("<td>{$barioScores[$i]['barioScore']}</td>");
                        echo "</tr>";
                    }

                    ?>
                    <!-- <tr>
                        <td id="winner">1</td>
                        <td><p> Jose Brag</p></td>
                        <td>239</td>

                    </tr>
                    
                    <tr>
                        <td id="runner-up">2</td>
                        <td><p> Lily Simons</p></td>
                        <td>209</td>
                    </tr>
                    
                    <tr>
                        <td id="second-runner-up">3</td>
                        <td><p> Tom Higgle</p></td>
                        <td>154</td>
                    </tr>
                    
                    <tr>
                        <td>4</td>
                        <td><p> Alex Roger</p></td>
                        <td>100</td>
                    </tr>
                    
                    <tr>
                        <td>5</td>
                        <td><p> Mavie Ruth</p></td>
                        <td>82</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="leaderboard">
        <h1>TYPING TEST</h1>
        <table>
            <thead>
                <tr>
                    <td></td>
                    <td>
                        Player
                    </td>
                    <td>
                        WPM
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0; $i < count($typingScores); $i++) { 
                $place = $i + 1;
                echo "<tr>";
                if ($i < 3) {
                    echo("<td id={$IDs[$i]}>{$place}</td>");
                } else {
                    echo("<td>{$place}</td>");
                }
                echo("<td><p> {$typingScores[$i]['userName']}</p></td>");
                echo("<td>{$typingScores[$i]['typingScore']}</td>");
                echo "</tr>";
            }

            ?>
                <!-- <tr>
                    <td id="winner">1</td>
                    <td><p> Jose Brag</p></td>
                    <td>239</td>

                </tr>
                
                <tr>
                    <td id="runner-up">2</td>
                    <td><p> Lily Simons</p></td>
                    <td>209</td>
                </tr>
                
                <tr>
                    <td id="second-runner-up">3</td>
                    <td><p> Tom Higgle</p></td>
                    <td>154</td>
                </tr>
                
                <tr>
                    <td>4</td>
                    <td><p> Alex Roger</p></td>
                    <td>100</td>
                </tr>
                
                <tr>
                    <td>5</td>
                    <td><p> Mavie Ruth</p></td>
                    <td>82</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>
<div class="leaderboard">
    <h1>REACTION TEST</h1>

    <table>
        <thead>
            <tr>
                <td></td>
                <td>
                    Player
                </td>
                <td>
                    Time
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i=0; $i < count($reactionTimes); $i++) { 
                $place = $i + 1;
                echo "<tr>";
                if ($i < 3) {
                    echo("<td id={$IDs[$i]}>{$place}</td>");
                } else {
                    echo("<td>{$place}</td>");
                }
                echo("<td><p> {$reactionTimes[$i]['userName']}</p></td>");
                echo("<td>{$reactionTimes[$i]['reactionScore']}</td>");
                echo "</tr>";
            }

            ?>
            <!-- <tr>
                <td id="winner">1</td>
                <td><p> Jose Brag</p></td>
                <td>239</td>

            </tr>
            
            <tr>
                <td id="runner-up">2</td>
                <td><p> Lily Simons</p></td>
                <td>209</td>
            </tr>
            
            <tr>
                <td id="second-runner-up">3</td>
                <td><p> Tom Higgle</p></td>
                <td>154</td>
            </tr>
            
            <tr>
                <td>4</td>
                <td><p> Alex Roger</p></td>
                <td>100</td>
            </tr>
            
            <tr>
                <td>5</td>
                <td><p> Mavie Ruth</p></td>
                <td>82</td>
            </tr> -->
        </tbody>
    </table>
</div>
</div>
</body>
<script>
    function search(){
        var text = document.getElementById('search').value;
        const tr = document.getElementsByTagName('tr');
        for (let i=1;i<tr.length;i++){
            if(!tr[i].children[1].children[1].innerHTML.toLowerCase().includes(
                text.toLowerCase()
            )){
                tr[i].style.display = 'none';
            }
            else{
                tr[i].style.display = '';
            }
        }
    }
</script>
</html>
