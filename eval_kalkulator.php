<?php
$result = null;
$error = '';
$expr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expr = $_POST['expr'];
    if (preg_match('/^[0-9+\\-\\*\\/\\%\\.\\(\\)\\s]+$/', $expr)) {
        try {
            $result = eval("return $expr;");
        } catch (Throwable $e) {
            $error = "Ekspresi salah";
        }
    } else {
        $error = "Input tidak valid";
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>EVAL Kalkulator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
  <h1>Kalkulator EVAL</h1>
  <form method="post" class="calc" style="grid-template-columns:1fr auto">
    <input class="input" type="text" name="expr" placeholder="Contoh: (3+2)*4" value="<?php echo $expr; ?>">
    <button class="btn">Hitung</button>
  </form>
  <?php if($error): ?><div class="result"><?php echo $error; ?></div>
  <?php elseif($result !== null): ?><div class="result">Hasil: <?php echo $result; ?></div><?php endif; ?>
  <a href="index.php">Kembali</a>
</div>
</body>
</html>
