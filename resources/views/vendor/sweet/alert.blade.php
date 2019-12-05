@if (Session::has('sweet_alert.alert'))
    <script>
        @if (Session::has('sweet_alert.content'))
            var config = {!! Session::pull('sweet_alert.alert') !!}
            config.icon = config.type;
            delete config.type;
            var content = document.createElement('div');
            content.insertAdjacentHTML('afterbegin', config.content);
            config.content = content;
            swal(config);
        @else
            var config = {!! Session::pull('sweet_alert.alert') !!}
            config.icon = config.type;
            delete config.type;
            swal(config);
        @endif
    </script>
@endif