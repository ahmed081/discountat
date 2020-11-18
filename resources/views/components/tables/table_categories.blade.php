<?php
    use Carbon\Carbon;
    
?>
<table class="example" class="table " style="width:100%">
    <thead>
        <tr>
            <th class="wd-15p">Name</th>
            <th class="wd-25p">Arabic Name</th>
            <th class="wd-25p">Status</th>
            <th class="wd-25p">Ads Count</th>
            <th class="wd-15p"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data["categories"] as $category)
            <tr>
                <td><a href="" data-toggle="modal" data-target={{"#showcategory".$category->id}}>{{$category->name}}</a></td>
                <td><a href="" data-toggle="modal" data-target={{"#showcategory".$category->id}}>{{$category->name_ar}}</a></td>
                @if ($category->availability === 0)
                    <td><span class="badge badge-primary" style="background: red"><b>deleted</b></span></td>

                @else
                    <td><span class="badge badge-primary" style="background: #3cda08"><b>active</b></span></td>

                @endif
                <td>{{$category->count}}</td>
                <td>
                    <div class="btn-list">
                        @if ($category->availability === 1)
                            <a href="#" class="btn btn-danger" style="background: red;border-color: red " data-toggle="modal" data-target="{{"#deletecategory".$category->id}}" ><i data-toggle="tooltip" title="" data-original-title="delete" class="zmdi zmdi-delete"></i></a>
                        @endif
                        <a href="#" class="btn btn-primary" style="background: #1FC0D8;border-color: #1FC0D8 " data-toggle="modal" data-target={{"#updatecategory".$category->id}}><i data-toggle="tooltip" title="" data-original-title="show" class="zmdi zmdi-code-setting"></i></a>
                        
                    </div>
                </td>
            </tr>
        @endforeach
        
        
        
        
    </tbody>
</table>