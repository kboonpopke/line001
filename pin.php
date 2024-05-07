<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Template · Bootstrap v5.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="check_login.php" method="post">

            <h1 class="h3 mb-3 fw-normal">PIN</h1>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Password</label>
                <button class="w-100 btn btn-lg btn-primary" type="submit">OK</button>
        </form>
    </main>
    <button class="btn btn-danger">
        <a href="index.php">← Back</a>
    </button>
    
</body>

</html>