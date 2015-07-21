@extends('template.frontend')

@section('content')
<div class="col-md-12">
    
    <h3>Chi tiết dự đoán <span class="label label-info">{{ $user->name }}</span> - {{ $event->name }}</h2>
    <table class="table table-responsive table-hover table-condensed">
        <thead>
            <tr>
                <th><span class="label label-info">Vòng</span></th>
                <th><span class="label label-primary">Team 1</span></th>
                <th>Kết Quả</th>
                <th>Dự Đoán</th>
                <th><span class="label label-danger">Team 2</span></th>
                <th>Điểm - Tham Gia</th>
                <th>Điểm - Dự Đoán</th>
                <th>Điểm - Tổng</th>
            </tr>
        </thead>

        <?php $count = 0; ?>
        <?php $num = 0; ?>
        <?php $ss = 0; ?>
        @foreach( $formData as $item )

            <?php
                
                $num++;
                if( $item->round != $count ){
                    $count++;
                    $rs = $count;
                }else{
                    $rs = "";
                }
            ?>

            <tr>
                <th><span class="label label-info">{{$rs}}</span></th>
                <td><span class="label label-primary">{{ $item->team_1  }}</span></td>
                <td>
                    @if( $result->{'m'.$num} == 1 ) 
                        <label class="label label-success">Thắng</label>
                    @elseif( $result->{'m'.$num} == 2 )
                        <label class="label label-info">Hòa</label>
                    @else
                        <label class="label label-danger">Thua</label>
                    @endif
                </td>
                <td>
                    @if( $userResult->{'m'.$num} == 0 )
                        <label class="label label-default">Không dự đoán</label>
                    @elseif( $userResult->{'m'.$num} == 1 ) 
                        <label class="label label-success">Thắng</label>
                    @elseif( $userResult->{'m'.$num} == 2 )
                        <label class="label label-info">Hòa</label>
                    @else
                        <label class="label label-danger">Thua</label>
                    @endif
                </td>
                <td><span class="label label-danger">{{ $item->team_2  }}</span></td>
                <td>
                    <?php
                        if( $userResult->{'m'.$num} == 0 ){
                            $s1 = 0;
                        }else{
                            $s1 = 2;
                        }
                    ?>
                    {{ $s1 }}
                </td>
                <td>
                    <?php
                        if( $userResult->{'m'.$num} == 0 ){
                            $s2 = 0;
                        }else if( $userResult->{'m'.$num} == $result->{'m'.$num} ){
                            $s2 = 10;
                        }else{
                            $s2 = -1;
                        }
                    ?>
                    {{$s2}}
                </td>
                <td>
                    <?php
                        $ss += $s1 + $s2;
                    ?>
                    {{$ss}}
                </td>
            </tr>

        @endforeach

    </table>


</div>
@endsection





