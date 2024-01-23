<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rujukan Masuk</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #005580;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        button:hover {
            background-color: #45a049;
        }


        .extra-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .extra-buttons button {
            background-color: #008CBA;
        }

        .extra-buttons button:hover {
            background-color: #005580;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .button-container a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container a:first-child {
            background-color: #4caf50;
        }

        .button-container a:last-child {
            background-color: #45a049;
        }

        .button-container a:hover {
            background-color: #4caf50;
        }

        .button-container a:last-child:hover {
            background-color: #4caf50;
        }
    </style>
</head>

<body>
    <div>
        <form action="cetakanrawatjalan.php" method="post">
            <h2>Data Laporan Pasien Rawat Jalan</h2>

            <label for="tgl_awal">Tanggal Awal:</label>
            <input type="date" id="tgl_awal" name="tgl_awal" required>

            <label for="tgl_akhir">Tanggal Akhir:</label>
            <input type="date" id="tgl_akhir" name="tgl_akhir" required>

            <label for="cari">Pencarian:</label>
            <input type="text" id="cari" name="cari" disabled>

            <button type="submit">Cari</button>


        </form>
        <div class="button-container">
            <a href="input.php">Laporan Rujukan Masuk</a>
        </div>
    </div>


</body>

</html>