<?php

include("config/cohort_interns_connet.php");

$email = $title = $ingredients = '';

$errors = ['email' => '', 'title' => '', 'ingredients' => ''];

if (isset($_POST['submit'])) {


    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required';
    } else {

        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid address';
        }
    }


    //check the title
    if (empty($_POST['title'])) {
        $errors['title'] = 'A title is required';
    } else {

        $title = $_POST['title'];

        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['ingredients'] = 'Title must be letters and space only';
        }
    }

    //check the ingredients
    if (empty($_POST['ingredients'])) {

        $errors['ingredients'] = 'At least one ingredient is required';
    } else {
        $ingredients = $_POST['ingredients'];


        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'ingredients must be a comma seperated list';
        }
    }

    if (array_filter($errors)) {
        //echo 'errors in the form '

    } else {

        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $ingredients = mysqli_real_escape_string($connect, $_POST['ingredients']);

        //create sql Queries
        $sqlQueries = "INSERT INTO cohort_delicacy(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

        //saVE TO DATABASE
        if (mysqli_query($connect, $sqlQueries)) {
            //succes
            header('Location:index.php');
        } else {
            echo 'Query Error: ' . mysqli_error($connect);
        }
    }
}
?>


<!DOCTYPE html>
<html>


<?php include("templates/header.php"); ?>

<section class="container py-5">
    <h4 class="text-secondary text-center mb-4">
        Add Cohort Delicacies in the Form Below
    </h4>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Your Email
                            </label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="<?php echo htmlspecialchars($email) ?>" />

                                <div class="text-danger">
                                    <?php echo $errors['email']; ?>
                                </div>
                            
                        </div>

                                <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Delicacy Title
                            </label>
                            <input type="text"
                                class="form-control  "
                                id="title" 
                                name="title"
                                value="<?php echo htmlspecialchars($title) ?>" />

                                <div class="text-danger">
                            <?php echo $errors['title']; ?>
                        </div>

                </div>


                <div class="mb-4">
                    <label for="ingredients" class="form-label">
                        Delicacy Ingredient (comma seperated)
                    </label>
                    <input type="text"
                        class="form-control"
                        id="ingredients" name="ingredients"
                        value="<?php echo htmlspecialchars($ingredients) ?>" />

                        <div class="text-danger">
                    <?php echo $errors['ingredients']; ?>
                </div>

            </div>

            <div class="text-center py-2 px-4">
                <button name="submit" class="btn 
                btn-primary">
                    Submit
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</section>


<?php include("templates/footer.php"); ?>

</html>