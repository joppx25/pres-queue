@push('after-scripts')
    <script>
        $(function() {
            $('.reserve-queue').click(function() {
                let business_id = $(this).data('business-id');
                let queue_id    = $(this).data('queue-id');
                let user_id     = "{{ auth()->user()->id }}";
                
                $.ajax({
                    url: "{{ route('queue.reserve') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method:  'post',
                    data: {
                        queue_id,
                        business_id,
                        user_id,
                        status: 2,
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