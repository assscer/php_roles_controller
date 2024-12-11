# User Directory with PHP, MySQL, and Webix

## Description
A user management application built with PHP, MySQL, and Webix. Features include adding, editing, blocking, and deleting users, as well as assigning roles.

## Features
- Add, edit, block/unblock, and delete users.
- Manage user roles (Admin, Editor, Viewer).
- Responsive Webix frontend with a dynamic table and form.

## Setup
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd project
2. Docker:
   ```bash
   docker-compose up -d
   http://localhost:8080
   FULL_STACK/
    ├── backend/
    │   ├── roles/
    │   │   └── list.php         # List roles API
    │   ├── users/
    │   │   ├── block.php        # Block user API
    │   │   ├── create.php       # Create user API
    │   │   ├── list.php         # List users API
    │   │   └── .htaccess        # Access control file
    │   ├── db.php               # Database connection
    │   └── index.php            # Backend entry point
    ├── frontend/
    │   ├── app.js               # Frontend logic
    │   ├── index.html           # Frontend interface
    │   └── styles.css           # Styles for the interface
    ├── docker-compose.yml        # Docker configuration
    └── README.md                 # Project documentation


