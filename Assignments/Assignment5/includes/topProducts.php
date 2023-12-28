<?php include_once 'dbconnect.php';?>
<!-- The Modal -->
<div class="modal fade modal-xl" id="last5PrevModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Your Last 5 Visited Products</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
        <?php
            if(isset($_COOKIE["lastVisitedIds"]))
            {
                echo "<div class='row'>\n";
                $hits = explode(",",$_COOKIE["lastVisitedIds"]);
                $viewed = array();
                for($i=0; $i<5 and $i<sizeof($hits); $i++)
                {
                    $result = $conn->query("SELECT * FROM SSProducts where productId = ".$hits[$i].";");
                    $row = $result->fetch_assoc();
                    echo "<div class='col-xl-4 card'>\n";
                    echo "<img class='card-img-top' style='width:100%' src = ' ../".$row["productImgUrl"]."' alt = '".$row["productName"]."'>\n";
                    echo "<div class='card-body'>";
                    echo "<h4 class='card-title'>".$row["productName"]."</h4>\n";
                    echo "<p class='card-text'>".$row["productShortDesc"]."</p>\n";
                    echo "<p class='card-text'>$".$row["productPrice"]."</p>\n";
                    echo "<div class='knowMoreBtn'>\n";
                    $newName = handleSpaces($row["productName"]);
                    echo "<a href='$newName.php' class='btn btn-primary'>Read More</a>";
                    echo "</div>";
                    echo "</div>\n";
                    echo "</div>\n\n";
                    array_push($viewed,$hits[$i]);
                }
                echo "</div>\n";
            }
            else
            {
                echo "You have not viewed any products yet";
            }
        ?>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade modal-xl" id="yourTop5Modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Your Top 5 Visited Products</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
        <?php
                if(isset($_COOKIE["lastVisitedIds"]))
                {
                    echo "<div class='row'>\n";       
                    $heatmap=array();
                    $myarr = explode(",",$_COOKIE["lastVisitedIds"]);
                    foreach (explode(",",$_COOKIE["lastVisitedIds"]) as $id)
                    {
                        if(isset($heatmap[$id]))
                        {
                            $heatmap[$id] = $heatmap[$id] + 1;
                        }
                        else {
                            $heatmap[$id] = 1;
                        }
                    }
                    for($i=0;$i<5 and $i<sizeof($myarr);$i++)
                    {
                        $max=0;
                        $maxid=0;
                        foreach ($heatmap as $key => $value)
                        {
                            if($value>$max)
                            {
                                $max = $value;
                                $maxid = $key;
                            }
                        }
                    $result = $conn->query("SELECT * FROM SSProducts where productId = ".$maxid.";");
                    $row = $result->fetch_assoc();
                    echo "<div class='col-xl-4 card'>\n";
                    echo "<img class='card-img-top' style='width:100%' src = ' ../".$row["productImgUrl"]."' alt = '".$row["productName"]."'>\n";
                    echo "<div class='card-body'>";
                    echo "<h4 class='card-title'>".$row["productName"]."</h4>\n";
                    echo "<p class='card-text'>".$row["productShortDesc"]."</p>\n";
                    echo "<p class='card-text'>$".$row["productPrice"]."</p>\n";
                    echo "<div class='knowMoreBtn'>\n";
                    $newName = handleSpaces($row["productName"]);
                    echo "<a href='$newName.php' class='btn btn-primary'>Read More</a>";
                    echo "</div>";
                    echo "</div>\n";
                    echo "</div>\n\n";
                    unset($heatmap[$maxid]);    
                    }
                    echo "</div>\n";
                }
                else
                {
                    echo "You have not viewed any products yet";    
                }
            ?>
      </div>
    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade modal-xl" id="globalTop5Modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Top 5 Globally Visited Products</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
      <?php
            $sql = "SELECT * FROM SSProducts ORDER BY productHits DESC";
            $results = $conn->query($sql);
            echo "<div class='row'>\n"; 
            for($i=0; $i<5; $i++)
            {
                $row = $results->fetch_assoc();
                echo "<div class='col-xl-4 card'>\n";
                echo "<img class='card-img-top' style='width:100%' src = ' ../".$row["productImgUrl"]."' alt = '".$row["productName"]."'>\n";
                echo "<div class='card-body'>";
                echo "<h4 class='card-title'>".$row["productName"]."</h4>\n";
                echo "<p class='card-text'>".$row["productShortDesc"]."</p>\n";
                echo "<p class='card-text'>$".$row["productPrice"]."</p>\n";
                echo "<div class='knowMoreBtn'>\n";
                $newName = handleSpaces($row["productName"]);
                echo "<a href='$newName.php' class='btn btn-primary'>Read More</a>";
                echo "</div>";
                echo "</div>\n";
                echo "</div>\n\n";
            }
            echo "</div>\n";
        ?>
      </div>
    </div>
  </div>
</div>