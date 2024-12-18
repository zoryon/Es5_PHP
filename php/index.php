<!DOCTYPE html>
<html lang="en">

<head>
    <!-- settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>PHP page</title>
</head>

<body>
    <?php
        // check request method validity
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header("Location: index.html");
        }

        // check if the form is submitted correctly
        if (
            !isset($_POST['name']) ||
            !isset($_POST['age']) ||
            !isset($_POST['frequency'])
        ) {
            return;
        }

        session_start();

        // setting variables
        $name = $_POST['name'];
        $age = $_POST['age'];
        $frequency = $_POST['frequency'];

        // validating form data
        if (
            empty($name) ||
            empty($age) ||
            empty($frequency) ||
            !is_numeric($age) ||
            $age < 14
        ) {
            return;
        }

        // calculate annual cost
        $monthlyCost = ($age < 18 || $age > 64) ? 35 : 45;

        // calculate annual cost
        $discounts = [
            'monthly' => 1,
            'bimonthly' => 0.90,
            'quarterly' => 0.85,
            'annual' => 0.80,
        ];

        $multiplier = $discounts[$frequency];

        // total cost
        $annualCost = $monthlyCost * 12 * $multiplier;

        // store result in session
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        $_SESSION['users'][] = [
            'name' => $name,
            'age' => $age,
            'payment_frequency' => $frequency,
            'annual_cost' => $annualCost,
        ];

        echo "<h1>Success</h1>";
    ?>
</body>

</html>