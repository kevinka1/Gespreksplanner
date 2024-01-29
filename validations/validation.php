<?php

// Function to validate an appointment ID
function validateAppointmentId($appointmentId) {
    // Ensure that the appointment ID is a positive integer
    if (!is_numeric($appointmentId) || $appointmentId <= 0) {
        return 'Invalid appointment ID.';
    }

    // Additional validation logic if needed

    return null; // No validation errors
}

// Function to validate user registration data
function validateRegistration($username, $email, $password, $confirmPassword) {
    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = 'Username is required.';
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address.';
    }

    // Validate password
    if (empty($password) || strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters long.';
    }

    // Validate password confirmation
    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    return $errors;
}

?>
