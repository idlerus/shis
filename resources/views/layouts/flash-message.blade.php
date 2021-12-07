<div style="width: 300px; position: absolute; bottom: 10px; right: 10px">
    @if ($message = Session::get('success'))
        <div class="notification is-success">
            <button class="delete" onclick="this.parentElement.style.display='none';"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="notification is-danger">
            <button class="delete" onclick="this.parentElement.style.display='none';"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="notification is-warning">
            <button class="delete" onclick="this.parentElement.style.display='none';"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="notification is-info">
            <button class="delete" onclick="this.parentElement.style.display='none';"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($errors->any())
        @foreach($errors->all() as $message)
            <div class="notification is-danger">
                <button class="delete" onclick="this.parentElement.style.display='none';"></button>
                {{ $message }}
            </div>
        @endforeach
    @endif
</div>
