<?php
  if (isset($_POST["search"])) {
    require "3-search.php";

    if (count($results) > 0) { foreach ($results as $r) {
      printf("<div>%s - %s</div>", $r["team_id"], $r["team_name"], $r["coach_name"]);
    }} else { echo "No results found"; }
  }
  ?>