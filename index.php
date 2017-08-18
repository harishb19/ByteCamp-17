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
                    <th>Name</th>
                    <th>book Id</th>
                    <th>stock</th>
                </tr>
                </thead>
                <tbody>
            <?php
            require_once($_SERVER['DOCUMENT_ROOT'] . '/require.php');
            $get_books = mysqli_query($connection, "SELECT * from books ORDER by stock");
            while ($row = mysqli_fetch_assoc($get_books)){
                echo '
                      
							<tr>
								<td>'.$row['id'].'</td>
								<td>'.$row['book_name'].'</td>
								<td>'.$row['b_id'].'</td>
								<td>'.$row['stock'].'</td>
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
