<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.html');
?>
<div style="height: 200px;">
    <br>
    <h1>Welcome to portal</h1>
</div>

<div class="container" style="height: 50vh;">
    <div class="row">
        <div class="col-lg-4">
            <a href="/" class="btn btn-default">
                <button class="btn-block btn btn-basic">
                    Books inventory
                </button>
            </a><br>
            <a href="/issued/" class="btn btn-default">
                <button class="btn-block btn btn-basic">
                    issued books
                </button>
            </a><br>
            <a href="/return/" class="btn btn-default">
                <button class="btn-block btn btn-basic">
                    Books not returned
                </button>
            </a>
        </div>
        <div class="col-lg-8">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>book id</th>
                    <th>user Id</th>
                    <th>date</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
                $get_user = mysqli_query($connection, "SELECT * from issued WHERE b_id!= 0 AND status = 0");
                while ($row = mysqli_fetch_assoc($get_user)){
                    echo '
                      
							<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['b_id'].'</td>
								<td>'.$row['u_id'].'</td>
								<td>'.date('d M Y, h:m A', $row['issued_at']).'</td>								
							</tr>
						
                
                ';
                }
                ?>
                </tbody></table>
        </div>
    </div>
</div>

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.html');
?>
