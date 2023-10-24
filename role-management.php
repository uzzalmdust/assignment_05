<?php
session_start();

if (!(isset($_SESSION["role"]))) {
    header('Location: ./index.php');

}elseif( !($_SESSION["role"] == "admin")){
    header('Location: ./index.php');
}

$fileData = unserialize(file_get_contents('./data.txt'));

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
                                <h1 class='text-center'>Role Management<br><br> 
                                <a href="./logout.php" class="btn btn-warning">Log Out</a>
                                </h1>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($fileData as $key => $value) {

                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $i++; ?>
                                                </th>
                                                <td>
                                                    <?php echo $value['username'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo !($value['role'] == ' ') ? $value['role'] : 'Not assign Role' ?>
                                                </td>
                                                <td>
                                                <?php if(($value['role']) != ' ') {?>
                                                    <a href="./role.php?action=edit&key=<?php echo $key; ?>" class="btn btn-info">Edit</a>
                                                    <a href="./implement/Delete.php?key=<?php echo $key; ?>" class="btn btn-danger">Detete</a>
                                                <?php }else{ ?>
                                                    <a href="./role.php?action=create&key=<?php echo $key; ?>" class="btn btn-primary">Create</a> 
                                                <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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