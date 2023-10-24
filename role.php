<?php
session_start();

if (!(isset($_SESSION["role"]))) {
    header('Location: ./index.php');

} elseif (!($_SESSION["role"] == "admin")) {
    header('Location: ./index.php');
}

$fileData = unserialize(file_get_contents('./data.txt'));
$data = $fileData[$_GET['key']];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Crew Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                                        <?php echo ucfirst($_GET['action']) ?? ''; ?> Role
                                    </p>

                                    <form class="mx-1 mx-md-4" name="registration"
                                        action="./implement/RoleManagement.php" method="POST">
                                        <input type="hidden" name="key" value="<?php echo $_GET['key'] ?? '' ?>">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Select Role</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                    <option value=" ">Choose role</option>
                                                    <option value="admin" <?php echo ($data['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                    <option value="user" <?php echo ($data['role'] == 'user') ? 'selected' : ''; ?>>User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0 text-danger">
                                                <?php
                                                if (isset($_SESSION['msg'])) {
                                                    echo $_SESSION['msg'];
                                                    unset($_SESSION['msg']);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg"
                                                name="submit">Submit</button>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>