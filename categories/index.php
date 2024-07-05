<?php
require('../includes/header.php');
require('../includes/navbar.php');

// Assuming $conn is your database connection object
// Example: $conn = new mysqli($servername, $username, $password, $dbname);

$select_query = "SELECT * FROM tasks ORDER BY id DESC";
$result = mysqli_query($conn, $select_query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="create.php" role="button">Add Task</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <!-- <th scope="col">Start Date</th>
                    <th scope="col">End Date</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><?php echo $row['updated_at']; ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $row['id']; ?>" role="button">Edit</a>
                                <a class="btn btn-info btn-sm" href="show.php?id=<?php echo $row['id']; ?>" role="button">Show</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')" href="delete.php?id=<?php echo $row['id']; ?>" role="button">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='9'>No tasks found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>

<?php require('../includes/footer.php'); ?>
