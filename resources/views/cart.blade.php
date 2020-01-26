@include('layouts.header')
@include('layouts.navbarDesktop')
@include('layouts.navbarMobile')
@if(\Auth::check())
<div id="cart">
  <div class="row" style="margin:0;">
    <div class="col-md-12" style="padding:0;">
      <div class="cart_banner">
        <div class="row" style="margin:0;">
          <div class="col-md-12 text-center">
            <h2>Cart</h2>
            <div class="line"></div>
          </div>
        </div>
      </div>
      <div class="cart_container text-center">
        <form class="" action="" method="post">
          <div class="cart_item">
            <div class="row" style="margin:0;">
              <div class="col-md-4">
                <div class="cart_pic" style="background-image:url('/img/home/block-3.png')"></div>
              </div>
              <div class="col-md-4 text-left">
                <div class="cart_name">
                  <h2>Orange</h2>
                </div>
                <div class="cart_desc">
                  <p>this is a desciption</p>
                </div>
                <div class="cart_price">
                  <p>$1,99/kg</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cart_quantity">
                  <input type="text" name="" value="150">
                  <select class="" name="">
                    <option value="gm">GM</option>
                    <option value="kg">KG</option>
                  </select>
                </div>
                <div class="cart_remove">
                  <button type="button" name="button">Remove</button>
                </div>
              </div>
            </div>
          </div>
          <div class="cart_item">
            <div class="row" style="margin:0;">
              <div class="col-md-4">
                <div class="cart_pic" style="background-image:url('/img/home/block-3.png')"></div>
              </div>
              <div class="col-md-4 text-left">
                <div class="cart_name">
                  <h2>Orange</h2>
                </div>
                <div class="cart_desc">
                  <p>this is a desciption</p>
                </div>
                <div class="cart_price">
                  <p>$1,99/kg</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cart_quantity">
                  <input type="text" name="" value="150">
                  <select class="" name="">
                    <option value="gm">GM</option>
                    <option value="kg">KG</option>
                  </select>
                </div>
                <div class="cart_remove">
                  <button type="button" name="button">Remove</button>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <button type="button" name="button" onclick="">Continue shopping</button>
            <input type="submit" name="" value="Proceed to payment">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@else
<div id="favorite">
  <div class="row" style="margin:0;">
    <div class="col-md-12" style="padding:0;">
      <div class="favorite_banner">
        <div class="row" style="margin:0;">
          <div class="col-md-12 text-center">
            <h2>Cart</h2>
            <div class="line"></div>
          </div>
        </div>
      </div>
      <div class="favorite_container text-center">
        <h3>Please login to access your cart</h3>
        <p>Go to login page</p>
        <button type="button" name="button" onclick="window.location.href='{{ url('test/register1234') }}'">Login</button>
        <p>Or create an account <a href="{{ url('test/register1234')}}">here</a> </p>
      </div>
    </div>
  </div>
</div>
@endif
@include('layouts.footer')