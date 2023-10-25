<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: aqua;
        }

        .Kartu {
            max-width: 400px;
            margin: 170px auto;
            align-items: center;
            text-align: center;
            padding: 20px;
            background-color: cornflowerblue;
            border-radius: 20px;
        }

        .pemberitahuan {
            font-size: 18px;
            margin: 20px 0;
        }

        .form {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1><marquee behavior="scroll" direction="Left">MruX Store</marquee></h1>
    <div class="Kartu">
        <h2>Kasir</h2>
        <form method="post">
            <div class="form">
                <label for="harga">Total Harga Barang </label>
                <input type="number" name="harga" id="harga" >
            </div>
            <div class="form">
                <label for="uang">Jumlah Uang Diberikan</label>
                <input type="number" name="uang" id="uang" >
            </div>
            <div class="form">
                <label for="metode">Metode Pembayaran:</label>
                <select name="metode" id="metode">
                    <option value="tunai" >Tunai</option>
                    <option value="kartu" >Dana</option>
                    <option value="kartu" >ShopeePay</option>
                    <option value="kartu" >Gopay</option>
                </select>
            </div>
            <button type="submit">Hitung</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $harga = $_POST["harga"];
                $uang = $_POST["uang"];
                $metode = $_POST["metode"];

                if ($metode === "tunai") {
                    if ($harga == $uang) {
                        $message = "Uang Anda pas. Silakan Menikmati Makanan";
                    } elseif ($uang > $harga) {
                        $message = "Uang Anda Lebih. Jangan Lupa Ambil Kembalian";
                    } else {
                        $message = "Uang Anda kurang. Makanya Kerja";
                    }
                } elseif ($metode !== "tunai"){
                    if ($uang >= $harga) {
                        $message = "Pembayaran Sukses. Silakan Menikmati Makanan";
                    } else {
                        $message = "Top Up Dulu Sana Bro/Sis";
                    }
                }
            }
        ?>

        <?php if (isset($message)): ?>
            <div class="pemberitahuan">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>