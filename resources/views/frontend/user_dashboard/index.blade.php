@extends('frontend.layouts.app')
@section('content')
<section id="contact-us" style="margin-top: 50px">
    <section id="service-page">
        <div class="container">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center mb-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key=>$order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->amount }}</td>
                                    <td>{{ $order->paid }}</td>
                                    <td>
                                        <a href=""> <button class="btn btn-success">View</button></a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>

</section>
@endsection
