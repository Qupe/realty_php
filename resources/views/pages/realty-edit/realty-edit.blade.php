@extends('layouts.container.container')

@section('title', 'Редактирование объявления')

@section('content')
    <div class="page-header">
        <h3>Редактирование объявления #{{ $realty['id'] }}</h3>
    </div>
    <form class="form-horizontal realty-edit" role="form" method="POST" action="">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('transaction_type') ? ' has-error' : '' }}">
            <label for="{{ $properties['transaction_type']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['transaction_type']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['transaction_type']['name'] }}"
                        name="{{ $properties['transaction_type']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['transaction_type']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['current'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('realty_type') ? ' has-error' : '' }}">
            <label for="{{ $properties['realty_type']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['realty_type']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['realty_type']['name'] }}"
                        name="{{ $properties['realty_type']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['realty_type']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['current'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>


        <b>Параметры дома</b>
        <hr/>
        <div class="form-group{{ $errors->has('house_type') ? ' has-error' : '' }}">
            <label for="{{ $properties['house_type']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['house_type']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['house_type']['name'] }}"
                        name="{{ $properties['house_type']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['house_type']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['current'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group{{ $errors->has('build_year') ? ' has-error' : '' }}">
            <label for="{{ $properties['build_year']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['build_year']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm" name="{{ $properties['build_year']['code'] }}"
                       id="{{ $properties['build_year']['name'] }}"
                       value="{{ $properties['build_year']['values'][0]['entered'] }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['floors_total']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['floors_total']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm" name="{{ $properties['floors_total']['code'] }}"
                       id="{{ $properties['floors_total']['name'] }}"
                       value="{{ $properties['floors_total']['values'][0]['entered'] }}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['new_building']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['new_building']['name'] }}
            </label>
            <div class="col-sm-3">
                @foreach($properties['new_building']['values'] as $prop)
                    <label class="checkbox-inline">
                        <input type="checkbox"
                               name="{{ $properties['new_building']['code'] }}"
                               value="{{ $prop['id'] }}"
                                {{ $prop['value'] == $prop['entered'] ? 'checked' : '' }}
                        > &nbsp;
                    </label>
                @endforeach
            </div>
        </div>

        <b>Параметры квартиры</b>
        <hr/>

        <div class="form-group">
            <label for="{{ $properties['room']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['room']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['room']['name'] }}"
                        name="{{ $properties['room']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['room']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['value'] == $prop['entered'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['floor']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['floor']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="{{ $properties['floor']['code'] }}"
                       id="{{ $properties['floor']['name'] }}"
                       value="{{ $properties['floor']['values'][0]['entered'] }}"
                />
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['gross_area']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['gross_area']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="{{ $properties['gross_area']['code'] }}"
                       id="{{ $properties['gross_area']['name'] }}"
                       value="{{ $properties['gross_area']['values'][0]['entered'] }}"
                />
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['living_area']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['living_area']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="{{ $properties['living_area']['code'] }}"
                       id="{{ $properties['living_area']['name'] }}"
                       value="{{ $properties['living_area']['values'][0]['entered'] }}"
                />
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['kitchen_area']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['kitchen_area']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="{{ $properties['kitchen_area']['code'] }}"
                       id="{{ $properties['kitchen_area']['name'] }}"
                       value="{{ $properties['kitchen_area']['values'][0]['entered'] }}"
                />
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['ceiling_height']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['ceiling_height']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="{{ $properties['ceiling_height']['code'] }}"
                       id="{{ $properties['ceiling_height']['name'] }}"
                       value="{{ $properties['ceiling_height']['values'][0]['entered'] }}"
                />
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['bathroom_type']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['bathroom_type']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['bathroom_type']['name'] }}"
                        name="{{ $properties['bathroom_type']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['bathroom_type']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['value'] == $prop['entered'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['balcony']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['balcony']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['balcony']['name'] }}"
                        name="{{ $properties['balcony']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['balcony']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['value'] == $prop['entered'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['window_view']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['window_view']['name'] }}
            </label>
            <div class="col-sm-3">
                @foreach($properties['window_view']['values'] as $prop)
                    <label class="checkbox-inline">
                        <input type="checkbox"
                               name="{{ $properties['window_view']['code'] }}"
                               {{ $prop['value'] == $prop['entered'] ? 'checked' : '' }}
                               value="{{ $prop['id'] }}"> {{ $prop['value'] }}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['renovation']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['renovation']['name'] }}
            </label>
            <div class="col-sm-3">
                <select class="form-control input-sm" id="{{ $properties['renovation']['name'] }}"
                        name="{{ $properties['renovation']['code'] }}">
                    <option selected>Не выбрано</option>
                    @foreach($properties['renovation']['values'] as $prop)
                        <option value="{{ $prop['id'] }}" {{ $prop['value'] == $prop['entered'] ? 'selected' : '' }}>
                            {{ $prop['value'] }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['apartment']['name'] }}" class="col-sm-2 control-label">
                {{ $properties['apartment']['name'] }}
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="{{ $properties['apartment']['code'] }}"
                       id="{{ $properties['apartment']['name'] }}"
                       value="{{ $properties['apartment']['values'][0]['entered'] }}"
                />
            </div>
        </div>

        <b>Стоимость</b>
        <hr/>
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">
                Цена
            </label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm"
                       name="price"
                       id="price"
                       value="{{ $realty['price'] }}"
                />
            </div>
        </div>
        <div class="form-group">
            <label for="{{ $properties['haggle']['code'] }}" class="col-sm-2 control-label">
                {{ $properties['haggle']['name'] }}
            </label>
            <div class="col-sm-3">
                <label class="checkbox-inline">
                    <input type="checkbox"
                           name="{{ $properties['haggle']['code'] }}"
                           {{ $properties['haggle']['values'][0]['current'] ? 'checked' : '' }}
                           value="1"> &nbsp;
                </label>
            </div>
        </div>

        <b>Описание</b>
        <hr/>

        <div class="form-group">
            <div class="col-sm-12">
                    <textarea class="realty-add-edit__description form-control" name="description">
                        {{ isset($realty['description']) ? $realty['description'] : '' }}
                    </textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">
                <button class="btn btn-primary">Добавить объявление</button>
            </div>
        </div>
    </form>
@endsection