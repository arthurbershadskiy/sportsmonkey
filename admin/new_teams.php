<?php include 'header.php'; ?>
      <div class="top-bar">
        <h1>Teams</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="teams.php">Teams</a> / <a href="new_teams.php">New Teams</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <div class="entryForm">
        <form action="process_teams.php" method="post">
			TeamName:
			<input type="text" name="TeamName" placeholder="Enter Team Name"><br />
			SportID:
          <select name="SportID">
            <option value="Basketball">Basketball</option>
            <option value="Football">Football</option>
            <option value="Hockey">Hockey</option>
            <option value="Baseball">Baseball</option>
            <option value="Soccer">Soccer</option>
          </select>
          <br />
			TeamConfrence:
			<input type="text" name="TeamConference" placeholder="Enter Team Conference"><br />
			TeamCity:
			<input type="text" name="TeamCity" placeholder="Enter Team City"><br />
			TeamArena:
			<input type="text" name="TeamArena" placeholder="Enter Team Arena"><br />
			TeamLogo:
			<input type="text" name="TeamLogo" placeholder="Enter Logo Filename"><br />
			
            <input type="submit">
        </form>
    </div>
    </div>
    
<?php include 'footer.php'; ?>