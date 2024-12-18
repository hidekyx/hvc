<footer id="footer" class="inverted" style="background-color: #313131;">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <div class="widget-title" style="font-size: 24px;">Social Media</div>
                        <a href="{{ $content['tiktok_link'] }}" target="_blank"><img src="{{ asset('images/tiktok-logo.png') }}" style="height: 30px;" class="me-3"></a>
                        <a href="{{ $content['whatsapp_link'] }}" target="_blank"><img src="{{ asset('images/whatsapp-logo.png') }}" style="height: 30px;" class="me-3"></a>
                        <a href="{{ $content['instagram_link'] }}" target="_blank"><img src="{{ asset('images/instagram-logo.png') }}" style="height: 30px;"></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <div class="widget-title" style="font-size: 24px;">Products</div>
                        <ul class="list">
                            <li><a href="#" style="font-size: 22px;">National</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <div class="widget-title" style="font-size: 24px;">Content Information</div>
                        <p style="font-size: 22px;">{{ $content['content_information'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content" style="background-color: #313131;">
        <div class="container">
            <div class="copyright-text text-center text-light" style="font-size: 22px;">&copy; 2024 All Right Reserved</div>
        </div>
    </div>
</footer>