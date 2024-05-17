<?php
  if (isset($_POST["search"])) {
    require "bssearch.php";

    if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["batting_id"], $r["batsman_id"], $r["match_id"], $r["runs_scored"], $r["balls_faced"],$r["fours"],$r["sixes"]);
    }} else { echo "No results found"; }
  }
  ?>