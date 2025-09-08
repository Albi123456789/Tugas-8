<?php
$result = null;
$error = '';
$nums = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nums = $_POST['nums'];
    $op = $_POST['operation'];
    $arr = array_map('floatval', explode(',', $nums));
    if (count($arr)==0) $error="Masukkan angka dipisah koma";
    else {
        if ($op=='sum') $result = array_sum($arr);
        elseif ($op=='avg') $result = array_sum($arr)/count($arr);
        elseif ($op=='max') $result = max($arr);
        elseif ($op=='min') $result = min($arr);
        else $error="Operasi salah";
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>ARRAY Kalkulator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
  <h1>Kalkulator ARRAY</h1>
  <form method="post" class="calc" style="grid-template-columns:1fr auto auto">
    <input class="input" type="text" name="nums" placeholder="3,4,5" value="<?php echo $nums; ?>">
    <select name="operation" class="input">
      <option value="sum">Jumlah</option>
      <option value="avg">Rata-rata</option>
      <option value="max">Maksimum</option>
      <option value="min">Minimum</option>
    </select>
    <button class="btn">Proses</button>
  </form>
  <?php if($error): ?><div class="result"><?php echo $error; ?></div>
  <?php elseif($result !== null): ?><div class="result">Hasil: <?php echo $result; ?></div><?php endif; ?>
  <a href="index.php">Kembali</a>
</div>
</body>
</html>
