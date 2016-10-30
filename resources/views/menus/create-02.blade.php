@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" id="menuCreateDiv">
                    <div class="panel-heading">
                        <h1>Create menu</h1>
                        <small class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </small>
                    </div>

                    <div class="panel-body">
                        <select id="selectStores"
                        >
                            <option disabled selected value> -- select an option -- </option>

                            <option v-for="(index, store) in stores"
                                    value="@{{ index }}"
                            >
                                @{{ store.name }}
                            </option>
                        </select>
                        {{--pick out disk to menu--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div id="dishList"
                                    class="panel panel-default"
                                >
                                    <div class="panel-heading">
                                        <h4>Món ăn</h4>
                                    </div>

                                    <div class="panel-body">
                                        <div v-for="(index, dish) in stores[selectedStoreIndex].dishes"
                                             class="checkbox"
                                        >
                                            <label>
                                                <input type="checkbox" value="@{{ index }}" v-bind:checked="dish.selected"
                                                        @click='updateMenuItem(this.index)'
                                                >
                                                    @{{ dish.name }}|@{{ dish.price }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Menu ngày @{{ menu.date }}
                                            <i class="fa fa-pencil-square-o"
                                                @click="menuDateInput = !menuDateInput"
                                            ></i>
                                        </h4>
                                        <div class="row pull-right">
                                            <span id="menuDateInput"></span>
                                        </div>
                                        {{--<div v-show="menuDateInput" id="menuDateInput"></div>--}}
                                        {{--<input type="text" v-show="menuDateInput" id="menuDateInput">--}}
                                    </div>

                                    <div id="menu"
                                         class="panel-body"
                                    >
                                        <div v-for="dish in menu.dishes">
                                            @{{ dish.name }}|@{{ dish.price }}
                                        </div>
                                    </div>
                                </span>
                            </div>

                        </div>

                        {{--confirm to save list of menu--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

    <script src="{{ url('vue/menu-create.js') }}"></script>

    <script>
//        $('#menuDateInput').datepicker();
    </script>
@endsection