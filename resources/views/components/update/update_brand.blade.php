<div class="modal fade" id="{{"updatebrand".$brand->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Brand</h5>
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/brands/update/{{$brand->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            @if ($brand->availability === 1)
                                <div class="form-label">the brand is currently active</div>
                            @else
                                <div class="form-label">the brand is currently desactive</div>
                            
                            @endif
                            <label class="custom-switch">
                                @if ($brand->availability === 1)
                                    <input type="checkbox" checked name="availability" class="custom-switch-input">
                               
                                @else
                                    <input type="checkbox" name="availability" class="custom-switch-input">
                               
                                @endif
                                <span class="custom-switch-indicator"></span>
                                @if ($brand->availability === 1)
                                    <span class="custom-switch-description">Desactivate</span>                                
                                @else
                                    <span class="custom-switch-description">active</span>                                
                                @endif
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="full-name" class="form-control-label">Brand</label>
                            <input type="text" value="{{$brand->name}}" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group ">
                            <label for="email"  class="form-control-label">Category</label>
                            <select style="border-radius: 15px;" class="form-control select2 custom-select" data-placeholder="Choose one" name='category_id'>
                                <option label="Categories">
                                </option>
                                @foreach ($categories as $category)
                                    @if ($brand->category_id === $category->id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="email"  class="form-control-label">Mobile</label>
                            <input type="text" value="{{$brand->mobile}}" name="mobile" class="form-control" id="mobile">
                        </div>
                        <div class="form-group">
                            <label for="web-site"  class="form-control-label">Web Site</label>
                            <input type="text" value="{{$brand->web_site}}" name="web_site" class="form-control" id="web-site">
                        </div>
                        <div class="form-group">
                            <label for="address"  class="form-control-label">Address</label>
                            <textarea type="text" value="{{$brand->address}}" name="address" class="form-control" id="address">{{$brand->address}}</textarea>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: white; border-radius: 17px; width: 80px; height: 40px; color:#1FC0D8;border: 1px solid ;#1FC0D8" class="btn" data-dismiss="modal">Close</button>
                    <button type="submit" style="background: #1FC0D8; border-radius: 17px; width: 180px; height: 40px; color: white;"  class="btn">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>