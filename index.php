<?php
$conn = new mysqli('localhost', 'root', '', 'crud_app');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id,name FROM items");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Application - Assignment: Hosting and Deploying an Application on Microsoft Azure</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>

<div class="container"-->

<h2>Cloud Computing & ERP</h2>
<h2>Assignment</h2>
<h2>Hosting and Deploying an Application on Microsoft Azure</h2>
<h3>DICC/05/2024/6135</h3>
<hr>
<h1><p style="color: blue;">Student Register Wizard</h1></p>

    <form action="create.php" method="post"style="display:inline;">

        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" required placeholder="Name">
        <button type="submit">Add Data</button> <br><br>

    </form>

    

    <div>

    <table border="1">
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>CRUD Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <form action="update.php" method="post"style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>">
                        <button type="submit">Update</button>
                    </form>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

        </div>
          
</body>
</html>

<?php $conn->close(); ?>