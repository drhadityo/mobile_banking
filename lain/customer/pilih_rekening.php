<table border="1">
    <tr>
        <th>No</th>
        <th>No rekening</th>
        <th>Balance</th>
        <th>Pilih</th>
    </tr>

    <?php
        require 'adminPermission.inc';

        include 'koneksi.php';

        $statements = $connection->prepare("SELECT * FROM rekening WHERE username = :username");
        $statements->bindValue(':username',$_SESSION['isUser']);
        $statements->execute();

        $no = 1;
        foreach($statements as $row){
            echo "       <tr>
                            <td class='notd'>$no</td>
                            <td class='namacus'>{$row['no_rek']}</td>
                            <td class='email'>{$row['balance']}</td>
                            <td><a href='pilih_rekening.php?no_rek={$row['no_rek']}'>Pilih</a></td>
                        </tr>";
            $no++;
        }
    ?>
</table>
<?php echo"<a href='transfer.php?no_rek={$_GET['no_rek']}'>Pilih</a>"; ?><br>
<a href="logout.php">Logout</a>