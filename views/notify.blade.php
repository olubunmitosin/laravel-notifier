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

        /**
         * Helper function to Show Notification
         * @param $type
         * @param $message
         * @param $title
         * @param $position
         */
        function showNotification($type, $message, $title, $position) {
            switch($type){
                case 'success':
                    iziToast.success({
                        title : $title,
                        message : $message,
                        position : $position
                    });
                    break;

                case 'info':
                    iziToast.info({
                        title : $title,
                        message : $message,
                        position : $position
                    });
                    break;

                case 'error':
                case 'danger':
                    iziToast.error({
                        title : $title,
                        message : $message,
                        position : $position
                    });
                    break;

                case 'warning':
                    iziToast.warning({
                        title : $title,
                        message : $message,
                        position : $position
                    });
                    break;
                default:
                    iziToast.show({
                        title : $title,
                        message : $message,
                        position : $position
                    });
                    break;

            }
        }
        @foreach(session()->get('notifiers') as $notice)
        showNotification("{{ $notice['level'] }}", "{{ $notice['message'] }}", "{{ $notice['title'] }}","{{ $notice['position'] }}");
        @endforeach
    </script>
@endif
