@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center m-5">
                <div class="col-3">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-around">
                                    <div class="align-self-center text-success">
                                        <i class="fa-solid fa-2xl fa-indian-rupee-sign"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        @if ($cards_data)
                                            <h3>{{ $cards_data->total_income }}</h3>
                                        @else
                                            <h3>0</h3>
                                        @endif
                                        <span>Total Income Added</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-around">
                                    <div class="align-self-center text-danger">
                                        <i class="fa-solid fa-2xl fa-indian-rupee-sign"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        @if ($cards_data)
                                            <h3>{{ $cards_data->total_expense }}</h3>
                                        @else
                                            <h3>0</h3>
                                        @endif
                                        <span>Total Expense</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-around">
                                    <div class="align-self-center text-primary">
                                        <i class="fa-solid fa-2xl fas fa-wallet"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        @if ($cards_data)
                                            <h3>{{ $cards_data->balance }}</h3>
                                        @else
                                            <h3>0</h3>
                                        @endif
                                        <span>Balance</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between m-2 w-75">

                <div class="col-4">
                    <h2 class="h2">Transaction Details</h2>
                </div>
                <div class="col-3">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        class="btn btn-primary"><i class="fa fa-plus"></i> Transaction</button>
                </div>
            </div>

            <table class="table table-bordered w-75">
            @if (!empty($data) && $data->count())
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Details</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                            <tr id="{{$value->id}}">
                                <td>{{$value->date}}</td>
                                <td>{{$value->amount}}</td>
                                <td>{{$value->details}}</td>
                                @if($value->type == 0)
                                <td>Expence <i class="mx-1 text-danger fa-solid fa-arrow-down"></i></td>
                                @else                                
                                <td> Income <i class="mx-1 text-success fa-solid fa-arrow-up"></i></td>
                                @endif
                                <td class="d-flex justify-content-around">
                            <form action="/del-transaction/{{ $value->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger justify-content-center delete" title="Delete"><i
                                    class="fs-5 text-secondary fas fa-trash"></i> Delete</button>
                            </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div
                        class="row justify-content-center text-center bg-white border p-2 w-75">
                        <h4 class="mt-2">no transactions available</h4>
                    </div>
                @endif
            </table>
            <div class="d-flex w-75 ustify-content-end">
                {!! $data->links() !!}
            </div>
            @include('partials.addTransaction')
            @include('partials.deleteTransaction')
        </div>
    </div>
@endsection
