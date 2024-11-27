<?php 

$redirect_link = "../../";
$side_link = "../../";
include $redirect_link . 'partials/main.php';
include_once $redirect_link . 'include/db.php';



error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get POST parameters
$table = mysqli_real_escape_string($con, $_POST['table']);
$code_name = mysqli_real_escape_string($con, $_POST['code_name']);
$size = mysqli_real_escape_string($con, $_POST['size']);

// Initialize response array
$response = array();

// Validate table name to prevent SQL injection
$allowed_tables = ['jeans', 'shoes', 'complete', 'accessory', 'top'];
if (!in_array($table, $allowed_tables)) {
    $response['error'] = 'Invalid table name';
    echo json_encode($response);
    exit;
}

try {
    // SQL query based on your table structure
    $sql = "SELECT 
                price,
                quantity,
                image
            FROM $table 
            WHERE {$table}_name = ? 
            AND size = ?";

    // Prepare and bind
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt === false) {
        throw new Exception("Error preparing statement: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "ss", $code_name, $size);

    // Execute query
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Error executing statement: " . mysqli_stmt_error($stmt));
    }

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Format response
        $response = array(
            'price' => floatval($row['price']),
            'stock' => intval($row['quantity']),
            'image' => $row['image'] ?? null
        );
    } else {
        $response = array(
            'price' => '0',
            'stock' => '0',
            'image' => null
        );
    }

    // Close statement
    mysqli_stmt_close($stmt);
} catch (Exception $e) {
    $response['error'] = 'Database error: ' . $e->getMessage();
    error_log($e->getMessage());
} finally {
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
