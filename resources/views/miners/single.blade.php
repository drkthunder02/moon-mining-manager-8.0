@extends('layouts.master')

@section('title', 'Miner Details')

@section('content')

    <div class="row">

        <div class="col-4">
            <div class="card-heading">Miner</div>
            @include('common.card', [
                'avatar' => $miner->avatar,
                'name' => $miner->name, 
                'sub' => (isset($miner->corporation->name) ? $miner->corporation->name : 'UNKNOWN'),
            ])
        </div>

        <div class="col-4">
            <div class="card-heading">Total tax paid to date</div>
            <div class="card highlight">
                <span class="num">{{ number_format($miner->total_payments) }}</span> ISK
            </div>
        </div>

        <div class="col-4">
            <div class="card-heading">Current amount owed</div>
            <div class="card highlight negative">
                <span class="num">{{ number_format($miner->amount_owed) }}</span> ISK
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-12">

            <div class="card-heading">Activity Log (<a href="/payment/new">Payment received</a>)</div>

            <table id="miningActivity">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Location</th>
                        <th class="numeric">Amount</th>
                        <th>Date</th>
                        <th>Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activity_log as $activity)
                        <tr>
                            <td>
                                @if (isset($activity->amount))
                                    Invoice sent
                                @endif
                                @if (isset($activity->quantity))
                                    {{ $activity->type->typeName }}
                                    <br>
                                    <small>{{ number_format($activity->quantity, 0) }} units</small>
                                @endif
                                @if (isset($activity->amount_received))
                                    Payment received
                                @endif
                            </td>
                            <td>
                                @if (isset($activity->refinery_id))
                                    {{ $activity->refinery->name }}
                                @endif
                            </td>
                            <td class="numeric">
                                @if (isset($activity->amount))
                                    {{ number_format($activity->amount) }} ISK
                                @endif
                                @if (isset($activity->amount_received))
                                    {{ number_format($activity->amount_received) }} ISK
                                @endif
                                @if (isset($activity->quantity))
                                    @if (isset($activity->tax_amount))
                                        {{ number_format($activity->tax_amount) }} ISK
                                    @else
                                        -
                                    @endif
                                @endif
                            </td>
                            <td title="@if (! isset($activity->quantity)) {{ date('g:ia', strtotime($activity->created_at)) }} @endif">
                                {{ date('M j, Y', strtotime($activity->created_at)) }}
                            </td>
                            <td title="@if (! isset($activity->quantity)) {{ date('g:ia', strtotime($activity->updated_at)) }} @endif">
                                {{ date('M j, Y', strtotime($activity->updated_at)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <script>
        window.addEventListener('load', function () {
            $('#miningActivity').tablesorter();
        });
    </script>

@endsection
