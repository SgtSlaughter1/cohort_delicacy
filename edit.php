<?php
include("config/cohort_interns_connet.php");

// Update delicacy
if (isset($_POST["update"])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $title = mysqli_real_escape_string($connect, $_POST['title']);
    $ingredients = mysqli_real_escape_string($connect, $_POST['ingredients']);
    $id = mysqli_real_escape_string($connect, $_POST['id']);

    $query = "UPDATE cohort_delicacy SET email='$email', title='$title', ingredients='$ingredients' WHERE id='$id'";
    if (mysqli_query($connect, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}

// Fetch delicacy details
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $query = "SELECT * FROM cohort_delicacy WHERE id='$id'";
    $result = mysqli_query($connect, $query);
    if ($result) {
        $delicacies = mysqli_fetch_array($result);
        if ($delicacies) {
            $email = $delicacies['email'];
            $title = $delicacies['title'];
            $ingredients = $delicacies['ingredients'];
        }
        mysqli_free_result($result);
    } else {
        echo "Error fetching record: " . mysqli_error($connect);
    }
    mysqli_close($connect);
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

                        </div>


                        <div class="mb-4">
                            <label for="ingredients" class="form-label">
                                Delicacy Ingredient (comma seperated)
                            </label>
                            <input type="text"
                                class="form-control"
                                id="ingredients" name="ingredients"
                                value="<?php echo htmlspecialchars($ingredients) ?>" />


                        </div>
                        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>

                        <div class="text-center py-2 px-4">
                            <button name="update" value="Update" class="btn 
                btn-success">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("templates/footer.php"); ?>