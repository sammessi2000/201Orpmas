<?php /* $dis = true; ?>
<?php if($dis == false && $this->Session->check('admin')) : ?>
    <?php $admin_comment = $this->Session->read('admin'); ?>
    <div class="modal fade modal-replycomment" style="top: 180px; z-index: 999999;">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-body">
            <form action="<?php echo DOMAIN; ?>default/node/comment" method="post">
               <div class="comment-frm-title text-bold">
                Phản hồi
            </div>
            <textarea class="cmt-txt" name="content" rows="6" cols="12" style="width: 100%; margin-bottom: 10px;"></textarea>
            <input type="submit" name="sbm" class="cmt-btn" value="Gửi phản hồi" />
            <input type="hidden" name="fullname" class="cmt-input" value="<?php echo $admin_comment['fullname']; ?>" />
            <input type="hidden" name="status" value="1" />
            <input type="hidden" name="parent_id" class="cmt_parent_id" value="0" />
            <input type="hidden" name="node_id" class="cmt_node_id" value="0" />
        </form>
    </div>
</div>
</div>
</div>
<?php endif; ?>

<div class="modal fade modal-cart">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <p class="modal-confirm-go-to-cart">
            Bạn muốn tiếp tục mua hàng hay vào trang thanh toán?
        </p>
        <p>
          <a href="<?php echo DOMAIN; ?>/cart/list">
            <button class="btn btn-primary btn-xs">Thanh toán</button>
        </a>
        &nbsp; &nbsp;
        <a href="#" class="modal-close" data-dismiss="modal">
            <button class="btn btn-warning btn-xs">Mua tiếp</button>
        </a>
    </p>
</div>
</div>
</div>
</div>



<div class="modal fade modal-vote">
  <div class="modal-dialog">
        <div class="modal-close"></div>
    <div class="modal-content">
      <div class="modal-body">
        <img src="" class="voteimg" />
        <div class="text-center">
            <div class="heart">
                <span class="fa fa-heart"></span> <span class="modal-vote-nums">6</span>
            </div>
            <span class="vote" id=""></span>
            <a href="" class="fbsharelink" target="_blank">
                <span class="share"></span>
            </a>
        </div>
    </div>
</div>
</div>
</div>
*/ ?>




<div class="modal fade" style="top: 180px; z-index: 999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-close"></div>
                <div class="select-package">Vui lòng chọn thời gian gói <span class="package-name"></span></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="package-list">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="closebtn" style="display: block;"><span>✖</span>Đóng</div>
<div class="fullparameter" style="display: block;">
    <div class="scroll"><h3>Thông số kỹ thuật chi tiết Bộ Loa kéo Arirang MK3600</h3>
        <ul class="parameter">
                                     <li><span>Nguồn vào</span> 100-240V AC, 50-60Hz</li>
                         <li><span>Cấu tạo</span> 2 loa, 2 đường tiếng. Loa bass 40cm, loa treble kèn</li>
                         <li><span>Công suất</span> 100W (RMS)</li>
                         <li><span>Loại pin</span> Bình điện 12V DC, 12Ah</li>
                         <li><span>Thời gian sạc pin</span> từ 6 - 8 tiếng</li>
                         <li><span>Thời gian pin dùng được</span> từ 4 - 6 tiếng</li>
                         <li><span>Cổng kết nối vào</span> HDMI, AV, 6 li Thẻ nhớ, USB, nguồn điện</li>
                         <li><span>Kết nối đầu ra</span> AV ra</li>
                         <li><span>Kết nối không dây</span> Bluetooth 2.0</li>
                         <li><span>Công nghệ</span> Hát Offline với 12.000đ bài MIDI, Hát online từ kho trực tuyến, Điều khiển qua ứng dụng trên mobile, Hát karaoke trên màn tv, có 2 micro không dây UHF, sử dụng USB, thẻ nhớ phát nhạc</li>
                         <li><span>Kích thước</span> 510(D) x 430(R) x 770(C) mm</li>
                         <li><span>Trọng lượng</span> 24Kg</li>
                                 </ul>
</div>
</div>