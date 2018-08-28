  <table id="search_container" width="95%" border="0" cellpadding="0" cellspacing="10">
	<tr>
	  <td align="center" valign="top" width="95%">
	    <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
		<td align="right" width="30%">Surname</td>
		<td width="2%"></td>
		<td align="left" width="70%"><input type=search name=surname size="50" autofocus placeholder="Any surname"></td>
	      </tr>
	      <tr>
		<td align="right" width="30%">First name</td>
		<td width="2%"></td>
		<td align="left" width="70%"><input type=search name=firstname size="50" placeholder="Any first name"></td>
	      </tr>
	      <tr>
		<td align="right" width="25%">Reference No</td>
		<td width="2%"></td>
		<td align="left" width="70%"><input type=search name=refno size="25" placeholder="Any reference number"> e.g. Morse Jones card number</td>
	      </tr>
	      <tr>
		<td align="right" width="30%">Occupation</td>
		<td width="2%"></td>
		<td align="left" width="70%">
		  <select>
		    <option value="any">Any occupation</option>
		  <?php
		  $rows = query("SELECT * FROM `occupation` order by occupation_name");
		  foreach ($rows as $row) {
		    echo "<option value=" . $row['id'] . ">" . $row['occupation_name'] . "</option>";
		    }
		  ?>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td align="right" width="30%">Party</td>
		<td width="2%"></td>
		<td align="left" width="70%">
		  <select>
		    <option value="any">Any party</option>
		  <?php
		  $rows = query("SELECT * FROM `party` order by party_name");
		  foreach ($rows as $row) {
		    echo "<option value=" . $row['id'] . ">" . $row['party_name'] . "</option>";
		    }
		  ?>
		  </select>  
		</td>
	      </tr>
	      <tr>
		<td align="right" width="30%">Ship</td>
		<td width="2%">&nbsp &nbsp</td>
		<td align="left" width="70%">
		  <select>
		    <option value="any">Any ship</option>
		  <?php
		  $rows = query("SELECT * FROM `ship` order by ship_name");
		  foreach ($rows as $row) {
		    echo "<option value=" . $row['id'] . ">" . $row['ship_name'] . "</option>";
		    }
		  ?>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td align="right" width="30%">Place</td>
		<td width="2%">&nbsp</td>
		<td align="left" width="70%">
		  <select>
		    <option value="any">Any place</option>
		  <?php
		  $rows = query("SELECT * FROM `place` order by name");
		  foreach ($rows as $row) {
		    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
		    }
		  ?>
		  </select>
		</td>
	      </tr>
	  </td>
	</tr>
   <tr>
		<td align="right" width="30%">Keywords (or)</td>
		<td width="2%"></td>
		<td align="left" width="70%"><input type=search name=keywords_or size="50" placeholder="Find at least ONE in a record"></td>
   </tr>
   <tr>
		<td align="right" width="30%">Keywords (and)</td>
		<td width="2%"></td>
		<td align="left" width="70%"><input type=search name=keywords_and size="50" placeholder="Find ALL in a record"></td>
   </tr>
  </table>
      <br>
		<a href="search.html" target="_blank" style="text-align: center;">Submit</a>
		<br><br>
		Note that a maximum of 100 names will be returned by this search. 
