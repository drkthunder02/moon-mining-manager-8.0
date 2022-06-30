@extends('layouts.master')

@section('title', 'Extractions')

@section('content')

<div class="row" >
    <div class="col-12">

        <p>
            Lists ore volumes for each detonation, updates daily.<br>
            The mined value is <em>without</em> residue.
        </p>

        <p>
            @foreach (['Tax' => $corporationTax, 'Rent' => $corporationRent] as $name => $id)
            @if ($id == $corporationId) <strong> @endif
                <a href="/extractions?corporation={{$id}}&limit={{$limit}}">{{$name}} Corporation</a>
            @if ($id == $corporationId) </strong> @endif
            @endforeach
        </p>

        <p>
            Moon:
            <select onchange="extractionsReloadPage(this)"
                    data-corporation-id="{{$corporationId}}" data-limit="{{$limit}}">
                <option value="">All</option>
                @foreach ($moons as $moon)
                    <option value="{{$moon['id']}}" @if ($moon['id'] === $moonId) selected @endif>
                        {{$moon['name']}}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            Total: {{$total}},
            @if ($limit > 0)
                showing {{min((($page - 1) * $limit) + 1, $total)}} - {{min(($page * $limit), $total)}},
                page:
                @for ($i = 1; ($i - 1) * $limit < $total; $i++)
                    @if ($i == $page) <strong> @endif
                        @php ($params = "corporation=$corporationId&page=$i&moon=$moonId&limit=$limit")
                        <a href="/extractions?{{$params}}">&nbsp;{{$i}}&nbsp;</a>&nbsp;
                    @if ($i == $page) </strong> @endif
                @endfor
            @endif
            <br>
            Limit:
            @foreach ([10, 50, 500, 5000, 0] as $setLimit)
                @if ($limit == $setLimit) <strong> @endif
                    <a href="/extractions?corporation={{$corporationId}}&moon={{$moonId}}&limit={{$setLimit}}">
                        {{$setLimit === 0 ? 'all' : $setLimit}}</a>&nbsp;
                    @if ($limit == $setLimit) </strong> @endif
            @endforeach
        </p>

        <table id="moonExtractions">
            <thead>
                <tr>
                    <th>Detonation</th>
                    <th>Moon</th>
                    <th>Refinery</th>
                    <th>Total mined</th>
                    <th>Ore 1</th>
                    <th class="font-weight-normal">total m<sup>3</sup></th>
                    <th class="font-weight-normal">mined</th>
                    <th class="font-weight-normal">%</th>
                    <th>Ore 2</th>
                    <th class="font-weight-normal">total m<sup>3</sup></th>
                    <th class="font-weight-normal">mined</th>
                    <th class="font-weight-normal">%</th>
                    <th>Ore 3 </th>
                    <th class="font-weight-normal">total m<sup>3</sup></th>
                    <th class="font-weight-normal">mined</th>
                    <th class="font-weight-normal">%</th>
                    <th>Ore 4</th>
                    <th class="font-weight-normal">total m<sup>3</sup></th>
                    <th class="font-weight-normal">mined</th>
                    <th class="font-weight-normal">%</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $extraction)
                <tr>
                    <td>{{$extraction->notification_timestamp}}</td>
                    <td data-id="{{$extraction->moon_id}}">{{$extraction->invMoon->itemName}}</td>
                    <td data-id="{{$extraction->refinery_id}}">{{$extraction->refinery->name}}</td>
                    <td>
                        {{round(
                            (
                                $extraction->ore1_mined + $extraction->ore2_mined +
                                $extraction->ore3_mined + $extraction->ore4_mined
                            ) * 10 /
                            (
                                $extraction->ore1_volume + $extraction->ore2_volume +
                                $extraction->ore3_volume + $extraction->ore4_volume
                            ) *
                            100,
                            2
                        )}}%
                    </td>
                    <td data-id="{{$extraction->ore1_type_id}}">{{$extraction->ore1->typeName}}</td>
                    <td>{{number_format($extraction->ore1_volume)}}</td>
                    <td>{{number_format($extraction->ore1_mined * 10)}}</td>
                    <td>{{round($extraction->ore1_mined * 10 / $extraction->ore1_volume * 100, 2)}}</td>
                    <td data-id="{{$extraction->ore2_type_id}}">{{$extraction->ore2->typeName}}</td>
                    <td>{{number_format($extraction->ore2_volume)}}</td>
                    <td>{{number_format($extraction->ore2_mined * 10)}}</td>
                    <td>{{round($extraction->ore2_mined * 10 / $extraction->ore2_volume * 100, 2)}}</td>
                    <td data-id="{{$extraction->ore3_type_id}}">
                        {{$extraction->ore3 ? $extraction->ore3->typeName : ''}}
                    </td>
                    <td>{{$extraction->ore3 ? number_format($extraction->ore3_volume) : ''}}</td>
                    <td>{{$extraction->ore3 ? number_format($extraction->ore3_mined * 10) : ''}}</td>
                    <td>{{$extraction->ore3 ?
                        round($extraction->ore3_mined * 10 / $extraction->ore3_volume * 100, 2) : ''}}</td>
                    <td data-id="{{$extraction->ore4_type_id}}">
                        {{$extraction->ore4 ? $extraction->ore4->typeName : ''}}
                    </td>
                    <td>{{$extraction->ore4 ? number_format($extraction->ore4_volume) : ''}}</td>
                    <td>{{$extraction->ore4 ? number_format($extraction->ore4_mined * 10) : ''}}</td>
                    <td>{{$extraction->ore4 ?
                            round($extraction->ore4_mined * 10 / $extraction->ore4_volume * 100, 2) : ''}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
window.addEventListener('load', function () {
    $('#moonExtractions').tablesorter({ sortList: [[0,1]] });
});

function extractionsReloadPage(selectElement) {
    const moonId = selectElement.options[selectElement.selectedIndex].value;
    const corporationId = selectElement.dataset.corporationId;
    const limit = selectElement.dataset.limit;
    self.location.href = '/extractions?corporation='+corporationId+'&moon='+moonId+'&limit='+limit;
}
</script>

@endsection
