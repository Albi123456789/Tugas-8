<?php
function add($a,$b){return $a+$b;}
function sub($a,$b){return $a-$b;}
function mul($a,$b){return $a*$b;}
function divi($a,$b){if($b==0) throw new Exception("Tidak bisa dibagi 0"); return $a/$b;}
function mod($a,$b){if($b==0) throw new Exception("Tidak bisa dibagi 0"); return $a%$b;}

$result=null; $error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $a=floatval($_POST['a']);
  $b=floatval($_POST['b']);
  $op=$_POST['op'];
  try{
    switch($op){
      case '+':$result=add($a,$b);break;
      case '-':$result=sub($a,$b);break;
      case '*':$result=mul($a,$b);break;
      case '/':$result=divi($a,$b);break;
      case '%':$result=mod($a,$b);break;
      default:$error="Operator salah";
    }
  }catch(Exception $e){$error=$e->getMessage();}
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>FUNCTION Kalkulator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="card">
  <h1>Kalkulator FUNCTION</h1>
  <form method="post" class="calc">
    <input class="input" type="number" step="any" name="a" placeholder="Angka 1">
    <select name="op" class="input">
      <option>+</option><option>-</option><option>*</option><option>/</option><option>%</option>
    </select>
    <input class="input" type="number" step="any" name="b" placeholder="Angka 2">
    <button class="btn">Hitung</button>
  </form>
  <?php if($error): ?><div class="result"><?php echo $error; ?></div>
  <?php elseif($result!==null): ?><div class="result">Hasil: <?php echo $result; ?></div><?php endif; ?>
  <a href="index.php">Kembali</a>
</div>
</body>
</html>
