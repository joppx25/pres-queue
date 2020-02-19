@push('after-scripts')
    <script>
        $(function() {
            $('.resolve-queue').click(function() {
                let queue_id     = $(this).data('queue-id');
                let business_id  = $(this).data('business-id');
                let window_id    = $(this).data('window-id');
                let queue_number = $(this).data('queue-number');
                
                $.ajax({
                    url: "{{ route('queue.resolve') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method:  'post',
                    data: {
                        queue_id,
                        business_id,
                        window_id,
                        queue_number,
                    },
                    success: function (response) {
                        if (response == 1) window.location.reload();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endpush