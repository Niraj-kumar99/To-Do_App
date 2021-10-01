<?php
require 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="" method="POST" autocomplete="off">
                <input type="text" name="title" placeholder="Can not be empty">
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
            </form>
        </div>
        <?php 
            $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
        ?>
        <div class="show-todo-section">
            <?php if($todos->fetch_row() === 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="assets/f.png" width="100%" alt="">
                        <img src="assets/Ellipsis.gif" width="80px">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch_assoc()) {?>
            <div class="todo-item">
                <span id="<?php echo $todo['id']; ?>"
                      class="remove-to-do">x</span>
                <?php if($todo['checked']){ ?>
                    <input type="checkbox"
                           class="check-box"
                           checked>
                    <h2 class="checked"><?php echo $todo['title'] ?></h2>
                <?php } 
                    else {?>
                    <input type="checkbox"
                           class="check-box">
                    <h2><?php echo $todo['title']?></h2>
                <?php } ?>
                <br>
                <small>created: <?php echo $todo['date_time']?></small>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
