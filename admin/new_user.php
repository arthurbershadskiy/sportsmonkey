<?php include 'header.php'; ?>
<div class="top-bar">
        <h1>Users</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="users.php">Users</a> / <a href="new_user.php">New User</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <div class="entryForm">
        <form action="process_user.php" method="post">
        <input type="text" name="username" placeholder="Username"><br />
        <input type="password" name="password" placeholder="Password" /><br />
        <input type="text" name="firstname" placeholder="First Name"/><br />
        <input type="text" name="lastname" placeholder="Last Name"/><br />
        <label>Gender:</label>
    <select name="gender">
      <optgroup label="genderset">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Not Sure">Not Sure</option>
      </optgroup>
    </select>
    <br />
    <br />
        <input type="email" name="email" placeholder="E-mail Address"/><br />
        <br />
        <label>A little bit about yourself</label>
        <br />
        <textarea cols="40" rows="10" name="bio" placeholder="Anything"></textarea>
        <br />
        <select name="userRole">
      		<optgroup label="userRole">
        	<option value="member">Member</option>
        	<option value="premium">Premium</option>
        	<option value="admin">Admin</option>
      		</optgroup>
   		</select>
    	<br />
        <br />
        <fieldset>
        <legend>User Info</legend>

        
        <li>
        
        <fieldset>
                <legend>Favorite Sports</legend>

                <ol>
                    <li>
                        <input id=basketball name="sport" type=radio value=Basketball>
                        <label for=basketball>Basketball</label>
                    </li>
                    
                    <li>
                        <input id=football name="sport" type=radio value=Football>
                        <label for=football>Football</label>
                    </li>

                    <li>
                        <input id=hockey name="sport" type=radio value=Hockey>
                        <label for=hockey>Hockey</label>
                    </li>

                    <li>
                        <input id=baseball name="sport" type=radio value=Baseball>
                        <label for=baseball>Baseball</label>
                    </li>

                    <li>
                        <input id=golf name="sport" type=radio value=Soccer>
                        <label for=soccer>Soccer</label>
                    </li>

                </ol>							
            </fieldset>
            </li>
            
            <li>
            <label for=tblsports>Favorite Team</label>
            <input id=tblsports name=team type=text placeholder="Miami Heat" required>
        </li>

        
        
        <li>
            
            <label for=tblplayer>Favorite Player</label>
            <input id=tblplayer name=player type=text placeholder="Michael Jordan" required>
        
        </li>
    
    
</fieldset>
        <input type="submit">
        </form>
    </div>
    </div>
    
<?php include 'footer.php'; ?>