<?php

namespace App\Http\Requests\Realty;

use App\Http\Requests\Request;
use \Illuminate\Validation\Validator as Validator;
use Illuminate\Support\Facades\Auth;

class RealtyAdd extends Request
{
    public function __construct(\Illuminate\Http\Request $request)
    {
        $authUserId = Auth::user()->id;
        $request->request->add(['created_by' => $authUserId, 'owner_id' => $authUserId]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'realty_type' => 'required|exists:property_values,value,property_code,realty_type',
            'transaction_type' => 'required|exists:property_values,value,property_code,transaction_type',
            'price' => 'required',
            'created_by' => 'required|exists:users,id',
            'owner_id' => 'required|exists:users,id',
            'house_type' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_HOUSE . ',' . REALTY_TYPE_OFFICE . ',' . REALTY_TYPE_TRADE . '|exists:property_values,value,property_code,house_type',
            'build_year' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_HOUSE . ',' . REALTY_TYPE_GARAGE . ',' . REALTY_TYPE_OFFICE,
            'floors_total' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_HOUSE . ',' . REALTY_TYPE_OFFICE,
            'room' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_HOUSE . ',' . REALTY_TYPE_OFFICE . '|exists:property_values,value,property_code,room',
            'rooms_offered' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_ROOM . '|exists:property_values,value,property_code,rooms_offered',
            'floor' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_OFFICE,
            'gross_area' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_HOUSE . ',' . REALTY_TYPE_GARAGE . ',' . REALTY_TYPE_OFFICE,
            'living_area' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_APARTMENT . ',' . REALTY_TYPE_ROOM . ',' . REALTY_TYPE_HOUSE,
            'price_period' => 'sometimes|required_if:transaction_type,' . TRANSACTION_TYPE_RENT . '|exists:property_values,value,property_code,price_period',
            'garage_type' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_GARAGE . '|exists:property_values,value,property_code,garage_type',
            'garage_status' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_GARAGE . '|exists:property_values,value,property_code,garage_ownership',
            'lot_area' => 'sometimes|required_if:realty_type,' . REALTY_TYPE_AREA,
            'balcony' => 'exists:property_values,value,property_code,balcony',
            'window_view' => 'exists:property_values,value,property_code,window_view',
            'renovation' => 'exists:property_values,value,property_code,renovation',
            'bathroom_type' => 'exists:property_values,value,property_code,bathroom_type',
            'garage_building_type' => 'exists:property_values,value,property_code,garage_building_type',
            'lot_type' => 'exists:property_values,value,property_code,lot_type',
            //'description' => 'required|between:200,1000'
        ];
    }

    public function messages()
    {
        return [
            'created_by.required' => 'Поле "Кем создано" - не заполнено',
            'owner_id.required' => 'Поле "Владелец" - не заполнено',
            'realty_type.required' => 'Поле "Тип недвижимости" - не заполнено',
            'realty_type.exists' => 'Поле "Тип недвижимости" - ошибка в значении',
            'transaction_type.required' => 'Поле "Тип сделки" - не заполнено',
            'transaction_type.exists' => 'Поле "Тип сделки" - ошибка в значении',
            'house_type.required_if' => 'Поле "Тип дома" - не заполнено',
            'house_type.exists' => 'Поле "Тип дома" - ошибка в значении',
            'build_year.required_if' => 'Поле "Год постройки" - не заполнено',
            'floors_total.required_if' => 'Поле "Всего этажей" - не заполнено',
            'room.required_if' => 'Поле "Комнат" - не заполнено',
            'room.exists' => 'Поле "Комнат" - ошибка в значении',
            'rooms_offered.required_if' => 'Поле "Комнат в сделке" - не заполнено',
            'rooms_offered.exists' => 'Поле "Комнат в сделке" - ошибка в значении',
            'floor.required_if' => 'Поле "Этаж" - не заполнено',
            'gross_area.required_if' => 'Поле "Общая площадь" - не заполнено',
            'living_area.required_if' => 'Поле "Жилая площадь" - не заполнено',
            'price_period.required_if' => 'Поле "Оплата за период" - не заполнено',
            'price_period.exists' => 'Поле "Оплата за период" - ошибка в значении',
            'garage_type.required_if' => 'Поле "Тип гаража" - не заполнено',
            'garage_type.exist' => 'Поле "Тип гаража" - ошибка в значении',
            'garage_status.required_if' => 'Поле "Статус" - не заполнено',
            'garage_status.exist' => 'Поле "Статус" - ошибка в значении',
            'lot_area.required_if' => 'Поле "Площадь" - не заполнено',
            'description.required' => 'Поле "Описание" - не заполнено',
            'price.required' => 'Поле "Цена" - не заполнено',
            'description.between' => 'Поле "Описание" - не меньше 200 символов и не больше 1000',
            'balcony.exists' => 'Поле "Балкон" - ошибка в значении',
            'window_view.exists' => 'Поле "Окна выходят" - ошибка в значении',
            'renovation.exists' => 'Поле "Ремонт" - ошибка в значении',
            'bathroom_type.exists' => 'Поле "Санузел" - ошибка в значении',
            'garage_building_type.exists' => 'Поле "Тип гаража" - ошибка в значении',
            'lot_type.exists' => 'Поле "Тип участка" - ошибка в значении'
        ];
    }
}
