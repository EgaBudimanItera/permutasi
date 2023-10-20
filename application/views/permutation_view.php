<!DOCTYPE html>
<html>
<head>
    <title>Permutations</title>
</head>
<body>
    <form action="<?php echo site_url('kombinatorik/index');?>" 
    method="get">
      <h3>Permutasi P(n,r)</h3>
      <div>
        Nilai n : <input type="text" name="nilai_n" id="">
      </div>
      <br>
      <div>
        Nilai r : <input type="text" name="nilai_r" id="">
      </div>
      <br>
      <div>
        <button type="submit">Lakukan Permutasi</button>
      </div>
    </form>
    <h1><?=$permutasi_label?></h1>
     
        <?php $hasil="";foreach ($permutationsdetail as $permutation): ?>
            
        <?php $hasil.= "(".$permutation."),"?>
        <?php endforeach; ?>
        <div style="width:700px"><?=$hasil;?></div>
</body>
</html>