<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<?php
     require_once"header.php";
     require_once"sidebar.php";
     
     $iceriksor=$baglanti->prepare("SELECT * FROM icerik where kategori_id=:kategori_id");
     $iceriksor->execute(array(
        'kategori_id'=>$_GET['katid']
     ));

// order by galeri_sira ASC

?>

<div class="content-wrapper">
 <section class="content">
   <div class="container-fluid">
     <div class="row">  
             
   <?php

if(@$_GET['durum'] == 'yes'){?>
<script>alert("İşlem Başarılı");</script>
<?php }

else if(@$_GET['durum'] == 'no'){?>
<script>alert("İşlem Başarısız");</script>
<?php }


?>   
       <div class="col-12">
         <div class="card">
           <div class="card-header">
             <h3 class="card-title">Kategori</h3>

             <a href="icerik-ekle.php?katid=<?php echo $_GET['katid'] ?>">
<button type="submit" style="float:right;" class="btn btn-info">Yeni İçerik Ekle</button>
             </a>

             <!--Arama Kutusu Kodları-->
              <!-- <div class="card-tools">
               <div class="input-group input-group-sm" style="width: 150px;">
                 <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                 <div class="input-group-append">
                   <button type="submit" class="btn btn-default">
                     <i class="fas fa-search"></i>
                   </button>
                 </div>
               </div>
             </div>
           </div> -->

           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
          
           <div class="card-body table-responsive p-0">
             <table class="table table-hover text-nowrap">
               <thead>
                 <tr>
                   <th>Kategori Resim</th>
                   <th>Kategori Başlık</th>
                   <th>Kategori Sıra</th>         
                   <th>Düzenle</th>
                   <th>Sil</th>
                 </tr>
               </thead>
               <tbody>

                 <?php 
                 while($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {?>
                 <tr>
                   <td><img style="width: 100px;" src="/admin/resimler/icerik/<?php echo $icerikcek['icerik_resim'] ?>"></td>
                   <td><?php echo $icerikcek['icerik_baslik'] ?></td>
                   <td><?php echo $icerikcek['icerik_sira'] ?></td>
                   <td><a href="icerik-duzenle.php?id=<?php echo $icerikcek['icerik_id'] ?>"><button type="submit" class="btn btn-success">Düzenle</button></a></td>
                   <td>

                   <form action="islem.php" method="post">
                          <button  name="iceriksil" type="submit" class="btn btn-danger">Sil</button>
                          <input name="id" value="<?php echo $icerikcek['icerik_id'] ?>" type="hidden">
                           <input name="eskiresim" value="<?php echo $icerikcek['icerik_resim'] ?>" type="hidden">

                                  <input name="katid" value="<?php echo $icerikcek['kategori_id'] ?>" type="hidden">
                           </form>
     
     </form>

                   </td>
                   </tr>
                   <?php } ?>


               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
 </section>
</div>


<?php
     require_once"footer.php";
?>