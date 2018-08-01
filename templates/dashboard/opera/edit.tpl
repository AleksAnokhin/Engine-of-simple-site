<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4>Редактировать оперу</h4>
        </div>
        <div class="card-body">
            <p>Основная информация</p>
            <form class="opera-form">
                <div class="form-group form-row">
                    <div class="col">
                        <label>Название</label>
                        <div>
                            <input type="text" name="title" value="<?= $data['title'] ?>" placeholder="Название" class="form-control" autocomplete="off">
                            <input type="hidden" name="id" placeholder="Опера" value="<?= $data['id'] ?>" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Композитор</label>
                        <div class="has-input-autocomplete">
                            <input type="text" name="composer" value="<?= $data['fullName'] ?>" placeholder="Композитор" class="form-control" autocomplete="off" data-autocomplete="composer" disabled>
                            <input type="hidden" name="composer_id" placeholder="Композитор" class="form-control" autocomplete="off">
                            <input type="hidden" name="name" value="update" class="form-control" autocomplete="off">
                            <input type="hidden" name="route" value="dashboard/opera" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                            <div class="dropdown-menu" data-autocompleteList="composer"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label>По произведению</label>
                        <div>
                            <input type="text" name="basedOn" placeholder="По произведению" value="<?= $data['basedOn'] ?>" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Автор либретто</label>
                        <div>
                            <input type="text" name="librettist" value="<?= $data['librettist'] ?>" placeholder="Автор либретто" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label>Город первой постановки</label>
                        <div>
                            <input type="text" name="premierePlace" value="<?= $data['premierePlace'] ?>" placeholder="Город первой постановки" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Дата премьеры</label>
                        <div>
                            <input type="date" name="premiereYear" value="<?= $data['premiereYear'] ?>" placeholder="дата премьеры" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <div>
                            <label>Партитура</label>
                        </div>
                        <div class="full-width-label">
                            <div class="form-check form-check-inline custom-radio-check">
                                <label class="form-check-label" for="partituraExistsRadio1">
                                    <input type="radio" name="partituraExists" value="yes" id="partituraExistsRadio1" autocomplete="off" checked>
                                    <span>Есть</span>
                                </label>
                            </div>
                            <div class="form-check form-check-inline custom-radio-check">
                                <label class="form-check-label" for="partituraExistsRadio2">
                                    <input type="radio" name="partituraExists" value="no" id="partituraExistsRadio2" autocomplete="off">
                                    <span>Нет</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Длительность</label>
                        <div>
                            <input type="time" step="1" name="duration" placeholder="Длительность" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <div class="form-group text-right">
                <button class="btn btn-outline-success" onclick="updateOpera()">Сохранить изменения</button>
            </div>
        </div>

        <div class="dropdown-divider"></div>
        <div class="card-body">
            <p>Загрузить файлы</p>
            <form class="opera-files" id="fileupload">
            <div class="form-group">
                <label>Видео</label>
                <div data-target="target">
                    <input type="file"  name="videos[]" placeholder="Видео" class="form-control" multiple>
                    <input type="hidden" name="name" value="upload" class="form-control" autocomplete="off">
                    <input type="hidden" name="route" value="dashboard/opera" class="form-control" autocomplete="off">
                    <input type="hidden" name="opera_id" placeholder="Опера" value="<?= $data['id'] ?>" class="form-control" autocomplete="off">
                    <small class="form-text"></small>
                </div>
            </div>
            <div class="form-group">
                <label>Аудио</label>
                <div data-target="target">
                    <input type="file" name="audios[]" placeholder="Аудио" class="form-control" multiple>
                    <small class="form-text"></small>
                </div>
            </div>
            <div class="form-group">
                <label>Партитура</label>
                <div data-target="target">
                    <input type="file" name="partitura[]" placeholder="Партитура" class="form-control" multiple>
                    <small class="form-text"></small>
                </div>
            </div>
            </form>
        </div>
        <div class="card-footer">
        </div>

    </div>
    <div id="filesList"></div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alertModalTitle">Предупреждение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body response-message">Элемент не сохранен</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div id="loader" class="modal_loader"></div>