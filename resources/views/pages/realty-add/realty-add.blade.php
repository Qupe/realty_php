@extends('layouts.container.container')

@if($scope == 'add')
    @section('title', 'Добавить объявление')
@else
    @section('title', 'Редактировать объявление')
@endif

@section('content')
    <div class="page-header">
        <h3>@if($scope == 'add') Разместить @else Редактировать @endif объявление</h3>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form class="form-horizontal realty-add" role="form" method="POST" action="">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('realty_type') ? ' has-error' : '' }}">
            <label for="{{ $properties['realty_type']['code'] }}" class="col-sm-2 control-label">
                {{ $properties['realty_type']['name'] }}
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-3">
                @include('blocks.select.select', [
                    'prop' => $properties['realty_type'],
                    'class' => 'form-control input-sm realty-add__control',
                    'default' => false,
                    'disabled' => $scope == 'add' ? false : true
                ])
            </div>
        </div>
        <div class="form-group{{ $errors->has('transaction_type') ? ' has-error' : '' }}">
            <label for="{{ $properties['transaction_type']['code'] }}" class="col-sm-2 control-label">
                {{ $properties['transaction_type']['name'] }}
                <span class="text-danger">*</span>
            </label>
            <div class="col-sm-3">
                @include('blocks.select.select', [
                    'prop' => $properties['transaction_type'],
                    'class' => 'form-control input-sm realty-add__control',
                    'default' => false,
                    'disabled' => $scope == 'add' ? false : true
                ])
            </div>
        </div>

        <div class="realty-add__groups">
            <div class="realty-add__group-item">
                <b>Характеристики</b>
                <hr/>
                <div class="form-group{{ $errors->has('house_type') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['house_type']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['house_type']['transaction_type']) }}]">
                    <label for="{{ $properties['house_type']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['house_type']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['house_type'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>

                <div class="form-group{{ $errors->has('build_year') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['build_year']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['build_year']['transaction_type']) }}]">
                    <label for="{{ $properties['build_year']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['build_year']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['build_year'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-md-1 realty-add__unit">{{ $properties['build_year']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('floors_total') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['floors_total']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['floors_total']['transaction_type']) }}]">
                    <label for="{{ $properties['floors_total']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['floors_total']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['floors_total'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('new_building') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['new_building']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['new_building']['transaction_type']) }}]">
                    <label for="{{ $properties['new_building']['name'] }}" class="col-sm-2 control-label">
                        &nbsp;
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.checkbox.checkbox', [
                            'prop' => $properties['new_building'],
                            'class' => 'realty-add__control'
                        ])
                    </div>
                </div>
            </div>

            <div class="realty-add__group-item">
                <div class="form-group{{ $errors->has('lot_area') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['lot_area']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['lot_area']['transaction_type']) }}]">
                    <label for="{{ $properties['lot_area']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['lot_area']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['lot_area'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">{{ $properties['lot_area']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('lot_type') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['lot_type']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['lot_type']['transaction_type']) }}]">
                    <label for="{{ $properties['lot_type']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['lot_type']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['lot_type'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>

            </div>

            <div class="realty-add__group-item">
                <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['room']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['room']['transaction_type']) }}]">
                    <label for="{{ $properties['room']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['room']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['room'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('rooms_offered') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['rooms_offered']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['rooms_offered']['transaction_type']) }}]">
                    <label for="{{ $properties['rooms_offered']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['rooms_offered']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['rooms_offered'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('floor') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['floor']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['floor']['transaction_type']) }}]">
                    <label for="{{ $properties['floor']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['floor']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['floor'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('gross_area') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['gross_area']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['gross_area']['transaction_type']) }}]">
                    <label for="{{ $properties['gross_area']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['gross_area']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['gross_area'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">{{ $properties['gross_area']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('living_area') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['living_area']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['living_area']['transaction_type']) }}]">
                    <label for="{{ $properties['living_area']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['living_area']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['living_area'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">{{ $properties['living_area']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('kitchen_area') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['kitchen_area']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['kitchen_area']['transaction_type']) }}]">
                    <label for="{{ $properties['kitchen_area']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['kitchen_area']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['kitchen_area'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">{{ $properties['kitchen_area']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('ceiling_height') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['ceiling_height']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['ceiling_height']['transaction_type']) }}]">
                    <label for="{{ $properties['ceiling_height']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['ceiling_height']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['ceiling_height'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">{{ $properties['ceiling_height']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('bathroom_type') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['bathroom_type']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['bathroom_type']['transaction_type']) }}]">
                    <label for="{{ $properties['bathroom_type']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['bathroom_type']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['bathroom_type'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('balcony') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['balcony']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['balcony']['transaction_type']) }}]">
                    <label for="{{ $properties['balcony']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['balcony']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['balcony'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('window_view') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['window_view']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['window_view']['transaction_type']) }}]">
                    <label for="{{ $properties['window_view']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['window_view']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['window_view'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('renovation') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['renovation']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['renovation']['transaction_type']) }}]">
                    <label for="{{ $properties['renovation']['code'] }}" class="col-sm-2 control-label">
                        {{ $properties['renovation']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['renovation'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('apartment') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['apartment']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['apartment']['transaction_type']) }}]">
                    <label for="{{ $properties['apartment']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['apartment']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['apartment'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
            </div>

            <div class="realty-add__group-item">
                <div class="form-group{{ $errors->has('garage_type') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['garage_type']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['garage_type']['transaction_type']) }}]">
                    <label for="{{ $properties['garage_type']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['garage_type']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['garage_type'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('garage_building_type') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['garage_building_type']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['garage_building_type']['transaction_type']) }}]">
                    <label for="{{ $properties['garage_building_type']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['garage_building_type']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['garage_building_type'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('garage_ownership') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['garage_ownership']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['garage_ownership']['transaction_type']) }}]">
                    <label for="{{ $properties['garage_ownership']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['garage_ownership']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['garage_ownership'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('garage_name') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['garage_name']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['garage_name']['transaction_type']) }}]">
                    <label for="{{ $properties['garage_name']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['garage_name']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['garage_name'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
            </div>

            <div class="realty-add__group-item">
                <b>Стоимость</b>
                <hr/>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}"
                     data-realty-type="[55,56,57,58,59,60,61]"
                     data-transaction-type="[53,54]">
                    <label for="price" class="col-sm-2 control-label">
                        Цена <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['price'] = [
                                'code' => 'price',
                                'current_value' => isset($realty['price']) ? $realty['price'] : '',
                            ],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">руб.</div>
                </div>
                <div class="form-group{{ $errors->has('prepayment') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['prepayment']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['prepayment']['transaction_type']) }}]">
                    <label for="{{ $properties['prepayment']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['prepayment']['name'] }}
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.input.input', [
                            'prop' => $properties['prepayment'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                    <div class="col-sm-1 realty-add__unit">{{ $properties['prepayment']['unit'] }}</div>
                </div>
                <div class="form-group{{ $errors->has('price_period') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['price_period']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['price_period']['transaction_type']) }}]">
                    <label for="{{ $properties['price_period']['name'] }}" class="col-sm-2 control-label">
                        {{ $properties['price_period']['name'] }}
                        <span class="text-danger">*</span>
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.select.select', [
                            'prop' => $properties['price_period'],
                            'class' => 'form-control input-sm realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('haggle') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['haggle']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['haggle']['transaction_type']) }}]">
                    <label for="{{ $properties['haggle']['code'] }}" class="col-sm-2 control-label">
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.checkbox.checkbox', [
                            'prop' => $properties['haggle'],
                            'class' => 'realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('pledge') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['pledge']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['pledge']['transaction_type']) }}]">
                    <label for="{{ $properties['pledge']['code'] }}" class="col-sm-2 control-label"></label>
                    <div class="col-sm-3">
                        @include('blocks.checkbox.checkbox', [
                            'prop' => $properties['pledge'],
                            'class' => 'realty-add__control'
                        ])
                    </div>
                </div>
                <div class="form-group{{ $errors->has('utilities_included') ? ' has-error' : '' }}"
                     data-realty-type="[{{ implode(',', $properties['utilities_included']['realty_type']) }}]"
                     data-transaction-type="[{{ implode(',', $properties['utilities_included']['transaction_type']) }}]">
                    <label for="{{ $properties['utilities_included']['code'] }}" class="col-sm-2 control-label">
                    </label>
                    <div class="col-sm-3">
                        @include('blocks.checkbox.checkbox', [
                            'prop' => $properties['utilities_included'],
                            'class' => 'realty-add__control'
                        ])
                    </div>
                </div>
            </div>
        </div>

        <b>Описание <span class="text-danger">*</span></b>
        <hr/>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <div class="col-sm-12">
                @include('blocks.textarea.textarea', [
                    'prop' => $properties['description'] = [
                        'code' => 'description',
                        'current_value' => isset($realty['description']) ? $realty['description'] : '',
                    ],
                    'class' => 'realty-add__description form-control'
                ])
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">
                <button class="btn btn-primary">
                    @if($scope == 'add') Добавить @else Изменить @endif объявление
                </button>
            </div>
        </div>
    </form>
@endsection