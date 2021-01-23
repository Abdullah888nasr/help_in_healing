<?php
    include "../includes/connect.php";
    include "includes/templates/header.php";
    if(isset($_POST['addDoctor'])):
        $name = $_POST['docName'];
        $phone = $_POST['docPhone'];
        $address = $_POST['docAddress'];
        $city = $_POST['docCity'];
        $department = $_POST['docDepart'];
        $sql = "INSERT doctors SET name='$name', phone='$phone', address='$address', city='$city', department='$department'";
        if(!mysqli_query($conn, $sql)):
            echo '<script>alert("This phone number is exist.")</script>';
        endif;
    elseif(isset($_POST['addAdmin'])):
        $first_name = $_POST['adfName'];
        $last_name = $_POST['adlName'];
        $Email = $_POST['adEmail'];
        $password = $_POST['adPassword'];
        $adcPassword = $_POST['adcPassword'];
        if($password == $adcPassword):
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT users SET first_name='$first_name', last_name='$last_name', Email='$Email', password='$password', Type = '1'";
            if(!mysqli_query($conn, $sql)):
                echo '<script>alert("This email is exist.")</script>';
            else:
                header('Location: index.php');
            endif;
        else:
            echo '<script>alert("Two password is not identical.")</script>';
            echo $password . ' ' . $adcpassword . '<br>';
        endif;
    elseif(isset($_POST['editDoctor'])):
        $doctorId = $_POST['doctorId'];
        $name = $_POST['docName'];
        $phone = $_POST['docPhone'];
        $address = $_POST['docAddress'];
        $city = $_POST['docCity'];
        $department = $_POST['docDepart'];
        $sql = "UPDATE doctors SET name='$name', phone='$phone', address='$address', city='$city', department='$department' WHERE doctorId = $doctorId ";
        if(!mysqli_query($conn, $sql)):
            echo '<script>alert("This phone number is exist.")</script>';
        endif;
    endif;
    if(isset($_GET['action'])):
        switch($_GET['action']):
            case 'add':?>
                <div class="adds">
                    <div class="add-div">
                        <h1>Add New Doctor</h1>
                        <form method="POST" class="add-form" action="<?=$_SERVER['PHP_SELF']?>">
                            <input type="text" name="docName" placeholder="Doctor's Name">
                            <input type="tel" name="docPhone" placeholder="Doctor's Phone">
                            <input type="text" name="docAddress" placeholder="Doctor's Address">
                            <select name="docCity">
                                <option value="1" disabled hidden selected>Choose City</option>
                                <?php
                                    $sql="SELECT * FROM lists";
                                    $result= mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_all($result);
                                    foreach($rows as $row): 
                                        echo "<option>$row[1]</option>";
                                    endforeach;
                                ?>
                            </select>
                            <select name="docDepart">
                                <option value="1" disabled hidden selected>Choose Department</option>
                                <?php
                                    $sql="SELECT * FROM lists";
                                    $result= mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_all($result);
                                    foreach($rows as $row): 
                                        echo "<option>$row[0]</option>";
                                    endforeach;
                                ?>
                            </select>
                            <input type = "submit" class="add-btn" value="Add Doctor" name="addDoctor">
                        </form>
                    </div>
                    <div class="add-div add-div-admin">
                        <h1>Add New Admin</h1>
                        <form method="POST" class="add-form" action="?action=add">
                            <input type="text" name="adfName" placeholder="First Name" required>
                            <input type="text" name="adlName" placeholder="Last Name" required>
                            <input type="email" name="adEmail" placeholder="Email" required>
                            <input type="password" name="adPassword" placeholder="Password" required>
                            <input type="password" name="adcPassword" placeholder="Confirm Password" required>
                            <input type = "submit" class="add-btn" value="Add Admin" name="addAdmin">
                        </form>
                    </div>
                </div>
        <?php break; 
            case 'delete':
                $sql = "DELETE FROM doctors WHERE doctorId=".$_GET['doctorId'];
                if(!mysqli_query($conn, $sql)):
                    echo '<script>alert("Error");</script>';
                endif;
                header('Location: index.php');
            break;
            case 'edit':
                $sql = "SELECT * FROM doctors WHERE doctorId=" . $_GET['doctorId'];
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="edit-div">
                    <h1>Edit Doctor</h1>
                    <form method="POST" class="edit-form" action="<?=$_SERVER['PHP_SELF']?>">
                        <input type="text" name="docName" value="<?=$row['name']?>" placeholder="Doctor's Name">
                        <input type="tel" name="docPhone" value="<?=$row['phone']?>" placeholder="Doctor's Phone">
                        <input type="text" name="docAddress" value="<?=$row['address']?>" placeholder="Doctor's Address">
                        <input type="text" name="doctorId" value="<?=$row['doctorId']?>" hidden>
                        
                        <select name="docCity">
                            <?php
                                $sql="SELECT * FROM lists";
                                $result= mysqli_query($conn, $sql);
                                $lists = mysqli_fetch_all($result);
                                echo $row['city'];
                                foreach($lists as $list):?>
                                    <option <?=selectForm($list[1], $row['city'])?>>
                                        <?=$list[1]?>
                                    </option>
                                <?php endforeach;?>
                            ?>
                        </select>
                        <select name="docDepart">
                            <?php
                                $sql="SELECT * FROM lists";
                                $result= mysqli_query($conn, $sql);
                                $lists = mysqli_fetch_all($result);
                                foreach($lists as $list):?>
                                    <option <?=selectForm($list[0], $row['department']);?>>
                                        <?=$list[0];?>
                                    </option>
                                <?php endforeach;?>
                        </select>
                        <input type = "submit" class="add-btn" value="Edit Doctor" name="editDoctor">
                    </form>
                </div>
                <?php
            break;
            default:?>
                <div class="search-div">
                    <input type="search" class="search-engine" placeholder="Type number or name of doctor">
                </div>
                <div id="search-output">
                    <?php
                        tableSearch($conn, "SELECT * FROM doctors");
                    ?>
                </div>
                <a href="index.php?action=add" class="add-link">Add Admin or Doctor</a>
        <?php
        endswitch; 
    else:?>
        <div class="search-div">
            <input type="search" class="search-engine" placeholder="Type number or name of doctor">
        </div>
        <div id="search-output">
            <?php
                tableSearch($conn, "SELECT * FROM doctors");
            ?>
        </div>
        <a href="index.php?action=add" class="add-link">Add Admin or Doctor</a>
    <?php endif;
        require_once "includes/templates/footer.php"; 
    ?>