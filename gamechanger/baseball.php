<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$m_men_on_base = array(1,2);
play($m_men_on_base ,$_POST['balls'] , $_POST['strikes'], $_POST['outs']);


//Assumptions
//men_on_base = current base situation (man on 1st list will have 1),(man on 1st and 2nd list will have 1,2),etc
//men_on_base always comes in lowest to highest from 1-3
//balls = current # of ball count before pitch
//strikes = current # of strikes count after pitch
//outs = current # of outs after pitch
function play($men_on_base,$balls,$strikes,$outs){
    $runs = 0;
    $minAdvance = 0;
    $num_men_on = count($men_on_base);
    $num = 8;
    //if men on base
    if(isset($men_on_base)){
        $num = 9;
        if($outs < 2){
            $num=10;
        }else if($outs == 0 &&  $num_men_on > 1){
            $num = 11;
        }
    }
    $pitch = rand(1,$num);


    switch($pitch){
        case 1:
            $strikes=+1;
            $outcome = "Strike ".$stikes;
            break;
        case 2:
            $balls=+1;
            $outcome = "Ball ".$balls;
            break;
        case 3:
            $outcome = "Single.";
            break;
        case 4:
            $outcome = "Double.";
            break;
        case 5:
            $runs = $num_men_on;
            $outcome = "Triple.";
            break;
        case 6:
            $runs = $num_men_on +1;
            $outcome = "Homerun";
            break;
        case 7:
            $runs = $num_men_on + 1;
            $outcome = "In The Park Home Run.";
            break;
        case 8:
            $outcome = "Batter hits into an out.";
            $outs = +1;
            break;
        case 9:
            $outcome = "Sacrifice Hit.";
            $outs =+1;
            break;
        case 10:
            $outcome = "Double Play.";
            $num_men_on =-1;
            $outs=+2;
            break;
        case 11:
            $outcome = "Triple Play.";
            $outs=+3;
            break;
    }
    if($outs < 3) {
       if($num_men_on > 0 && ($pitch < 5 || $pitch > 7)) {
        
        for($i=0;$i < $num_men_on; $i++) {
            //set limit on how far a runner can advance
            if($men_on_base[$i] == 1) {
                $advance = 3;
            } else if($men_on_base[$i] == 2) {
                $advance = 2;
            } else if($men_on_base[$i] == 3) {
                $advance = 1;
            }
            
            //find out how far they advanced
            
            if($minAdvance < 3){
                $advance = rand($minAdvance,$advance);
                $minAdvance = $advance;
            }else{
                $advance = $minAdvance;               
            }
           
            $totalAdvance = $advance + $men_on_base[$i];
            

            if($totalAdvance == 2){
                $outcome = $outcome." Runner advances to second.";
            } else if($totalAdvance == 3){
                $outcome = $outcome." Runner advances to third.";
            }

            //if man advance to home all other runners on base path score
            else if(($men_on_base[$i] == 1 && $totalAdvance = 4) ||($men_on_base[$i] == 2 && $totalAdvance == 4)) {
                $runs = $num_men_on-$i;
                $outcome = $outcome." All other baserunners score.";
                break;
            } else if ($totalAdvance == 4){
                $runs =+1;
                $outcome = $outcome." Runner scores.";
            }
        }
     }  
    }else {
        $outcome =+ "Three Outs. Innning Over.";
    }

    echo "<p>".$outcome."</p>";
?>
<table>
   <col width="100px;"/>
   <col width="100px;"/>
   <col width="100px;"/>
   <col width="100px;"/>
   <col width="100px;"/>
   <thead>
       <tr>
           <th>Home</th>
           <th>Away</th>
           <th>Balls</th>
           <th>Strikes</th>
           <th>Outs</th>
       </tr>
   </thead>
   <tbody>
       <tr>
           <td><?php echo $runs; ?></td>
           <td>0</td>
           <td><?php echo $balls; ?></td>
           <td><?php echo $strikes; ?></td>
           <td><?php echo $outs; ?></td>
       </tr>

   </tbody>
</table>
<?php
}
?>