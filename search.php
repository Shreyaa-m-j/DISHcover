<?php
include('connection/db.php');

// Fetch recipe details
$sql_recipe = "SELECT * FROM recipes WHERE recipe_id = 1";
$result_recipe = mysqli_query($conn, $sql_recipe);
$recipe = mysqli_fetch_assoc($result_recipe);

// Fetch ingredients for the recipe
$sql_ingredients = "SELECT i.ingredient_name FROM ingredients i
                    JOIN recipe_ingredients ri ON i.ingredient_id = ri.ingredient_id
                    WHERE ri.recipe_id = " . $recipe['recipe_id'];
$result_ingredients = mysqli_query($conn, $sql_ingredients);

// Fetch recipe steps
$sql_steps = "SELECT step_description FROM recipe_steps WHERE recipe_id = " . $recipe['recipe_id'] . " ORDER BY step_number";
$result_steps = mysqli_query($conn, $sql_steps);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $recipe['recipe_name']; ?> Recipe</title>
</head>
<body>
    <h1><?php echo $recipe['recipe_name']; ?> Recipe</h1>

    <h2>Ingredients:</h2>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($result_ingredients)) {
            echo "<li>" . $row['ingredient_name'] . "</li>";
        } ?>
    </ul>

    <h2>Steps:</h2>
    <ol>
        <?php while ($row = mysqli_fetch_assoc($result_steps)) {
            echo "<li>" . $row['step_description'] . "</li>";
        } ?>
    </ol>
</body>
</html>
