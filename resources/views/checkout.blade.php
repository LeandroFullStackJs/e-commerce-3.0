@extends('layouts.master')
@section('content')
  <head>
  <script src="https://js.stripe.com/v3/"></script>
</head>
  <link rel="stylesheet" href="{{ asset('css/checkout.css') }}" />
<body>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form action="/checkout" method="POST" id="payment-form">
                          @csrf
                            <div class="row">

                            </div>
                            <div class="mb-3">
                                <label for="name">Name *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                @if (auth()->user())
                                  <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                @else
                                  <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                @endif
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="City">City </label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Province">Province</label>
                                <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Postal">Postal Code* </label>
                                <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Phone">Phone*</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                          </div>

                            {{-- <hr class="mb-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div> --}}
                            <hr class="mb-4">
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                    <label for="name_on_card">Name on card</label>
                                    <input type="text" class="form-control"  id="name_on_card" name="name_on_card" value=""> <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback"> Name on card is required </div>
                                </div>
                                <div class="mb-3">
                                  <label for="card-element">
                                    Credit or debit card
                                  </label>
                                  <div id="card-element">

                                  <!-- a Stripe Element will be inserted here. -->

                                  </div>
                                  <!-- Used to display form errors -->
                                  <div id="card-errors" role="alert"></div>
                                </div>

                            <!-- Used to display form errors -->
                             <div id="card-errors" role="alert"></div>
                            <div class="row">
                                {{-- <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback"> Expiration date required </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback"> Security code required </div>
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/1.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/2.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/3.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/5.png')}}" alt=""></li>
                                            <li><img class="img-fluid" src="{{asset('front_assets/images/payment-icon/7.png')}}" alt=""></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <hr class="mb-1">


                          {{-- </form> --}}
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="shipping-method-box">
                                <div class="title-left">
                                    <h3>Shipping Method</h3>
                                </div>
                                <div class="mb-4">
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption1" name="shipping-option" class="custom-control-input" checked="checked" type="radio">
                                        <label class="custom-control-label" for="shippingOption1">Standard Delivery</label> <span class="float-right font-weight-bold">FREE</span> </div>
                                    <div class="ml-4 mb-2 small">(3-7 business days)</div>
                                    {{-- <div class="custom-control custom-radio">
                                        <input id="shippingOption2" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption2">Express Delivery</label> <span class="float-right font-weight-bold">$10.00</span> </div>
                                    <div class="ml-4 mb-2 small">(2-4 business days)</div>
                                    <div class="custom-control custom-radio">
                                        <input id="shippingOption3" name="shipping-option" class="custom-control-input" type="radio">
                                        <label class="custom-control-label" for="shippingOption3">Next Business day</label> <span class="float-right font-weight-bold">$20.00</span> </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                  @foreach ($Products as $Product)
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="products/{{$Product->id}}"> {{$Product->name}}</a>
                                            <div class="small text-muted">Price: {{$Product->price}} <span class="mx-2">|</span> Qty: {{$Product->pivot->quantity}} <span class="mx-2">|</span> Subtotal: {{$Product->price * $Product->pivot->quantity }}</div>
                                        </div>

                                        </div>
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub total</h4>
                                    <div class="ml-auto font-weight-bold"> $ {{$totalPrice}} </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5">  {{$totalPrice}} </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box">
                          {{-- <form action="/checkout" method="POST">
                          @csrf
                          <button type="submit" class="ml-auto btn hvr-hover">Place Order</button>
                          </form> --}}
                          <button type="submit" id="complete-order" class="ml-auto btn hvr-hover">Complete Order</button>
                         </div>
                         </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-01.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-02.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-03.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-04.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-06.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-07.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-08.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-09.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="{{asset('front_assets/images/instagram-img-05.jpg')}}" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->
</body>

<script>
  (function(){
    // Create a Stripe client.
var stripe = Stripe('pk_test_BNHyGrAPwwPLCrhToInyYTsC00HZ7lJLm3');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
base: {
  color: '#32325d',
  fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
  fontSmoothing: 'antialiased',
  fontSize: '16px',
  '::placeholder': {
    color: '#aab7c4'
  }
},
invalid: {
  color: '#fa755a',
  iconColor: '#fa755a'
}
};

// Create an instance of the card Element.
var card = elements.create('card', {
  style: style,
  hidePostalCode: true
});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
var displayError = document.getElementById('card-errors');
if (event.error) {
  displayError.textContent = event.error.message;
} else {
  displayError.textContent = '';
}
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
event.preventDefault();
// Disable the submit button to prevent repeated clicks
             document.getElementById('complete-order').disabled = true;
             var options = {
               name: document.getElementById('name_on_card').value,
               address_line1: document.getElementById('address').value,
               address_city: document.getElementById('city').value,
               address_state: document.getElementById('province').value,
               address_zip: document.getElementById('postalcode').value
             }

stripe.createToken(card, options).then(function(result) {
  if (result.error) {
    // Inform the user if there was an error.
    var errorElement = document.getElementById('card-errors');
    errorElement.textContent = result.error.message;
    // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
  } else {
    // Send the token to your server.
    stripeTokenHandler(result.token);
  }
});
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
// Insert the token ID into the form so it gets submitted to the server
var form = document.getElementById('payment-form');
var hiddenInput = document.createElement('input');
hiddenInput.setAttribute('type', 'hidden');
hiddenInput.setAttribute('name', 'stripeToken');
hiddenInput.setAttribute('value', token.id);
form.appendChild(hiddenInput);

// Submit the form
 form.submit();
}
  })();

</script>

@endsection
