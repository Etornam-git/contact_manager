<?php include "./process.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>

    <div class="master">
        <div class="main">
            <h2>Contact Management</h2>
            <form action="" class="sub" method="post" >

                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                
                <label for="con">Phone:</label>
                <input type="tel" name="contact" id="con">
                
                <label for="mail">Email:</label>
                <input type="email" id="mail" name="email">
                
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
        <div class="min">
            <h3>Contact List</h3>
            <table>
                <thead>
                    <tr>
                        <th>Reg. Number</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $id = 0;
                    foreach ($userContact as $info) {
                        $id++;
                    ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo htmlspecialchars($info['name']); ?></td>
                        <td><?php echo htmlspecialchars($info['contact']); ?></td>
                        <td><?php echo htmlspecialchars($info['email']); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
