<footer class="footer px-4 ">
    <!-- feature to top -->
    <div class="footer__to-top" onclick="window.scrollTo(0, 0); "> <i class="fa fa-chevron-up"></i> Lên đầu trang <i class="fa fa-chevron-up"></i> </div>

    <!-- Detail Company -->
    <div class="container px-0 footer__container">
        <div class="row footer__container__detail my-4 ">
            <!-- Casio Anh Khuê -->
            <div class="col-md-3 col-12 mt-5 footer__container__item">
                <h3 class="title">ANH KHUÊ SÀI GÒN </h3>

                <ul class="list-detail">
                    <li>
                        <i class="fa fa-map-marker"> </i>
                        Số 20 đường 3 tháng 2, P.12, Quận 10
                        Tư vấn mua hàng (8:00 - 17:00)
                    </li>
                    <li>
                        <i class="fa fa fa-phone"> </i>
                        <a href="tel:0934003403">0934 003 403</a>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <a href="tel:0916121719">0916 12 17 19</a>
                    </li>
                    <li><i class="fa fa-envelope"></i> <a
                            href="mailto:online@anhkhuesaigon.com.vn">online@anhkhuesaigon.com.vn</a></li>
                    <li><i class="fa fa-globe"></i> <a href="casio.anhkhue.com">casio.anhkhue.com</a></li>
                </ul>
            </div>

            <!-- Info Casio Anh Khuê -->
            <div class="col-md-3 col-12 mt-5 footer__container__item">
                <h3 class="title">THÔNG TIN</h3>

                <ul class="list-detail">
                    @foreach(\App\Models\Menu::select('title','link')->where('mid',4)->get() as $present)
                    <li>
                        <a title="Liên hệ" href="https://casio.anhkhue.com{{$present->link}}">{{$present->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Support of Casio Anh Khuê -->
            <div class="col-md-3 col-12 mt-5 footer__container__item">
                <h3 class="title">HỖ TRỢ</h3>

                <ul class="list-detail">
                    @foreach(\App\Models\Menu::select('title','link')->where('mid',5)->limit(4)->get() as $present)
                        <li>
                            <a title="Liên hệ" href="https://casio.anhkhue.com{{$present->link}}">{{$present->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Terms Casio Anh Khuê  -->
            <div class="col-md-3 col-12 mt-5 footer__container__item">
                <h3 class="title">CHÍNH SÁCH</h3>

                <ul class="list-detail">
                    @foreach(\App\Models\Menu::select('title','link')->where('mid',3)->limit(4)->get() as $present)
                        <li>
                            <a title="Liên hệ" href="https://casio.anhkhue.com{{$present->link}}">{{$present->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="footer--seperate"></div>

        <!-- Method -->
        <div class="row footer__container__method my-4">
            <!-- Mail Contact -->
            <form class="col-md-4 col-12 footer__container__item" action="#" method="post">
                <p class="footer__container__contact">
                    <input type="text" name="email" id="newsnotice_email">
                    <button class="button subscribe" name="do">Đăng ký</button>
                </p>
                <p class="mt-2">* Hãy để lại Email để nhận nhiều ưu đãi hơn</p>
            </form>

            <!-- Payment -->
            <div class="col-md-4 col-12 footer__container__item">
                <h4 class="title text-center">Thanh toán</h4>

                <img alt="" height="35" src="https://casio.anhkhue.com/uploads/payment_1.jpg"
                     style="max-width:100%; object-fit: contain" width="218">
            </div>

            <!-- Linker -->
            <div class="col-md-4 col-12 footer__container__item">
                <h4 class="title">Liên kết</h4>

                <ul class="footer__container__social">
                    <li><a id="fb" href="https://www.facebook.com/Casio.AnhKhueSaiGon/" target="_blank"
                           title="Casio Anh Khuê Sài Gòn"><i class="mdi mdi-facebook-box" aria-hidden="true"></i></a></li>
                    <li><a id="yt" href="https://www.youtube.com/channel/UC9junguUoHEXK7fNcOo0ivQ?sub_confirmation=1"
                           target="_blank" title="Casio Anh Khuê Sài Gòn"><i class="mdi mdi-youtube-play"
                                                                             aria-hidden="true"></i></a></li>
                    <li><a id="ins" href="https://www.instagram.com/gshock_babyg.vietnam/" target="_blank"
                           title="Casio Anh Khuê Sài Gòn"><i class="mdi mdi-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- Method -->

        <div class="footer--seperate"></div>

        <!-- Author -->
        <div class="row footer__container__author my-4">
            <div class="col-md-4 col-12 authorization">
                <a class="logo" href="/"><img src="https://casio.anhkhue.com/uploads/anhkhue-logo-mau.png" width="500"
                                              height="129" alt=""></a>
                <a class="trade-logo" target="_blank" href="http://online.gov.vn/Home/WebDetails/67533"><img
                        src="http://online.gov.vn/Content/EndUser/LogoCCDVSaleNoti/logoSaleNoti.png"
                        class="primary-image lazy lazy-load b-loaded b-loaded b-loaded b-loaded b-loaded b-loaded b-loaded"
                        alt="Logo Đăng ký thông tin anh Khuê bộ Công Thương"></a>
            </div>

            <div class="col-md-4 col-12 description">
                © 2019 Anh Khuê. Công ty Cổ Phần Anh Khuê Sài Gòn.<br>Trụ sở chính: 104 Hùng Vương, Phường 2, TP.Tân An,
                Tỉnh Long An<br>GCNĐKKD: 1101780735 do Sở KH&amp;ĐT tỉnh Long An cấp ngày 28/10/2016<br>CN : Số 20 đường
                3 tháng 2, Phường 12, Quận 10, HCM<br>Email:&nbsp;online@anhkhuesaigon.com.vn
            </div>

            <div class="col-md-4 col-12 casio-author">
                <img src="https://casio.anhkhue.com/uploads/vietnam2-1.png" width="100%" height="150px" alt="">
            </div>
        </div>

    </div>
    <div class="footer--seperate"></div>
    <div class="footer__container__copyright py-2">
        <p style="text-align:center">© Bản quyền thuộc về Anh Khuê Sài Gòn - Developed by <a
                href="http://anflash.com/">ANFLASH TECHNOLOGY</a></p>
    </div>
</footer>