<?php
// Include the database configuration file
include '../config/config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the SQL statement for inserting the user
    $stmt = $conn->prepare("INSERT INTO users (employee_id, first_name, middle_name, last_name, email, contact, password) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Check for errors in preparing the statement
    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }

    // Set parameters for the user
    $employee_id = $_POST['employee_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $employee_id . '@' . $last_name;

    // Bind the parameters for the user insertion
    $stmt->bind_param("sssssss", $employee_id, $first_name, $middle_name, $last_name, $email, $contact, $password);

    // Execute the statement to insert the user
    if ($stmt->execute()) {
        // Get the newly inserted user ID
        $user_id = $stmt->insert_id;

        // Now handle the roles
       // Now handle the roles
    if (isset($_POST['roles']) && !empty($_POST['roles'])) {
        $roles = $_POST['roles']; // An array of selected roles
        foreach ($roles as $role_name) {
            // Prepare the statement for inserting into user_roles
            $role_stmt = $conn->prepare("SELECT id FROM roles WHERE role_name = ?");
            $role_stmt->bind_param("s", $role_name);
            $role_stmt->execute();
            $role_stmt->bind_result($role_id);
            if ($role_stmt->fetch()) { // Ensure that role_id is fetched successfully
                $role_stmt->close();

                // Insert into user_roles
                $user_role_stmt = $conn->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (?, ?)");
                $user_role_stmt->bind_param("ii", $user_id, $role_id);
                $user_role_stmt->execute();
                $user_role_stmt->close();
            } else {
                // Handle case where the role was not found
                echo "Role not found: " . htmlspecialchars($role_name);
            }
        }
    } else {
        echo "No roles selected.";
    }


        // Redirect to user.php with a success message
        header("Location: ../admin/user.php?success=1");
        exit(); // Ensure no further code is executed
    } else {
        echo "Error: " . $stmt->error; // Display any error from executing the statement
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
