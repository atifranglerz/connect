@extends('company.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">DASHBOARD</h4>
                        <p class="sec_main_para text-center">View your profile</p>
                       
                    </div>
                </div>
            </div>
            <div class="row">
               
            </div>
        </div>
    </section>
      <!-- Modal -->
      <div class="modal fade" id="privTermsPolicyModal" aria-labelledby="privTermsPolicy" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="privTermsPolicy">Privacy Policy and Terms & Conditions</h6>
                </div>
               
                <div class="modal-body">
                    <h6 class="sec_main_heading text-center">Privacy Policy</h6>
                    <p class="text-justify">{!! $data['policy']->description !!}</p>
                    <h6 class="sec_main_heading text-center">Terms & Conditions</h6>
                    <p class="text-justify">{!! $data['terms']->description !!}</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" id="agreePrivTerms" data-bs-dismiss="modal" style="padding: 8px 16px!important;height: unset">I Agree</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <?php
        $company = \App\Models\InsuranceCompany::find(Auth::guard('company')->user()->id);
        $term = $company->term_condition;
        
    ?>
    <script>
    var term = '<?php echo $term; ?>';
    var authid = '<?php echo $company->id; ?>';

    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    if(term == 0){
        $(function() {
            $('#privTermsPolicyModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#privTermsPolicyModal").modal('show');
            $(document).on('click', '#agreePrivTerms', function() {
                toastr.success("You've agreed to our Privacy Policy and Terms & Conditions");
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {'X-CSRF-Token': '{{ csrf_token() }}',},
                    url: "{{ route('company.terms_condition') }}",
                    data: {'id': 1,'authid':authid},
                    success: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    }
    </script>
@endsection

