<?php include 'header.php'; ?>
<div class="top-bar">
        <h1>News</h1>
        <div class="breadcrumbs"><a href="index.php">Homepage</a> / <a href="news.php">News</a> / <a href="new_news.php">New News</a>
        </div>
      </div>
      <br />
      <div class="select-bar">
        
      </div>
      
      <div class="entryForm">
        <form action="process_news.php" method="post">
        SportID:
          <select name="SportID">
            <option value="Basketball">Basketball</option>
            <option value="Football">Football</option>
            <option value="Hockey">Hockey</option>
            <option value="Baseball">Baseball</option>
            <option value="Soccer">Soccer</option>
          </select>
          <br />
        <input type="text" name="image" placeholder="Image link"/><br />
        <input style='width:200px;' type="text" name="title" placeholder="Title"/><br />
        <textarea style='width:600px;' cols="40" rows="3" name="excerpt" placeholder="Excerpt"></textarea>
        <br />
        <textarea style='width:600px;height:300px' cols="40" rows="10" name="body" placeholder="Body"></textarea>
    	<br />
        <input type="submit">
        </form>
    </div>
    </div>
    
<?php include 'footer.php'; ?>