@extends('template.frontend')

@section('content')
<div class="col-md-12">
    
    @if( !empty($results) )
        
        <table class="table table-striped table-hover">
        <tr>
            <th>Hạng</th>
            <th>Tên</th>
            <th>Điểm</th>
            <th>Thời gian dự đoán</td>
            <th>Chi tiết</th>
        </tr>
        <?php $rank = 0 ?>
        @foreach($results as $item)
        <?php 
            $rank++; 
            $class = "";

            if( $rank >= 1 && $rank <= 5 ){
                $class = "label label-danger";
            }

            if( $rank >= 6 && $rank <= 10 ){
                $class = "label label-warning";
            }
        ?>
        <tr>

            <td><span class="{{$class}}">{{ $rank }}</span></td>
            <td>{{ $item->name }}</td>
            <td><span class="badge">{{ $item->score }}</span></td>
            <td>{{ date('H:i:s d-m-Y',strtotime($item->updated_at) ) }}</td>
            <th><a target="_blank" href="{{ URL::route('resultDetailPage', [$event->slug,$item->user_id]) }}"><span class="glyphicon glyphicon-new-window"></span></a></th>
        </tr>

        @endforeach
        </table>

    @endif

</div>
@endsection





