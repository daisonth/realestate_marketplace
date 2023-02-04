<?php include("header.php"); ?>
<div class="cart-table-area section-padding-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="checkout_details_area mt-50 clearfix">

          <div class="cart-title">
            <h2>List Property For Sale</h2>
          </div>

          <form action="#" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="first_name" value="" placeholder="Title" required>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-select w-100" aria-label="Default select example">
                  <option selected>Property Type</option>
                  <option value="1">House</option>
                  <option value="2">Villas</option>
                  <option value="3">Plots</option>
                  <option value="4">Appartments</option>
                  <option value="5">Land</option>
                  <option value="6">Flat</option>
                </select>
              </div>
              <div class="col-12 mb-3">
                <input type="textbox" class="form-control" id="Discription" placeholder="Discription" value="">
              </div>
              <div class="col-12 mb-3">
                <input type="text" class="form-control" id="street_address" placeholder="Address" value="">
              </div>
              <div class="col-12 mb-3">
                <input type="text" class="form-control" id="city" placeholder="Town" value="">
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" id="zipCode" placeholder="Pin Code" value="">
              </div>
              <div class="col-md-6 mb-3">
                <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
              </div>
              <div class="col-md-6 mb-15">
                <input type="submit" class="btn amado-btn mb-15" name="list" value="List">
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<?php include("footer.php"); ?>
