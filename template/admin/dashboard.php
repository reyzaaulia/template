<?php
require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Halaman Data Perusahaan</title>
  <!-- Bootstrap CSS for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      position: relative;
    }

    .navbar {
      background-color: #343a40;
      padding: 10px 20px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .dashboard-title {
      color: white;
      margin: 0;
    }

    .profile-container {
      position: relative;
      display: inline-block;
    }

    .profile-button {
      border: none;
      background-color: transparent;
      cursor: pointer;
      position: relative;
    }

    .profile-button img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      right: 0;
      top: 50px;
      background-color: #343a40;
      padding: 10px 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      white-space: nowrap;
    }

    .dropdown-menu a {
      color: #fff;
      text-decoration: none;
      display: block;
    }

    .dropdown-menu a:hover {
      text-decoration: underline;
    }

    .content {
      padding: 70px 20px;
    }

    .table-wrapper {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .table thead {
      background-color: #ffc107;
      color: #000;
    }

    .table thead th {
      text-align: center;
    }

    .table tbody td {
      text-align: center;
    }

    .table a {
      text-decoration: none;
    }

    .table a:hover {
      text-decoration: underline;
    }

    .action-btns {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .edit-btn,
    .delete-btn,
    .add-btn {
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .edit-btn {
      background-color: #007bff;
    }

    .edit-btn:hover {
      background-color: #0056b3;
    }

    .delete-btn {
      background-color: #dc3545;
    }

    .delete-btn:hover {
      background-color: #c82333;
    }

    .add-btn {
      background-color: #28a745;
      margin-bottom: 20px;
    }

    .add-btn:hover {
      background-color: #218838;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <h2 class="dashboard-title mb-0">Dashboard Admin</h2>
    <div class="profile-container">
      <button class="profile-button" id="profileButton">
        <img src="https://via.placeholder.com/40" alt="User Avatar" />
      </button>
      <div class="dropdown-menu" id="dropdownMenu">
        <a href="#" class="logout">Logout</a>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="table-wrapper">
      <h4>Data Perusahaan A</h4>
      <a href="add.php?table=perusahaana" class="btn add-btn">Tambah Data</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kontak</th>
            <th scope="col">Perusahaan</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'functions.php';
          // Menampilkan data dari tabel perusahaana
          getPerusahaanData('perusahaana', $conn);
          ?>
        </tbody>
      </table>
    </div>

    <div class="table-wrapper">
      <h4>Data Perusahaan B</h4>
      <a href="add.php?table=perusahaanb" class="btn add-btn">Tambah Data</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kontak</th>
            <th scope="col">Perusahaan</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Menampilkan data dari tabel perusahaanb
          getPerusahaanData('perusahaanb', $conn);
          ?>
        </tbody>
      </table>
    </div>

    <div class="table-wrapper">
      <h4>Data Perusahaan C</h4>
      <a href="add.php?table=perusahaanc" class="btn add-btn">Tambah Data</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kontak</th>
            <th scope="col">Perusahaan</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Menampilkan data dari tabel perusahanc
          getPerusahaanData('perusahaanc', $conn);
          ?>
        </tbody>
      </table>
    </div>

    <div class="table-wrapper">
      <h4>Data Perusahaan D</h4>
      <a href="add.php?table=perusahaand" class="btn add-btn">Tambah Data</a>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kontak</th>
            <th scope="col">Perusahaan</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Menampilkan data dari tabel perusahaand
          getPerusahaanData('perusahaand', $conn);
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle dropdown menu visibility on profile button click
    document.getElementById('profileButton').addEventListener('click', function() {
      var dropdownMenu = document.getElementById('dropdownMenu');
      dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' : 'block';
    });

    // Hide dropdown when clicking outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.profile-button') && !event.target.matches('.profile-button img')) {
        var dropdowns = document.getElementsByClassName('dropdown-menu');
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.style.display === 'block') {
            openDropdown.style.display = 'none';
          }
        }
      }
    };
  </script>
</body>

</html>