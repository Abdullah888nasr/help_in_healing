<?php
    require_once "includes/connect.php";
    require_once "includes/templates/header.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST'):
        if(isset($_SESSION['firstname'])):
            $_SESSION['city'] = $_POST['doctorCity'];
            $_SESSION['department'] = $_POST['doctorDepart'];
            header('Location: table.php');
        else:
            echo '<script>alert("You are not login")</script>';
        endif;
    endif;
?>
<div class="container">
    <pre class="title">Welcome in our page for more information
        about our page 
    Search About any Doctor From any Place</pre>
    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
        <select class="doctorCity" name="doctorCity">
            <option disabled hidden selected>Choose City</option>
            <?php 
                $sql="SELECT * FROM `lists`";
                $result = mysqli_query($conn, $sql);
                $lists = mysqli_fetch_all($result);
                foreach($lists as $list):
                    $city = $list[1];
                    echo "<option value = '$city'>$city</option>";
                endforeach;
            ?>
        </select>
        <select class="doctorDepart" name="doctorDepart">
            <option disabled hidden selected>Choose Department</option>
            <?php 
                $sql="SELECT * FROM `lists`";
                $result = mysqli_query($conn, $sql);
                $lists = mysqli_fetch_all($result);
                foreach($lists as $list):
                    $department = $list[0];
                    echo "<option>$department</option>";
                endforeach;
            ?>
        </select>
        <input type="submit" value="Search">
    </form>
</div>

<?php require_once "includes/templates/footer.php"; ?>
