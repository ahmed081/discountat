<table class="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th class="wd-15p">Name</th>
            <th class="wd-20p">Status</th>
            <th class="wd-20p">Web Site</th>
            <th class="wd-20p">Address</th>
            <th class="wd-15p">category</th>
            <th class="wd-10p">Ads count</th>
            <th class="wd-10p"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['brands'] as $brand)
            <tr>
                <td>{{$brand->name}}</td>
                @if ($brand->availability === 0)
                    <td><span class="badge badge-primary" style="background: red"><b>deleted</b></span></td>

                @else
                    <td><span class="badge badge-primary" style="background: #3cda08"><b>active</b></span></td>
                @endif
                <td>{{$brand->web_site}}</td>
                <td>{{$brand->address}}</td>
                
                <td><a href="/categories/1">{{$brand->category_name}}</a></td>
                <td>{{$brand->ads_count}}</td>
                <td>
                    <div class="btn-list">
                        @if ($brand->availability === 1)
                            <a href="#" class="btn btn-danger" style="background: red;border-color: red " data-toggle="modal" data-target="{{"#deleteBrand".$brand->id}}" ><i data-toggle="tooltip" title="" data-original-title="delete" class="zmdi zmdi-delete"></i></a>
                        @endif
                        <a data-toggle="modal" data-target="{{"#updatebrand".$brand->id}}" href="#" class="btn btn-primary" style="background: #1FC0D8;border-color: #1FC0D8 "><i data-toggle="tooltip" title="" data-original-title="show" class="zmdi zmdi-code-setting"></i></a>
                        
                    </div>
                </td>
            </tr>
        
        @endforeach
        
        
        
        
    </tbody>
</table>