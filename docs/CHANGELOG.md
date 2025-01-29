# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

-   Initial project setup with Laravel
-   Basic authentication system with multi-role support (admin, doctor, patient)
-   Database migrations:
    -   Users table with role support
    -   Password reset tokens table
    -   Sessions table
-   Controllers:
    -   DashboardController for role-based redirects
    -   Role-specific dashboard controllers (Admin, Doctor, Patient)
    -   AppointmentController for managing appointments
    -   AdminDoctorController for doctor management
-   Authentication:
    -   Custom registration with patient profile creation
    -   Role-based login redirects
    -   Admin seeder for initial admin user
-   Routes:
    -   Public routes
    -   Role-specific dashboard routes
    -   Appointment management routes
    -   Doctor management routes
-   Middleware:
    -   CheckRole middleware for role-based access control
-   Views:
    -   Role-specific dashboard views
    -   Admin statistics dashboard
    -   Doctor appointments view
    -   Patient appointments view

### Changed

-   Modified default Laravel auth to support roles
-   Enhanced registration form to include patient details
-   Customized login redirects based on user role
-   Removed duplicate migrations for failed_jobs and personal_access_tokens
-   Removed Sanctum dependency from User model for simpler authentication
-   Fixed role middleware registration in Kernel.php
-   Reorganized initial migration to include all core tables

### Security

-   Added role-based middleware
-   Implemented authorization checks for appointments
