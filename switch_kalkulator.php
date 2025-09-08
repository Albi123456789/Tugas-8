<?php
$result = null;
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = floatval($_POST['a']);
    $b = floatval($_POST['b']);
    $op = $_POST['op'];

    switch ($op) {
        case '+': $result = $a + $b; break;
        case '-': $result = $a - $b; break;
        case '*': $result = $a * $b; break;
        case '/': $result = $b==0 ? $error="Tidak bisa dibagi 0" : $a / $b; break;
        case '%': $result = $b==0 ? $error="Tidak bisa dibagi 0" : $a % $b; break;
        default: $error = "Operator salah"; break;
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>SWITCH Kalkulator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
  <h1>Kalkulator SWITCH</h1>
  <form method="post" class="calc">
    <input class="input" type="number" step="any" name="a" placeholder="Angka 1" required>
    <select name="op" class="input">
      <option>+</option><option>-</option><option>*</option><option>/</option><option>%</option>
    </select>
    <input class="input" type="number" step="any" name="b" placeholder="Angka 2" required>
    <button class="btn" type="submit">Hitung</button>
  </form>
  <?php if($error): ?><div class="result"><?php echo $error; ?></div>
  <?php elseif($result !== null): ?><div class="result">Hasil: <?php echo $result; ?></div><?php endif; ?>
  <a href="index.php">Kembali</a>
</div>
</body>
</html>
