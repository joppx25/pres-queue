@push('after-scripts')
    <script>
        $(function () {
            $('#role-business').on('click', function() {
                if ($(this).is(':checked')) {
                    let html = `
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="business-name" class="col-md-2">Business Name</label>
                            <div class="col-md-8">
                                <input type="text" name="business_name" id="business-name" class="form-control" placeholder="Business Name" required>
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label for="business-details" class="col-md-2">Business Details</label>
                            <div class="col-md-8">
                                <input type="text" name="business_details" id="business-details" class="form-control" placeholder="Business Details" required>
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label for="business-contact" class="col-md-2">Contact</label>
                            <div class="col-md-8">
                                <input type="text" name="contact" id="business-contact" class="form-control" placeholder="Contact no." required>
                            </div><!--col-->
                        </div><!--form-group-->
                        <div class="form-group row">
                            <label for="business-address" class="col-md-2">Address</label>
                            <div class="col-md-8">
                                <input type="text" name="address" id="business-address" class="form-control" placeholder="Address" required>
                            </div><!--col-->
                        </div><!--form-group-->
                    </div>`;
                    $('#card-business').append(html);
                } else {
                    $('#card-business .card-body').remove();
                }
            });
        });
    </script>
@endpush