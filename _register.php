<!-- FORM -->
<form id=userform action="process.php" method="post" >
<fieldset>		
    <legend>Personal Info</legend>	
    <ol>
        <li>
            <label for=tblname>First Name</label>
            <input id=tblname name=firstname type=text placeholder="First name" required autofocus>
        </li>
        
        <li>
            <label for=tblname>Last Name</label>
            <input id=tblname name=lastname type=text placeholder="Last name" required>
        </li>
        
        <li>
            <label for=tblemail>Email</label>
            <input id=tblemail name=email type=email placeholder="example@domain.com" required>
        </li>
        
        <li>
        <label>A little bit about yourself</label>
        <textarea cols="40" rows="10" name="bio" placeholder="Anything"></textarea>
        </li>
        
        <li>
            <fieldset>
                <legend>Gender Preference</legend>
                <select name="gender">
      				<optgroup label="genderset">
        			<option value="Male">Male</option>
        			<option value="Female">Female</option>
        			<option value="Not Sure">Not Sure</option>
      				</optgroup>
    			</select>						
            </fieldset>
            
        </li>

        
            
    </ol>
</fieldset>

<fieldset>
    <legend>User Account</legend>
    <ol>
        <li>
            <label for=tblusername>User Name</label>
            <input id=tblusername name=username type=text placeholder="Thor" required>
        </li>
    
        <li>
            <label for=tblpassword>Password</label>
            <input id=tblpassword name=password type=password required>
        </li>

    </ol>

</fieldset>

<fieldset>
    <legend>User Info</legend>
    <ol>

        
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
    
    </ol>
    
    
</fieldset>


<fieldset>

    <button type=submit name=submit> Submit </button>

</fieldset>

</form>