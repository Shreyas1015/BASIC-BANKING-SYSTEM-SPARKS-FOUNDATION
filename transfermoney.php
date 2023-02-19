<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS StyleSheet -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->

    <script src="https://kit.fontawesome.com/3d5c46f6e6.js" crossorigin="anonymous"></script>


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>


    <img class="bg-img" src="images/bg-image.jpg" alt="">
    <!-- NAV-BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top ">

        <a class="navbar-brand" href="">SPARKS-BANK</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark navbar-dark bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel ">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ">
                <ul class="navbar-nav  justify-content-end  flex-grow-1 pe-3 ">

                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viewcustomers.php">VIEW CUSTOMERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">CONTACT US</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-4">

                <div class="card" id="card-1">

                    <form method="POST">
                        <?php
                        include 'connection.php';
                        $ids = $_GET['idtransfer'];
                        $showquery = "select * from `users` where ID=($ids) ";
                        $showdata = mysqli_query($con, $showquery);
                        if (!$showdata) {
                            printf("Error: %s\n", mysqli_error($con));
                            exit();
                        }
                        $arrdata = mysqli_fetch_array($showdata);

                        ?>

                        <div class="card-body">

                            <h1 class="text-center card-head">SENDER</h1>

                            <label>Name :</label>

                            <input type="text" name="name1" value="<?php echo $arrdata['Name']; ?>" required
                                placeholder="Enter your name" />
                            <br><br>
                            <label>Email :</label>

                            <input type="text" name="email1" value="<?php echo $arrdata['Email']; ?>" required
                                placeholder="Enter email id" />
                            <br><br>
                            <label>Amount :</label>

                            <input type="text" name="amount1" value="" required placeholder="Enter amount" />
                            <br><br>
                        </div>

                </div>
            </div>

            <div class="col-sm-4 ">
                <div class="card text-center" id="card-2">
                    <img class="card-img" src="https://suitsmecard.com/app/uploads/2021/06/bank-transfer.jpg" alt="">
                    <div class="card-body">
                        <button class="card-btn" name="submit">PROCEED TO PAY</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">

                <div class="card" id="card-3">

                    <div class="card-body">

                        <h1 class="text-center card-head">RECEIVER</h1>

                        <label>Name :</label>
                        <input type="text" name="name2" value="" required placeholder="Enter your name" /><br><br>
                        <label>Email :</label>
                        <input type="text" name="email2" value="" required placeholder="Enter email id" /><br><br>

                    </div>

                </div>
            </div>

        </div>

    </div>

    </form>
    <?php

    include 'connection.php';

    if (isset($_POST['submit'])) {


        $Sender_name = $_POST['name1'];
        $Sender_email = $_POST['email1'];
        $Sender = $_POST['amount1'];
        $Receiver_name = $_POST['name2'];
        $Receiver_email = $_POST['email2'];



        $ids = $_GET['idtransfer'];
        $senderquery = "select * from `users` where ID=$ids ";
        $senderdata = mysqli_query($con, $senderquery);

        if (!$senderdata) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $arrdata = mysqli_fetch_array($senderdata);

        //receiverquery
        $receiverquery = "select * from `users` where Email='$Receiver_email' ";
        $receiver_data = mysqli_query($con, $receiverquery);

        if (!$receiver_data) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $receiver_arr = mysqli_fetch_array($receiver_data);
        $id_receiver = $receiver_arr['ID'];


        if ($arrdata['Amount'] >= $Sender) {
            $decrease_sender = $arrdata['Amount'] - $Sender;
            $increase_receiver = $receiver_arr['Amount'] + $Sender;
            $query = "UPDATE `users` SET `ID`=$ids,`Amount`= $decrease_sender  where `ID`=$ids ";
            $rec_query = "UPDATE`users` SET `ID`=$id_receiver,`Amount`= $increase_receiver where  `ID`=$id_receiver ";
            $res = mysqli_query($con, $query);
            $rec_res = mysqli_query($con, $rec_query);
            // $res_receiver=mysqli_query($con,$query_receiver);
            if ($res && $rec_res) {
                ?>
                <script>         swal("Done!", "Transaction Successful!", "success");
                </script>

                <?php

            } else {
                ?>
                <script>         swal("Error!", "Error Occured!", "error");
                </script>

                <?php

            }
        } else {
            ?>
            <script>         swal("Insufficient Balance", "Transaction Not  Successful!", "warning");
            </script>
            <?php


        }

    }
    ?>

    <script>
        onclick = "document.getElementById('demo').innerHTML 
    </script>

</body>

</html>