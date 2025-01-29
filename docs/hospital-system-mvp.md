# Hospital Management System MVP

## Core Modules

### 1. Patient Management
- Patient registration and profiles
- View medical history
- Track appointments
- View prescriptions

### 2. Doctor Management
- Doctor profiles with specializations
- Manage schedules/availability
- View assigned patients
- Create prescriptions

### 3. Appointment System
- Book/cancel appointments
- View upcoming appointments
- Basic appointment status tracking
- Email notifications for appointments

### 4. Medicine/Pharmacy
- Medicine inventory management
- Prescription fulfillment
- Stock tracking
- Basic sales recording

## Database Structure

```sql
patients
- id (primary key)
- name
- email
- phone
- date_of_birth
- address
- created_at
- updated_at

doctors
- id (primary key)
- name
- email
- phone
- specialization
- schedule
- created_at
- updated_at

appointments
- id (primary key)
- patient_id (foreign key)
- doctor_id (foreign key)
- appointment_date
- status (scheduled/completed/cancelled)
- notes
- created_at
- updated_at

medicines
- id (primary key)
- name
- generic_name
- category
- stock_quantity
- unit_price
- expiry_date
- created_at
- updated_at

prescriptions
- id (primary key)
- patient_id (foreign key)
- doctor_id (foreign key)
- appointment_id (foreign key)
- date_prescribed
- status (pending/fulfilled)
- created_at
- updated_at

prescription_medicines
- id (primary key)
- prescription_id (foreign key)
- medicine_id (foreign key)
- dosage
- duration
- instructions
- quantity
- created_at
- updated_at
```

## User Roles & Permissions

1. Admin
   - Manage all users
   - Access all modules
   - View reports
   - System configuration

2. Doctor
   - View assigned patients
   - Manage appointments
   - Create prescriptions
   - View patient history

3. Patient
   - View own profile
   - Book appointments
   - View medical history
   - View prescriptions

4. Pharmacist
   - Manage medicine inventory
   - View/fulfill prescriptions
   - Update stock
   - Record sales

## Key Features by Role

### Admin Dashboard
- User management
- Department management
- Basic reporting
- System settings

### Doctor Dashboard
- Today's appointments
- Patient list
- Create prescriptions
- Schedule management

### Patient Portal
- Book appointments
- View prescriptions
- Medical history
- Update profile

### Pharmacy Dashboard
- Medicine inventory
- Pending prescriptions
- Low stock alerts
- Basic sales view

## Technology Stack

1. Backend
   - Laravel 10+
   - MySQL 8.0+
   - PHP 8.1+

2. Frontend
   - Blade templates
   - Bootstrap 5
   - jQuery

3. Key Laravel Features to Use
   - Laravel Authentication
   - Laravel Migration
   - Laravel Seeder
   - Laravel Mail
   - Laravel Events
   - Laravel Gates/Policies

## Initial Development Phases

Phase 1:
- Basic user authentication
- Patient and doctor management
- Simple appointment booking

Phase 2:
- Prescription system
- Medicine inventory
- Email notifications

Phase 3:
- Reports and analytics
- Stock alerts
- System optimization
