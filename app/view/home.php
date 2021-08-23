<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1 class="bolder">MVC TESTER</h1>
            <small>With user functionality</small>
            <?php
            if($loggedIn){
            ?>
                <br>
                <br>
                <p>Welcome, <?php echo $_SESSION['useruid']; ?></p>
            <?php
            }
            ?>
        </div>
    </div>
</div>