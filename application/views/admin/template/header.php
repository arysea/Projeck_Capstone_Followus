<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Admin Dashboard' ?></title>
    <!-- Memanggil CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Memanggil CSS FontAwesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Sedikit Custom CSS -->
    <style>
        body {
            background-color: #f1f5f9;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }
        .sidebar-link {
            color: #4b5563;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 8px;
            margin-bottom: 5px;
            font-weight: 500;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background-color: #6366f1;
            color: white;
        }
        .topbar {
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .content-area {
            padding: 25px;
        }
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .modal-confirm .modal-content {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }
        .modal-confirm .modal-title {
            margin: 0;
            font-size: 1.45rem;
            font-weight: 700;
            color: #111827;
        }
        .modal-confirm .modal-body {
            color: #4b5563;
            font-size: 1.15rem;
        }
        .modal-confirm .modal-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background-color: #e0e7ff;
            color: #4f46e5;
            font-size: 2.25rem;
            margin-left: auto;
            margin-right: auto;
        }
        .modal-confirm .modal-icon i {
            line-height: 1;
        }
        .modal-confirm .btn {
            border-radius: 50px;
            min-width: 110px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Konten Sidebar dan lainnya dilanjutkan di file berikutnya -->
