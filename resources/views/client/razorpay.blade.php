<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ $message }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                    @endif
                    <div class="card card-default">
                        <div class="card-header">
                            Razorpay Payment Gateway
                        </div>
                        <div class="card-body text-center">
                            <form action="{{ route('order.store') }}" method="POST">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="100"
                                    data-buttontext="Pay ₹ 1" data-name="ECom" datadescription="Rozerpay"
                                    data-image="{{ url('/frontend/images/logo.png') }}" data-prefill.name="name" data-prefill.email="email"
                                    datatheme.color="#ff7529"></script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
