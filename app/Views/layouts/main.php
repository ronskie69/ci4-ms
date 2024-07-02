<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container {
            position: relative;
            margin: 0px 20px 0px 170px;
        }
        .sidebar {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            border: solid 1px #ccc;
            height: 100vh;
            width: 160px;
            background-color: #f4f5f6;
        }
        .sidebar .sidebar-content {
            position: relative;
            box-sizing: border-box;
            height: 100%;
        }
        .sidebar .sidebar-content .sidebar-links {
            margin: 0 !important;
            list-style: none;
            padding: 0 !important;
        }
        .sidebar .sidebar-content .sidebar-links .sidebar-link-item {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            text-decoration: none;
            border-bottom: solid 1px #ccc;
        }
        .sidebar .sidebar-content .sidebar-links .sidebar-link-item a {
            text-decoration: none;
        }
        .footer {
            height: 50px;
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            border: solid 1px #ccc;
            background-color: #f4f5f6;
        }
        .table {
            width: 100%;
            background-color: #f4f5f6;
            text-align: center;
            vertical-align: middle;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: solid 1px #ccc;
            padding: 5px;
        }
        .table th {
            background-color: #fff;
        }
        .modal {
            position: absolute;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
             top: 0;
             left: 0;
        }
        .modal .modal-overlay {
            /* background: rgba(0,0,0,0.66); */
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .modal .modal-overlay .modal-content {
            background: #fff;
            border: solid 1px #ccc;
            padding: 20px;
        }
        .hidden {
            display: none !important;
        }
        .alert{
            position: relative;
            box-sizing: border-box;
            padding: 5px 10px;
            width: 100%;
            margin-bottom: 10px;
        }
        .alert-success {
            background-color: #b9eda8;
        }
        .alert-error {
            background-color: #eda8a8;
        }
    </style>
</head>
<body>
    <?= $this->include('components/sidebar')?>
   <div class="container">
        <?= $this->renderSection('content')?>
   </div>
   <?= $this->include('components/footer')?>
</body>
</html>