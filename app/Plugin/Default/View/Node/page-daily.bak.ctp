<?php 
    $bread_array = $this->App->breadarray($current_category); 
    $mien = $this->requestAction('/default/node/get_mien');


    $gmien = isset($_GET['mien']) ? $_GET['mien'] : '';
    $gcity = isset($_GET['city']) ? $_GET['city'] : '';
    $gkey = isset($_GET['key']) ? $_GET['key'] : '';

    // if($gmien != '')
    //     $city = $this->requestAction('/default/node/get_cities/' . $gmien);

    // $check  = $this->requestAction('/default/node/get_agency/?mien=' . $gmien . '&city=' . $gcity . '&key='.$gkey);
?>

<div class="menu-wrap hidden-xs">
    <div class="container-fluid menu-contain">
        <div class="wrap">
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo DOMAIN; ?>">
                        <img src="<?php echo DOMAIN . $this->App->t('logo', '', 'vi'); ?>" alt="logo" class="logo-img" />
                    </a>
                    <?php echo $this->App->adm_link('lang', 'logo', 'image'); ?>
                </div>
                <div class="col-sm-9">
                    <?php echo View::element('menu'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu hidden-xs menu-fixed hide">
    <div class="container-fluid menu-contain">
        <div class="wrap">
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo DOMAIN; ?>">
                        <img src="<?php echo DOMAIN . $this->App->t('logo3', '', 'vi'); ?>" alt="logo" class="logo-img" />
                    </a>
                    <?php echo $this->App->adm_link('lang', 'logo3', 'image'); ?>
                </div>
                <div class="col-sm-9">
                    <?php echo View::element('menu'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $bread_array = $this->App->breadarray($current_category); ?>
<div class="container-fluid bread hidden-xs">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li <?php if($i==$n) echo 'class="li-last"'; ?>><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo View::element('banner'); ?>

<div class="container-fluid page">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title">
                    Đại lý của chúng tôi
                </div>
                <div class="page-detail">
                    <div class="page-content">
                        <div class="daily-header">
                            <span>Tất cả</span>
                            <select id="mien">
                                <option value="">Tất cả</option>
                                <?php foreach($mien as $k=>$v) { ?>
                                <option value="<?php echo $k; ?>" <?php if($gmien == $k) echo 'selected'; ?>><?php echo $v; ?></option>
                                <?php } ?>
                            </select>
                            <span class="pull-right">Miền</span>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="tr-head">
                                <td><span>TT</span></td>
                                <td><span>Tên CH</span></td>
                                <td><span>Địa chỉ</span></td>
                                <td><span>Điện thoại</span></td>
                                <td><span>Bản đồ</span></td>
                            </tr>
                            <?php $i=0; $odd = 0; foreach($this->data as $v) { $i++; $odd++; ?>
                            <tr class="<?php if($odd == 2) { echo 'even'; $odd = 0; } ?>">
                                <td><span><?php echo $i; ?></span></td>
                                <td><span><?php echo $this->App->t('title', $v['Agency']); ?><?php echo $this->App->adm_link('agency', $v['Agency']['id']); ?></span></td>
                                <td><span><?php echo $this->App->t('address', $v['Agency']); ?></span></td>
                                <td><span><?php echo $v['Agency']['hotline']; ?></span></td>

                                <?php 
                                    $map = $v['Agency']['map'];
                                    $gm = explode(',', $map);
                                    $l = $gm[0];
                                    $s = $gm[1];
                                ?>

                                <td><span class="bando" l="<?php echo $l; ?>" s="<?php echo $s; ?>" name="<?php echo $this->App->t('title', $v['Agency']); ?>" address="<?php echo $this->App->t('address', $v['Agency']); ?>" tel="<?php echo $v['Agency']['hotline']; ?>">Xem bản đồ</span></td>
                            </tr>
                            <?php } ?>
                        </table>
                        </div>

                        <?php $total_pages = $this->Paginator->counter('{:pages}'); ?>
                        <?php if($total_pages > 1) { ?>
                            <div class="pagination">
                                <?php 
                                // echo Router::url($this->here);
                                $link = '';

                                // $here = Router::url($this->here);
                                // $here = explode('/', $here);
                                // $p = end($here);
                                // $link = trim($p, '/') . '/?mien=' . $gmien . '&city=' . $gcity . '&key='.$gkey;
                                // $link = trim($link, '/') . '/';

                                // if(!isset($this->params['paging'])) $this->params['paging'] = array();
                                //     $this->params['paging'] = array_merge( $this->params['paging'] , $check['paging'] );

                                    $first = $this->Paginator->first('<');
                                    $first = str_replace('default/node/index/', $link, $first);
                                    $first = str_replace('/.html', '.html', $first);

                                    $last = $this->Paginator->last('>');
                                    $last = str_replace('default/node/index/', $link, $last);
                                    $last = str_replace('/.html', '.html', $last);

                                    $pages = $this->Paginator->numbers(array('separator'=>' '));
                                    $pages = str_replace('default/node/index/', $link, $pages);
                                    $pages = str_replace('/.html', '.html', $pages);

                                    echo $first;
                                    echo $pages;
                                    echo $last;
                                ?>
                            </div>
                        <?php } ?>

                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB-dgNXvvl_r_PW-KOuFbcUQf6oTm06HWY&signed_in=true"></script>
<?php /*
<?php if(is_array($this->data) && count($this->data) > 0) { ?>

    <script type="text/javascript">
        <?php 
            $str = 'var shipper = ['; 
            $f1 = '';
            $f2 = '';
            $i=0;
            foreach($this->data as $k=>$v) {
                $i++;
                $gm = explode(',', $v['Agency']['map']);
                $l = $gm[0];
                $s = $gm[1];

                if($i==1)
                {
                    $f1 = $l;
                    $f2 = $s;
                }

                // $str .= "['".$l."', '".$s."'],";
                $str .= "[".$l.", ".$s."],";
            }
            $str = trim($str, ',');
            $str .= '];';

            echo $str;

            echo 'var f1 = ' . $f1 . ';';
            echo 'var f2 = ' . $f2 . ';';
        ?>

        var map = new google.maps.Map(document.getElementById('google-map'), {
          zoom: 12,
          center: new google.maps.LatLng(<?php echo $f1; ?>, <?php echo $f2; ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < shipper.length; i++) {  
          marker = new google.maps.Marker({
            position: new google.maps.LatLng(shipper[i][0], shipper[i][1]),
            map: map
          });

          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(shipper[i][0]);
              infowindow.open(map, marker);
            }
          })(marker, i));
        }

        function pinSymbol(color) {
            return {
                path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
                fillColor: color,
                fillOpacity: 1,
                strokeColor: '#000',
                strokeWeight: 1,
                scale: 1,
            };
        }
    </script>

<?php } else { ?>

    <script src="<?php echo DOMAIN; ?>theme/default/js/map.js"></script>
    <?php 
        $gm = explode(',', $settings['google_map']);
        $l = $gm[0];
        $s = $gm[1];
    ?>
    <script type="text/javascript">

        var myLatlng = new google.maps.LatLng(<?php echo $l; ?>, <?php echo $s; ?>);
        var label = '';
        var mapOptions = {
            zoom: 16,
            center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

        
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map
        });
        
        marker.setMap(map);
        var move_map = 0;
    </script>
*/ ?>


<script type="text/javascript">

$('.bando').click(function() {
    var l = $(this).attr('l');
    var s = $(this).attr('s');
    var name = $(this).attr('name');
    var address = $(this).attr('address');
    var phone = $(this).attr('tel');

    make_map(l, s, name, address, phone);
});

// var myOptions = { zoom: 14, center: new google.maps.LatLng(p.lat, p.lng), mapTypeId: google.maps.MapTypeId.ROADMAP };
//         if (infowindow != null) {
//             var html = "";
//             html = "<h4>" + $("#daily" + i.toString() + " > td.name").html() + "</h4>";
//             html = html + "<span id='phone'><b>Điện thoại : </b>" + $("#daily" + i.toString() + " > td.phone").html() + "</span><br>"
//             html = html + "<span id='address'><b>Địa chỉ : </b>" + address + "</span>"
//             infowindow.setContent(html);
//             infowindow.open(map, marker);
//         }
//         map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
//         var aMarker = new google.maps.Marker({ position: latlng, map: map });
//         infowindow.open(map, aMarker);
//         google.maps.event.addListener(aMarker, 'click', function() { infowindow.open(map, aMarker); });
//         google.maps.event.addListener(aMarker, 'dragstart', function() { if (infowindow != null) infowindow.close(); });


function make_map(l, s, name, address, phone)
{
    var myLatlng = new google.maps.LatLng(l, s);
    var label = '';
    var mapOptions = {
        zoom: 14,
        center: myLatlng
    };

    infowindow = new google.maps.InfoWindow();

    var html = "";
    html = "<h4>"+name+"</h4>";
    html = html + "<span id='address'>"+address+"</span><br>";
    html = html + "<span id='phone'>"+phone+"</span>";

    infowindow.setContent(html);
    infowindow.open(map, marker);

    var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
    
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });

    infowindow.open(map, marker);
    
    // marker.setMap(map);

    $('.modal-maps').modal();
}
    // var move_map = 0;
</script>



<?php // } ?>

<script>
    $('#khuvuc').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo DOMAIN; ?>default/node/get_cities_html/?gcity=<?php echo $gcity; ?>&id=" + id,
            type: 'get',
            dataType: 'html',
            success: function(data) {
                $('#tinhthanh').html(data);
            }
        });
    });

    $('#mien').change(function() {
        var mien = $(this).val();
        // var city = $('#tinhthanh').val();
        // var key = $('.pp_key').val();

        var link = "<?php echo DOMAIN; ?>dai-ly.html?mien=" + mien;
        document.location.href = link;
    });
</script>

<div class="modal fade modal-maps">
    <div class="modal-dialog">
        <div class="modal-close"></div>
        <div class="modal-content">
            <div class="modal-body">
                <div id="google-map"></div>
            </div>
        </div>
    </div>
</div>
