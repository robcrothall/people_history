            <div class="topnav">
					<?php
					//dump($_SESSION["id"]);
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../public/history.php\" target=\"_blank\">History</a> ";
                 echo "<a href=\"../public/occupation.php\" target=\"_blank\">Occupation</a> ";
                 echo "<a href=\"../public/party.php\" target=\"_blank\">Party</a> ";
                 }
					if($_SESSION["id"] !== "0") {
                 echo "<a href=\"../public/password.php\">Password</a> ";
					  }
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../public/people.php\">People</a> ";
                 echo "<a href=\"../public/place.php\">Places</a> ";
                 }
               echo "<a href=\"../public/register.php\">Register</a> ";
					if($_SESSION["id"] !== "0") {
                 echo "<a href=\"../public/search.php\">Search</a> ";
                 }
					if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                 echo "<a href=\"../public/ship.php\" target=\"_blank\">Ships</a> ";
                 echo "<a href=\"../public/synonyms.php\" target=\"_blank\">Synonyms</a> ";
					  if ($_SESSION["user_role"] == "ADMIN" ) {
                   echo "<a href=\"../public/users.php\" target=\"_blank\">Users</a> ";
                   }
                 echo "<a href=\"../public/voyage.php\" target=\"_blank\">Voyage</a> ";
                 }
					if($_SESSION["id"] !== "0") {
                 echo "<a href=\"../public/logout.php\"><strong>Log out</strong></a> ";
                 }
					?>
            </div>
				<p></p>