<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/fontawesome.min.css.css') }}" />
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css">
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>

<style>
    .service_search_btn {
        border: none;
        height: 26px;
        padding-top: 1px !important;
    }

    .p_btn_container {
        width: 80%;
        margin-left: 5%;

    }

    .paypal_payment_img {
        width: 90%;
    }

    .cart_preview_img {
        width: 100px;
        height: 100px;
    }


    .sticky_cart {
        position: fixed;
        right: 0;
        z-index: 999;
        top: 50%;
        width: 80px;
        background: #ff4d03;
        text-align: center;
        height: 90px;
    }


    .sticky_cart_icon {
        color: #fff;
        font-size: 22px;
        margin-top: 5px;
    }

    .quick_cart_btn {
        cursor: pointer;
        font-size: 24px;
    }


    @media only screen and (max-width:768px) {

        .p_btn_container {
            width: 70%;
            margin-left: 22%;
        }


        .sticky_cart {
            right: 40px;
            top: 50%;
            width: 70px;
            height: 90px;
        }

    }

</style>
