    @if($errors->any())
        <ul class="alert-main danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif        