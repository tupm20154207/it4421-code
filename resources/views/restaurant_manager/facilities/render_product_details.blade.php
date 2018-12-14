<div class="row">
  <div class="col-md-5 col-sm-10">
    <div class="card">
      <div class="card-body">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-11">
              <img id="preview" class="mw-100" style="height: auto;" src="{{ isset($product) ? asset($product->url) : asset('images/fakeimg.png')}}" alt="Image holder">
            </div>
          </div>
          <div class="row mt-3">
            <span>Cập nhật hình ảnh: </span>
            <input type="file" name="url" accept="image/*"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-7 col-sm-10">
    <div class="card">
      <div class="card-body">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-sm-10 my-3">
              <div class="input-group">
                <div class="form-group w-100">
                  <label for="name" class="control-label">Tên sản phẩm: </label>
                  <input type="text" id="name" name="name" class="form-control"
                         value="{{ isset($product) ? $product->name : '' }}" required autofocus>
                </div>
              </div>
            </div>
            <div class="col-sm-10 my-2">
              <div class="form-group">
                <label for="category">Loại sản phẩm</label>
                <select class="form-control" id="category" name="category">
                  @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}" {{ (isset($product) && $product->category == $category ) ? 'selected' : '' }}>{{ ucfirst($category->name) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-10 my-3">
              <div class="input-group">
                <div class="form-group w-100">
                  <label for="description" class="control-label">Mô tả: </label>
                  <textarea id="description" name="description" class="form-control" rows="2"
                            required>{{ isset($product) ? $product->description : '' }}</textarea>
                </div>
              </div>
            </div>
            <div class="col-sm-10 my-3">
              <div class="input-group">
                <div class="form-group w-50">
                  <label for="price" class="control-label">Giá bán (ngàn đồng): </label>
                  <input id="price" name="price" class="form-control text-right" type="number" min="1" step="0.01"
                         value="{{ isset($product) ? $product->price : '' }}" required>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>