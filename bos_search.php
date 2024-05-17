<?php
  if (isset($_POST["search"])) {
    require "bosearch.php";

    if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["bowling_id"], $r["bowler_id"], $r["match_id"], $r["overs_bowled"], $r["runs_conceded"], $r["wickets_taken"]);
    }} else { echo "No results found"; }
  }
  ?>