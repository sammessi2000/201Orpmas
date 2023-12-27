<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php } else {     ?>
                <li class="breadcrumb-item">Tuyển dụng
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <div class="page-tuyendung">
        <?php if(isset($this->data['Category']['image'])) { ?>
        <div class="page-tuyendung-banner"
            style="background-image: url('<?php echo $this->data['Category']['image']; ?>')">
            <div class="wrap-bannerdes">
                <div class="banner-des"><?php echo $this->data['Category']['seo_title']; ?></div>
            </div>
        </div>
        <?php } ?>

        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="page-title">
                            <span><?php echo $this->data['Category']['page_title']; ?></span>
                            <span><?php echo $this->App->t_a('general_text_12'); ?></span>
                        </div>
                        <div class="tuyendung-content">
                            <div class="tuyendung-title">
                                <span>Nhân Viên In Ấn (Vận Hành Máy In)</span>
                                <div class="showmore">
                                    <a href="#">
                                        Nộp đơn
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tuyendung-des">
                            <p>Mô tả công việc
                                Tìm kiếm, phát triển khách hàng trong lĩnh vực thiết kế, in ấn, gia công sau in
                                offset thông
                                qua các kênh tìm kiếm trên internet và các mối quan hệ xã hội.
                                • Tìm hiểu nhu cầu của khách hàng; tư vấn, giới thiệu đến khách hàng các sản
                                phẩm phù hợp
                                của công ty.
                                • Gửi báo giá, lên đơn đặt hàng theo yêu cầu của khách hàng.
                                • Phản hồi kịp thời các thắc mắc của khách hàng, đưa ra giải pháp tốt nhất cho
                                khách hàng.
                                • Phối hợp với các bộ phận liên quan theo dõi, đốc thúc thực hiện đơn hàng, xuất
                                hóa đơn,
                                theo dõi công nợ.
                                • Chăm sóc khách hàng cũ.
                                • Lập kế hoạch kinh doanh hàng tuần, hàng tháng. Cuối mỗi tuần, tập hợp báo cáo
                                công việc
                                gửi GĐ kinh doanh.
                                Yêu cầu ứng viên
                                • Có ít nhất 1 năm kinh nghiệm khai thác kinh doanh (ưu tiên người có kinh
                                nghiệm khai thác
                                dịch vụ in ấn).
                                • Năng động, khả năng tìm tòi trong công việc, luôn mong muốn phát triển bản
                                thân trong môi
                                trường năng động.
                                • Chịu được áp lực về chỉ tiêu, doanh số.
                                • Khéo léo trong giao tiếp, đề cao tính kiên trì trong công việc.
                                • Có mong muốn gắn bó lâu dài. - Công ty cũng tuyển cả các ứng viên mới ra
                                trường, nhanh
                                nhẹn, hoạt bát, có tâm huyết, yêu thích công việc kinh doanh để đào tạo
                                Quyền lợi được hưởng
                                - Lương cứng tối thiểu là 8 triệu + hoa hồng. Tổng thu nhập có thể từ 30 triệu
                                đến 40 triệu
                                - Chế độ lương hấp dẫn theo đúng năng lực thực tế. Công ty luôn chào đón người
                                tài và muốn
                                gắn bó lâu dài.
                                - Phụ cấp ăn trưa.
                                - Các phúc lợi khác: tham quan, nghỉ mát hàng năm...và các chế độ khác theo quy
                                định của nhà
                                nước</p>

                        </div>
                        <div class="showmore">
                            <a href="#">
                                Nộp đơn
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 scroll-box">
                        <div class="tuyendung-box active">
                            <span class="box-tuyendung-title">
                                Nhân Viên In Ấn (Vận Hành Máy In)
                            </span>
                            <div class="box-tuyendung-info">
                                <span class="tuyendung-location">
                                    Hà Nội
                                </span>
                                <span class="tuyendung-time">
                                    22 ngày trước
                                </span>
                                <span class="tuyendung-salary">
                                    18 Tr - 20 Tr / một tháng
                                </span>
                                <span class="tuyendung-type">
                                    Toàn thời gian
                                </span>
                            </div>
                        </div>
                        <div class="tuyendung-box">
                            <span class="box-tuyendung-title">
                                Nhân Viên In Ấn (Vận Hành Máy In)
                            </span>
                            <div class="box-tuyendung-info">
                                <span class="tuyendung-location">
                                    Hà Nội
                                </span>
                                <span class="tuyendung-time">
                                    22 ngày trước
                                </span>
                                <span class="tuyendung-salary">
                                    18 Tr - 20 Tr / một tháng
                                </span>
                                <span class="tuyendung-type">
                                    Toàn thời gian
                                </span>
                            </div>
                        </div>
                        <div class="tuyendung-box">
                            <span class="box-tuyendung-title">
                                Nhân Viên In Ấn (Vận Hành Máy In)
                            </span>
                            <div class="box-tuyendung-info">
                                <span class="tuyendung-location">
                                    Hà Nội
                                </span>
                                <span class="tuyendung-time">
                                    22 ngày trước
                                </span>
                                <span class="tuyendung-salary">
                                    18 Tr - 20 Tr / một tháng
                                </span>
                                <span class="tuyendung-type">
                                    Toàn thời gian
                                </span>
                            </div>
                        </div>
                        <div class="tuyendung-box">
                            <span class="box-tuyendung-title">
                                Nhân Viên In Ấn (Vận Hành Máy In)
                            </span>
                            <div class="box-tuyendung-info">
                                <span class="tuyendung-location">
                                    Hà Nội
                                </span>
                                <span class="tuyendung-time">
                                    22 ngày trước
                                </span>
                                <span class="tuyendung-salary">
                                    18 Tr - 20 Tr / một tháng
                                </span>
                                <span class="tuyendung-type">
                                    Toàn thời gian
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>