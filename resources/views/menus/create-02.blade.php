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
                        {{--store list--}}
                        {{--@foreach($stores as $store)--}}
                        {{--<pre>{{$store->name}}</pre>--}}
                        {{--@endforeach--}}
                        <select id="selectStores"
                        >
                            <option disabled selected value> -- select an option -- </option>

                            <option v-for="(index, store) in stores"
                                    value="@{{ index }}"
                            >
                                @{{ store.name }}
                            </option>
                        </select>
                        {{--pick store > load dishes--}}
                        <select id="selectDishes"
                                v-model='selectedDish'
                        >
                            <option disabled selected value> -- select an option -- </option>

                            <option v-for="dish in selectedStore.dishes">
                                @{{ dish.name }}
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
                                        {{--<div v-for="(index, dish) in selectedStore.dishes"--}}
                                             {{--class="checkbox"--}}
                                        {{-->--}}
                                        <div v-for="(index, dish) in stores[selectedStoreIndex].dishes"
                                             class="checkbox"
                                        >
                                            <label><input type="checkbox" value="@{{ index }}"
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
                                            <i @click="menuDateInput = !menuDateInput"
                                                class="fa fa-pencil-square-o"></i>
                                        </h4>
                                        <input v-show="menuDateInput"
                                               type="date" value="{{ date('Y-m-d') }}"
                                               id="menuDateInput">

                                    </div>

                                    <div id="menu"
                                         class="panel-body"
                                    >
                                        <div v-for="dish in menu.dishes">
                                        {{--<div v-for="dish in stores[selectedStoreIndex].dishes.filter(dish => dish.selected)">--}}
                                        {{--<div v-for="dish in stores[selectedStoreIndex].dishes">--}}
                                        {{--<div v-for="dish in menuDishes">--}}
                                            @{{ dish.name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{--confirm to save list of menu--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('vue/menu-create.js') }}"></script>
    <script>
        $(document).ready(function(){
//            console.log($('#menuDateInput'));
        });
    </script>
@endsection