<?php
session_start();

$_SESSION['name'] = 'Peace';
$name = $_SESSION['name'] ?? 'Guest';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style> 

        form{
            max-width:460px;
            margin:20px auto;
            padding:20px;
        }

        .delicacy{
            width:100px;
            margin:40px auto -30px;
            display:block;
            position:relative;
            top:-30px;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: transform .3 ease;
            cursor:pointer;
        }
        .nav-bg{
            background-color:white;
            box-shadow:none;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg nav-bg">
        <div class="container">
            <a href="index.php" class="text-decoration-none btn-primary">Cohort Delicacies</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <span class="nav-link text-secondary">
                        Hello <?php echo htmlspecialchars($name)?>
                    </span> 
                </li>

                <li class="nav-item ms-2">
                    <a href="add.php" class="btn btn-success text-white"> Add a Delicacy</a>
                </li>
            </ul>
        </div>

        </div>
    </nav>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>