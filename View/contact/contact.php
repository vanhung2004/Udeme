<main class="bg_gray">

    <div class="container margin_60">
        <div class="main_title">
            <h2>Liên hệ </h2>
            <p>Giải đáp mọi thắc mắc của bạn nhanh chóng dễ dàng thân thiện</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-support"></i>
                    <h2> Trung tâm hỗ trợ</h2>
                    <a href="#0">+1900 9009</a> - <a href="#0">helpUnique@gmail.com</a>
                    <small>Thứ Hai đến Thứ Sáu 9am-6pm, Thứ Bảy 9am-2pm</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-map-alt"></i>
                    <h2> Showroom</h2>
                    <div>Mỹ Đình , Hà Nội - Việt Nam</div>
                    <small>Thứ Hai đến Thứ Sáu 9am-6pm, Thứ Bảy 9am-2pm</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-package"></i>
                    <h2> Đơn đặt hàng</h2>
                    <a href="#0">+1900 9009</a> - <a href="#0">orderUnique@gmail.com</a>
                    <small>Thứ Hai đến Thứ Sáu 9am-6pm, Thứ Bảy 9am-2pm</small>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <div class="bg_white">
        <div class="container margin_60_35">
            <h4 class="pb-3">Gửi cho chúng tôi một dòng</h4>
            <div class="row">
                <div class="col-lg-4 col-md-6 add_bottom_25">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Họ tên" id="fullName" name="fullName">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="height: 150px;" placeholder="Nội dung" id="message"
                            name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="Gửi" onclick="submitForm()">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 add_bottom_25">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14896.112114794596!2d105.76454397879301!3d21.031564475948066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454bab8c5e73b%3A0x15f3308da6ba66c4!2zTeG7uSDEkMOsbmggMiwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1669017147016!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_white -->
    <script>
        function submitForm() {
            var fullName = document.getElementById("fullName").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;

            // Gửi thông tin đến server bằng AJAX
            fetch('process_contact_form.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    fullName,
                    email,
                    message
                }),
            })
                .then(response => response.json())
                .then(data => {
                    alert("Chúng tôi đã nhận được tin nhắn từ bạn. Chúng tôi sẽ phản hồi lại sớm nhất có thể.");
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }
    </script>
</main>