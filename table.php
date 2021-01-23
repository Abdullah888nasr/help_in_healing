<?php
    require_once "includes/connect.php";
    require_once "includes/templates/header.php";
    if(isset($_SESSION['city'])):
        $city = $_SESSION['city'];
        $department = $_SESSION['department'];
    else:
        header('Location: index.php');
    endif;
    $sql = "SELECT * FROM doctors WHERE department = '$department' AND city = '$city'";
    $result = mysqli_query($conn, $sql);
    ?>
    <table class="home-table">
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Department</th>
        </tr>
    <?php
    if(mysqli_num_rows($result) > 0):
        while($row = mysqli_fetch_assoc($result)):
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['department']."</td>";
            echo "</tr>";
        endwhile;
    else:
        echo "<tr>
                <td colspan='5'>No Doctors in this address and this department</td>
            </tr>";
    endif;
    mysqli_close($conn);
?>
</table>


<?php require_once "includes/templates/footer.php"; ?>
