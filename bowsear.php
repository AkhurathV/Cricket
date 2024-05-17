<?php
  if (isset($_POST["search"])) {
    require "bo_search.php";

    if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["bowler_id"], $r["bowler_name"], $r["team_id"], $r["age"], $r["country"]);
    }} else { echo "No results found"; }
  }
  ?>