<?php
  if (isset($_POST["search"])) {
    require "msearch.php";

    if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["match_id"], $r["date"], $r["location"], $r["team1_id"], $r["team2_id"], $r["winner_id"]);
    }} else { echo "No results found"; }
  }
  ?>