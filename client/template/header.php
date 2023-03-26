<?php
include_once "../../config.php";
include_once('../../api/auth/access_control.php');
include_once('../../api/util/db.php');
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/image/icon.png">
    <link rel="stylesheet" href="../assets/css/flowbite.min.css" />
    <link rel="stylesheet" href="../assets/css/output.css" />
    <link rel="stylesheet" href="../assets/icons/remixicon/remixicon.css" />
    <script src="../assets/js/jquery-3.6.4.min.js" defer></script>
    <script src="../assets/js/flowbite.min.js" defer></script>
    <script src="../assets/js/script.js" defer></script>

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <title>SMART App</title>
</head>

<body class="bg-white dark:bg-gray-800">