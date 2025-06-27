@extends('layouts.app')
@section('title', 'FAQ - Pertanyaan yang Sering Diajukan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endpush

{{-- main --}}
@section('content')

    <!-- Start FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title">
                        <h3>Pertanyaan yang Sering Diajukan</h3>
                    </div>
                    <div id="faqAccordion" class="accordion">

                        <!-- FAQ Item 1 -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        Lorem ipsum dolor sit amet consectetur.
                                        <i class="fa"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod nam ullam ducimus, fugiat
                                    id eius repellendus debitis neque pariatur sint tenetur eum assumenda aut distinctio
                                    fuga incidunt quisquam ipsum nemo quo facilis dolores iste reprehenderit rerum earum.
                                    Nobis, voluptas amet. Illo perspiciatis quae voluptatibus in repudiandae quam quisquam
                                    praesentium amet a, repellendus temporibus eaque asperiores veniam perferendis
                                    consectetur deserunt architecto eligendi quaerat nisi! Cum, omnis facere ratione ipsam
                                    quaerat laborum? Cupiditate et ipsa repellendus. Repellat voluptates delectus error.
                                    Quasi quis quibusdam hic fugiat exercitationem enim iusto minima voluptatem eos tenetur
                                    laborum, dignissimos et perspiciatis harum totam quo fuga repellendus nam.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                        aria-expanded="false" aria-controls="collapseTwo">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        <i class="fa"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                <div class="card-body">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem commodi error
                                    eaque in consequuntur atque quae sequi expedita, vero molestias maxime aut consectetur
                                    tempora laborum.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class=" btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                        aria-expanded="false" aria-controls="collapseThree">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam, quo? <i
                                            class="fa"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#faqAccordion">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, quas quos incidunt
                                    officia, expedita eaque et corporis itaque optio inventore quaerat quod eum ipsum
                                    consequuntur beatae.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End FAQ Section -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            // Add active state management
            $('#faqAccordion').on('shown.bs.collapse', function(e) {
                $(e.target).closest('.card').addClass('active');
            });

            $('#faqAccordion').on('hidden.bs.collapse', function(e) {
                $(e.target).closest('.card').removeClass('active');
            });
        });
    </script>
@endpush
