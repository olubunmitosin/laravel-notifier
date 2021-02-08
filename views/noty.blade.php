@if(session()->has('notifiers'))
    <script src="{{ asset('/vendor/laravel-notifier/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/vendor/laravel-notifier/iziToast.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/vendor/laravel-notifier/iziToast.css') }}">

    <script type="text/javascript">
        iziToast.settings = ({
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX',
            position: 'topRight',
            close: true,
        });

        function showNotification($type, $message, $title) {
            switch($type){
                case 'success':
                    iziToast.success({
                        title : $title,
                        message : $message
                    });
                    break;

                case 'error':
                case 'danger':
                    iziToast.error({
                        title : $title,
                        message : $message
                    });
                    break;

                case 'warning':
                    iziToast.warning({
                        title : $title,
                        message : $message
                    });
                    break;
                default:
                    iziToast.show({
                        title : $title,
                        message : $message
                    });
                    break;

            }
        }
        @foreach(session()->get('notifiers') as $notice)
        showNotification("{{ $notice['level'] }}", "{{ $notice['message'] }}", "{{ $notice['title'] }}");
        @endforeach
    </script>
@endif
