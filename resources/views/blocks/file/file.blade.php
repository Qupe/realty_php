<label class="file-uploader{{ ' '.$class }}">
    <input class="file-uploader__input" multiple type="file" name="{{ $prop['code'] }}" value="" />
    @if (isset($files) && !empty($files))
        <span class="file-uploader__file-list">
            @foreach($files as $file)
                <span class="file-uploader__file-list-item col-md-2">
                    <img src="{{ $file['url_thumb'] }}" alt="" />
                </span>
            @endforeach
        </span>
    @else
        <span class="file-uploader__description">
            <span class="file-uploader__title">Перетащите сюда файлы или выберите на компьютере.</span>
            <span class="btn btn-default">Выбрать файл на компьютере</span>
            <span class="file-uploader__notice">
                Постарайтесь показать все важные особенности и детали. Можно добавить вид из окна, фото<br/>
                подъезда или план квартиры. Максимальный размер фотографии — 10 МБ, не более 20 файлов.
            </span>
        </span>
    @endif
</label>