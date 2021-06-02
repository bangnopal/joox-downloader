<?php
  set_time_limit(0);
  ignore_user_abort(1);
  if(!$_GET['id']||!is_numeric($_GET['id'])){
    header('location: index.php');
    exit;
  }
  $ch = curl_init('http://api.joox.com/web-fcgi-bin/web_get_albuminfo?albumid='.trim($_GET['id']).'&lang=id&country=id&from_type=null&channel_id=null&_='.time());
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.109 Safari/537.36');
  $json = curl_exec($ch);
  curl_close($ch);
  $json = json_decode($json);
  if(!$json->albuminfo){
    header('location: index.php');
    exit;
  }
  $name = base64_decode($json->albuminfo->creator->name);
?>
<?php
include ("__parts/header.php");
?>
<?php
include ("__parts/navbar.php");
?>
      <div class="container">
         <div class="panel panel-info" >
            <div class="panel-heading">
               <div class="panel-title"><?=$name?> - DunludLagu Gratis</div>
            </div>
            <div class="panel-body">
               <div class="text-center">
                  <img class="img-circle" height="128" width="128" src="<?=$json->albuminfo->picUrl?>">
                  <h2><?=$name?></h2>
                  <p><small><i>Waktu rilis: <?=base64_decode($json->albuminfo->date)?></i></small></p>
               </div>
               <hr>
               <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Song Name</th>
                           <th>Artis</th>
                           <th>Album</th>
                           <th>Playtime</th>
                        </tr>
                     </thead>
                     <tbody>
                        <? 
                           $r = 0;$rf = count($json->albuminfo->songlist);
                           for($i=0;$i<$rf;$i++):
                           	$r++;
                           	print '<tr><td>'.$r.'</td><td><a href="song.php?id='.base64_encode($json->albuminfo->songlist[$i]->songid).'">'.base64_decode($json->albuminfo->songlist[$i]->songname).'</a></td><td><a href="singer.php?id='.$json->albuminfo->songlist[$i]->singerid.'">'.base64_decode($json->albuminfo->songlist[$i]->singername).'</a></td><td><a href="album.php?id='.$json->albuminfo->songlist[$i]->albumid.'">'.base64_decode($json->albuminfo->songlist[$i]->albumname).'</a></td><td><b>'.gmdate('i:s', $json->albuminfo->songlist[$i]->playtime).'</b></td></tr>';
                           endfor; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery-ui.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
   </body>
</html>