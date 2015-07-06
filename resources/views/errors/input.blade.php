@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Thông báo!</strong> Có lỗi xảy ra.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif