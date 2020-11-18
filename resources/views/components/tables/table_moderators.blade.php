<?php
    use Carbon\Carbon;
    
?>
<table class="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th class="wd-15p">Full name</th>
            <th class="wd-25p">E-mail</th>
            <th class="wd-25p">Status</th>
            <th class="wd-20p">country</th>
            <th class="wd-15p">Menbre Since</th>
            <th class="wd-10p"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['moderators'] as $moderator)
        <tr>
        <td><a href="/moderators/{{$moderator->id}}">{{$moderator->full_name}}</a></td>
            <td>{{$moderator->email}}</td>
            @if ($moderator->availability === 1 )
            <td><span class="badge badge-success"><b>enable</b></span></td>
            @else
                <td><span class="badge badge-danger"><b>Desable</b></span></td>
            @endif
            <td>Kuwait</td>
            <td>{{(new Carbon($moderator->created_at))->toDateString()}}</td>
            <td>
                <div class="btn-list">
                    @if ($moderator->availability === 1)
                        <a href="#" class="btn btn-danger" style="background: red;border-color: red " data-toggle="modal" data-target="{{"#deletemoderator".$moderator->id}}" ><i data-toggle="tooltip" title="" data-original-title="delete" class="zmdi zmdi-delete"></i></a>
                    @endif
                    <a href="/moderators/{{$moderator->id}}" class="btn btn-primary" style="background: #1FC0D8;border-color: #1FC0D8 "><i data-toggle="tooltip" title="" data-original-title="show" class="zmdi zmdi-code-setting"></i></a>
                     
                </div>
            </td>
        </tr>
        @endforeach
        
        
    </tbody>
</table>