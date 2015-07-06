@extends('template.frontend')

@section('content')

    <h2 class="text-center">Cập nhật thông tin</h2>
    <hr/>

    <div class="col-md-6 col-md-offset-3">
        @if( Auth::user()->canUpdateIdentity() )
        <div class="alert alert-info" role="alert">
            Thời gian để bạn cập nhật CMND sẽ hết hạn vào lúc {{date('d/m/Y h:i:s', strtotime(Auth::user()->date_update))}}. Bạn vui lòng cung cấp CMND chính xác để có thể nhận thưởng
        </div>
        @endif

        @include('errors.input')
        <form class="form-horizontal" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="inputName" class="col-sm-3 control-label">Tên</label>
                <div class="col-sm-9">
                    <input type="text" value="{{ Auth::user()->name  }}" name="name" class="form-control" id="inputName" placeholder="Vui lòng nhập tên">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" value="{{ Auth::user()->email  }}" name="email" class="form-control" id="inputEmail" placeholder="Vui lòng nhập email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputIdentityNumber" class="col-sm-3 control-label">Số CMND</label>
                <div class="col-sm-9">
                    @if( Auth::user()->canUpdateIdentity() )
                        <input type="text" value="{{ Auth::user()->identity_number }}" name="identity_number" class="form-control" id="inputIdentityNumber" placeholder="Vui lòng nhập số CMND">
                    @else
                        <input  disabled type="text" value="*****{{substr(Auth::user()->identity_number, -3) }}" name="identity_number" class="form-control" id="inputIdentityNumber" placeholder="Vui lòng nhập số CMND">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>

@endsection