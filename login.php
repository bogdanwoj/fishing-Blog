<?php include "parts/header.php"; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Login</h3>
                        <form action="processLogin.php" method="post">
                            <?php
                            if(isset($_SESSION["error"])){
                                $error = $_SESSION["error"];
                                echo "<p class=\"text-danger\">Email/Parola incorecta</p>";
                            }
                            ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><h5>Email</h5></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"><h5>Password</h5></label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>

                        </form>
                        <p>Nu ai cont? <a href="registerForm.php">Creeaza cont nou</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
unset($_SESSION["error"]);
?>