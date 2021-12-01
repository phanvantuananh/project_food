@yield('footer')
@yield('afetr-footer')
<style>
    .logo-item-rep {
        display:none;
    }
    @media screen and (max-width: 660px) {
        .logo-item {
            display: none;
        }
        .logo-item-rep {
            display: block;
        }
    }
</style>
<div class="logo-item" style="margin: 120px 0px 80px 0px ;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/1.png" alt="" style="margin: 0 auto">
            </div>
            <div class="col-md-3">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/2.png" alt="" style="margin: 0 auto">
            </div>
            <div class="col-md-3">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/3.png" alt="" style="margin: 0 auto">
            </div>
            <div class="col-md-3">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/4.png" alt="" style="margin: 0 auto">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div id="carouselExampleControls" class="carousel slide logo-item-rep" data-bs-ride="carousel" style="margin: 120px 0px 80px 0px ;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/1.png" class="d-block" alt="" width="200px" style="margin: 0 auto">
            </div>
            <div class="carousel-item">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/2.png" class="d-block" alt="" width="200px" style="margin: 0 auto">
            </div>
            <div class="carousel-item">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/3.png" class="d-block" alt="" width="200px" style="margin: 0 auto">
            </div>
            <div class="carousel-item">
                <img src="https://technext.github.io/frutika/assets/img/company-logos/4.png" class="d-block" alt="" width="200px" style="margin: 0 auto">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 mt-3">
                <div class="footer__title">
                    <h1>About us</h1>
                </div>
                <p class="mb-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id reiciendis incidunt beatae provident
                    amet.</p>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 mt-3">
                <div class="footer__title">
                    <h1>Get in Touch</h1>
                </div>
                <p class="mb-3">Mạo Khê - Đông Triều - Quảng Ninh</p>
                <p class="mb-3">tappta10@gmail.com</p>
                <p class="mb-3">+00 111 222 3333</p>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 mt-3">
                <div class="footer__title">
                    <h1>Pages</h1>
                </div>
                <p class="mb-3"><span style="color:#F28123;margin-right: 10px" ><i class="fa fa-chevron-right" aria-hidden="true"></i></span>Home
                </p>
                <p class="mb-3"><span style="color:#F28123;margin-right: 10px"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>Shop
                </p>
                <p class="mb-3"><span style="color:#F28123;margin-right: 10px"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>Contact
                    Us</p>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 mt-3">
                <div class="footer__title">
                    <h1>Subscribe</h1>
                </div>
                <p class="mb-3">Subscribe to our mailing list to get the latest updates.</p>
                <form action="{{route('createContactUs')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{Auth::id()}}" name="user_id" placeholder="Enter Content">
                    <input type="text" value="" placeholder="Enter Content" name="content">
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
