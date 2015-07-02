@extends('template.frontend')

@section('content')

    <div class="col-md-12">

        <h2 class="text-center">{{ $event->name  }}</h2>
        <hr/>
        @if( !Auth::check() )

            <div class="alert alert-info" role="alert">
                Bạn hãy đăng nhập để tham gia dự đoán. <a href="{{ route('facebookLogin')  }}"> Click vào đây để đăng nhập thông qua facebook </a>
            </div>

        @endif
        


    </div>

    <div class="col-md-6 col-md-offset-3">

        <form action="{{ route('eventJoin', [$event->slug])  }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <ul class="">
                @if( count($formData) )

                    <table class="table table-responsive table-hover table-condensed">
                    <thead>
                    <tr>
                        <th><span class="label label-info">Vòng</span></th>
                        <th><span class="label label-primary">Team 1</span></th>
                        <th>Thắng</th>
                        <th>Hoà</th>
                        <th>Thua</th>
                        <th><span class="label label-danger">Team 2</span></th>
                    </tr>
                    </thead>

                    <?php $count = 0; ?>
                    <?php $num = 0; ?>
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
                            <td> <input type="radio" name="m{{$num}}" value="1" @if( isset($userData['m'.$num]) && $userData['m'.$num] == 1  ) checked="checked" @endif></td>
                            <td> <input type="radio" name="m{{$num}}" value="2" @if( isset($userData['m'.$num]) && $userData['m'.$num] == 2  ) checked="checked" @endif></td>
                            <td> <input type="radio" name="m{{$num}}" value="3" @if( isset($userData['m'.$num]) && $userData['m'.$num] == 3  ) checked="checked" @endif></td>
                            <td><span class="label label-danger">{{ $item->team_2  }}</span></td>
                        </tr>

                    @endforeach

                    <tfoot>
                    <tr>
                        <td align="center" colspan="6">
                            @if( !Auth::check() )
                                <div class="alert alert-info" role="alert">
                                    Bạn hãy đăng nhập để tham gia dự đoán. <a href="{{ route('facebookLogin')  }}"> Click vào đây để đăng nhập thông qua facebook </a>
                                </div>
                            @elseif( !$check )
                                <div class="alert alert-info" role="alert">
                                    Sự kiện này đã hết thời gian hoạt động.
                                </div>
                            @else
                                <button type="submit" class="btn btn-default">Dự Đoán</button>
                            @endif
                        </td>
                    </tr>
                    </tfoot>

                    </table>

                @endif
            </ul>
        </form>

    </div>


@endsection