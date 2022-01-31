<?php include "parts/header.php"; ?>

<div class="container mt-5">
    <div class="row">
        <h2> Creeaza cont </h2>
        <div class="col-12 mt-5">
            <form method="post" action="processRegister.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Parola:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Parola">
                </div>
                <?php if (getAuthUser() && getAuthAdmin()): ?>
                    <div class="form-group">
                        <label for="password">Role:</label>
                        <select type="text" name="role" class="form-control" id="role" placeholder="Role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p>Ai deja un cont? <a href="login.php">Login</a></p>
        </div>
    </div>