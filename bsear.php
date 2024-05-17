<?php
  if (isset($_POST["search"])) {
    require "b_search.php";

    if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["batsman_id"], $r["batsman_name"], $r["team_id"], $r["age"], $r["country"]);
    }} else { echo "No results found"; }
  }
  ?>