<!-- Breadcrumb area Start -->
<section class="page-title-area bg-color" data-bg-color="#f4f4f4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Thanh Toán</h1>
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li class="current"><span>Thanh toán</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="page-content-inner pt--80 pt-md--60 pb--72 pb-md--60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- User Action Start -->
                    <div class="user-actions user-actions__coupon">
                        <div class="message-box mb--30">
                            <p><i class="fa fa-exclamation-circle"></i> Bạn có phiếu giảm giá không?<a
                                    class="expand-btn" href="#coupon_info"> Nhấp vào đây để nhập mã của bạn.</a></p>
                        </div>
                        <div id="coupon_info" class="user-actions__form hide-in-default">
                            <form action="#" class="form">
                                <p>Nếu bạn có mã giảm giá, vui lòng áp bên dưới.</p>
                                <div class="form__group d-sm-flex">
                                    <input type="text" name="coupon" id="coupon" class="form__input mr--20 mr-xs--0"
                                        placeholder="Coupon Code">
                                    <button type="submit" class="btn btn-size-sm">Áp dụng phiếu giảm giá</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- User Action End -->
                </div>
            </div>
            <div class="row">
                <!-- Checkout Area Start -->
                <div class="col-lg-6">
                    <div class="checkout-title mt--10">
                        <h2>Chi Tiết Thanh Toán</h2>
                    </div>
                    <div class="checkout-form">
                        <form action="#" class="form form--checkout">
                            <!-- <div class="row mb--20">
                                <div class="form__group col-md-6 mb-sm--30">
                                    <label for="billing_fname" class="form__label">Tên <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_fname" id="billing_fname" class="form__input">
                                </div>
                                <div class="form__group col-md-6">
                                    <label for="billing_lname" class="form__label">Họ <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_lname" id="billing_lname" class="form__input">
                                </div>
                            </div> -->
                            <div class="row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_name" class="form__label">Họ Tên <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_name" id="billing_name" class="form__input mb--30"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_streetAddress" class="form__label">Địa Chỉ <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_streetAddress" id="billing_streetAddress"
                                        class="form__input mb--30" placeholder="">
                                </div>
                            </div>
                            <div class="row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_phone" class="form__label">Số Diện thoại <span
                                            class="required">*</span></label>
                                    <input type="text" name="billing_phone" id="billing_phone" class="form__input">
                                </div>
                            </div>
                            <div class="row mb--20">
                                <div class="form__group col-12">
                                    <label for="billing_email" class="form__label">Email <span
                                            class="required">*</span></label>
                                    <input type="email" name="billing_email" id="billing_email" class="form__input">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 mt-md--40">
                    <div class="order-details">
                        <div class="checkout-title mt--10">
                            <h2>Đơn Hàng của bạn</h2>
                        </div>
                        <div class="table-content table-responsive mb--30">
                            <table class="table order-table order-table-2">
                                <thead>
                                    <tr>
                                        <th>sản phẩm</th>
                                        <th class="text-end">Tổng Cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Aliquam lobortis est
                                            <strong><span>&#10005;</span>1</strong>
                                        </th>
                                        <td class="text-end">$80.00</td>
                                    </tr>
                                    <tr>
                                        <th>Auctor gravida enim
                                            <strong><span>&#10005;</span>1</strong>
                                        </th>
                                        <td class="text-end">$60.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Tổng Cộng</th>
                                        <td class="text-end">$56.00</td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Phí vận chuyển</th>
                                        <td class="text-end">
                                            <span> $20.00</span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Tổng Đơn Hàng</th>
                                        <td class="text-end"><span class="order-total-ammount">$56.00</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="checkout-payment">
                            <form action="#" class="payment-form">
                                <div class="payment-group mb--10">
                                    <div class="payment-radio">
                                        <input type="radio" value="bank" name="payment-method" id="bank" checked>
                                        <label class="payment-label" for="bank">Chuyển khoản ngân hàng trực tiếp</label>
                                    </div>
                                </div>
                                <div class="payment-group mb--10">
                                    <div class="payment-radio">
                                        <input type="radio" value="cash" name="payment-method" id="cash">
                                        <label class="payment-label" for="cash">
                                            Thanh toán khi giao hàng
                                        </label>
                                    </div>
                                </div>
                                <div class="payment-group mt--20">
                                    <button type="submit" class="btn btn-size-md btn-fullwidth">Đặt Hàng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Checkout Area End -->
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->