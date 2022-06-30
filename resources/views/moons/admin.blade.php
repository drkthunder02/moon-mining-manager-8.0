@extends('layouts.master')

@section('title', 'Moon Admin')

@section('content')

    @if (\Session::has('message'))
        <div class="row">
            <div class="col-12">
                {!! \Session::get('message') !!}
            </div>
        </div>
    @endif

    <div class="row">

        <div class="col-12">
            <div class="card-heading">
                Existing Moon Data
            </div>
            <div class="card">
                <a href="/moon-admin/calculate">Calculate monthly rents</a><br>
                <a href="/moon-admin/export">Export</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-heading">Import Moon Survey Data</div>
            <div class="card">
                This import will update existing moons and add new moons.
                <form action="/moon-admin/import_survey_data" method="post">
                    {{ csrf_field() }}
                    <textarea name="data" rows="50" cols="200" placeholder="copy paste from game"></textarea>
                    <a href="#" onclick="moonAdminImportToggleExample(event)">example data</a>
<pre class="moon-admin-survey-data-example" style="display: none">
Moon	Moon Product	Quant.	TypeID	SolarSystemID	PlanetID	MoonID
KBP7-G VII - Moon 3
	Euxenite	0.6	45495	30003729	40236155	40236159
	Carnotite	0.4	45502	30003729	40236155	40236159
KBP7-G VII - Moon 4
	Cinnabar	0.19	45506	30003729	40236155	40236160
	Cubic Bistot	0.23	46676	30003729	40236155	40236160
	Euxenite	0.4	45495	30003729	40236155	40236160
	Loparite	0.18	45512	30003729	40236155	40236160
</pre>
                    <div class="form-actions">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-heading">Import Moon Data</div>
            <div class="card">
                This import will add a new moon for every row, it <em>cannot</em> update existing moons.
                <form action="/moon-admin/import" method="post">
                    {{ csrf_field() }}
                    <textarea name="data" rows="50" cols="200" placeholder="Paste raw moon data here from spreadsheet in the following format (columns): Region name, System name, Planet number, Moon number, Renter name, Mineral 1 name, Mineral 1 %, Mineral 2 name, Mineral 2 %, [Mineral 3 name, Mineral 3 %, [Mineral 4 name, Mineral 4 %]]"></textarea>
                    <div class="form-actions">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function moonAdminImportToggleExample(evt) {
            $.Event(evt).preventDefault();
            const $example = $('.moon-admin-survey-data-example');
            if ($example.is(':visible')) {
                $example.hide();
            } else {
                $example.show();
            }
        }
    </script>

@endsection
