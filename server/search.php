<?php
$conn = new PDO("mysql:host=localhost;dbname=newstuffsa_database",'root','');

if (isset($_POST["searchButton"])){
    $str = $_POST["searchInput"];
    $sth = $conn->prepare("SELECT * FROM 'newstuffsa_database' WHERE fldproductname = '$str'");

    $sth->setFetchMode(PDO::FETCH_ASSOC);
    $sth->execute();

    if ($row = $sth->fetch()){
        ?>
        <br><br><br>
        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><?php echo $row->Name; ?></td>
                <td><?php echo $row->Description;?></td>
            </tr>
        </table>
        <?php
    }
    
        else{
            echo "product not found";
        } 

}

?>