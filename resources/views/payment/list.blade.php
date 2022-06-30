@extends('layouts.master')

@section('title', 'Manual Payment')

@section('content')

    <div class="row">

        <div class="col-12">

            <a href="/payment/new">Add new payment</a>
            <br><br>

            @foreach ([$minerPayments, $rentalPayments] as $idx => $payments)
                <table>
                    <thead>
                        <tr>
                            <th>
                                @if ($idx === 0)
                                    Miner
                                @else
                                    Renter
                                @endif
                            </th>
                            @if ($idx === 1)
                                <th>Refinery/Moon</th>
                            @endif
                            <th>Created by</th>
                            <th class="numeric">Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>
                                    @if (isset($payment->miner))
                                        {{ $payment->miner->name }}
                                    @elseif (isset($payment->renter))
                                        {{ $payment->renter->character_name }}
                                    @else
                                        @php ($id = $payment->renter_id ? $payment->renter_id : $payment->minder_id)
                                        <a href="https://evewho.com/character/{{ $id }}" target="_blank">
                                            {{ $id }}
                                        </a>
                                    @endif
                                </td>
                                @if ($idx === 1)
                                    <td>
                                        @if ($payment->refinery)
                                            {{ $payment->refinery->name }}
                                        @elseif ($payment->moon)
                                            {{ $payment->moon->getName() }}
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    {{ $payment->createdBy->name }}
                                </td>
                                <td class="numeric">
                                    {{ number_format($payment->amount_received) }} ISK
                                </td>
                                <td>
                                    {{ date('g:ia, jS F Y', strtotime($payment->created_at)) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
            @endforeach

        </div>

    </div>

@endsection
