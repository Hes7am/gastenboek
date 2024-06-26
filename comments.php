<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<section>
<header>
<h1>Gastenboek</h1>
<nav>
            <ul>
                <li class="home"><a href="comments.php">Home</a></li>
                <li><a href="index.php">Comments</a></li>
            </ul>
        </nav>
      
   </header>
  
   <div class="content">
    <div class="main">
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" name="name" required maxlength="25">
            
            <label for="message">Message:</label>
            <textarea name="message" rows="4" required maxlength="500"></textarea> 
            
            <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*">
            
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>

      <div class="info">
      
        </p>
     
        </div>
      </div>
    </div>

    <ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </section>
  
</html>