<!DOCTYPE html>
<html lang="en">

<head>
    <!-- settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- title -->
    <title>PHP user's page</title>
</head>

<body>
    <?php 
        session_start();

        $total_users = 0;
        $total_revenue = 0;

        if (isset($_SESSION['users']) && is_array($_SESSION['users'])) {
            $total_users = count($_SESSION['users']);

            foreach ($_SESSION['users'] as $user) {
                $total_revenue += $user['annual_cost'];
            }
        }
    ?>

    <h1>Users</h1>
    <p>Total users: <?php echo $total_users; ?></p>

    <h1>Revenue</h1>
    <p>Total revenue: <?php echo $total_revenue; ?></p>    
</body>

</html>