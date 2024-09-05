<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Form</title>
  <style>
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .register-container {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      width: 350px;
    }

    .register-form {
      display: flex;
      flex-direction: column;
    }

    .register-form h2 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
      position: relative;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
      box-sizing: border-box;
    }

    .form-group input::placeholder {
      color: #aaa;
    }

    button {
      background-color: #4d8ef7;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #3c7ce7;
    }

    .form-group {
      margin-bottom: 1rem;
      /* Jarak antar elemen form */
    }

    .form-group label {
      display: block;
      /* Memastikan label berada di atas elemen input */
      margin-bottom: 0.5rem;
      /* Jarak antara label dan elemen input */
    }

    .form-group select {
      height: 2.5rem;
      /* Tinggi dropdown */
      width: 100%;
      /* Memastikan select mengambil lebar penuh dari container */
    }
  </style>
</head>

<body>
  <div class="register-container">
    <!-- Tambahkan action dan method ke form -->
    <form class="register-form" action="register_process.php" method="POST">
      <h2>Registrasi Akun</h2>
      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" placeholder="Nama Lengkap" />
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Username" />
      </div>
      <div class="form-group">
        <label for="company">Perusahaan</label>
        <select id="company" name="company" class="form-control">
          <option value="">Pilih Perusahaan</option>
          <option value="perusahaana">Perusahaan A</option>
          <option value="perusahaanb">Perusahaan B</option>
          <option value="perusahaanc">Perusahaan C</option>
          <option value="perusahaand">Perusahaan D</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Your Password" />
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>

</html>