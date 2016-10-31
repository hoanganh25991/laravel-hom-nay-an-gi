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
                                    <div class="zero-clipboard"><span class="btn-default btn-clipboard">Edit</span></div>

                                    <div class="panel-heading">
                                        <span class="h4">Món ăn</span>
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
                                <div v-show="dishEditMode">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">T</span>
                                            <textarea rows="2" name="dishNames"
                                                      placeholder="Please, copy dish (name,price) col & paste here, without header"
                                                      class="form-control">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <span class="h4">Menu ngày </span>
                                        <span class="pull-right">
                                            @{{ menu.date }}
                                            <i class="fa fa-pencil-square-o"
                                                @click="menuDateInput = !menuDateInput"
                                            ></i>
                                        </span>
                                        <div class="row">
                                            <span style="position: absolute; right: 15px" id="menuDateInput"></span>
                                        </div>
                                    </div>

                                    <div id="menu"
                                         class="panel-body"
                                    >
                                        <div v-for="dish in menu.dishes">
                                            @{{ dish.name }}|@{{ dish.price }}
                                        </div>
                                    </div>

                                    <div class="panel-footer"
                                         v-show="menu.dishes.length"
                                    >
                                        <div class="row ">
                                            <div class="col-md-12">
                                                <button id="btnSaveMenu" class="btn btn-default btn-sm pull-right">
                                                    <i class="fa fa-floppy-o fa-2x " aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="panel-body">

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