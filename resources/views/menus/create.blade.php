@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>Create menu</h1>
                        <small class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </small>
                    </div>

                    <div class="panel-body">
                        {{--store list--}}
                        {{--@foreach($stores as $store)--}}
                        {{--<pre>{{$store->name}}</pre>--}}
                        {{--@endforeach--}}
                        <select id="selectStores">
                            <option disabled selected value> -- select an option -- </option>
                        </select>
                        {{--pick store > load dishes--}}
                        <select id="selectDishes">
                            <option disabled selected value> -- select an option -- </option>
                        </select>
                        <div id="dishList"></div>
                        {{--pick out disk to menu--}}

                        {{--confirm to save list of menu--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('js/menu-create.js') }}"></script>
@endsection