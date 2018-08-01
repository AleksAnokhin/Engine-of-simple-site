<div class="col-sm-12" id="editPage">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4>Редактировать композитора</h4>
        </div>
        <div class="card-body">
            <form class="edit-composer-form">
                <div class="form-group form-row">
                    <div class="col">
                        <label>Имя композитора</label>
                        <div>
                            <input type="text" name="firstName" value="<?=$data['firstName']?>" placeholder="Имя композитора" class="form-control" autocomplete="off">
                            <input type="hidden" name="id" value="<?=$data['id'];?>" class="form-control" autocomplete="off">
                            <input type="hidden" name="name" value="update" class="form-control" autocomplete="off">
                            <input type="hidden" name="route" value="dashboard/composer" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Фамилия композитора</label>
                        <div>
                            <input type="text" name="lastName" value="<?=$data['lastName']?>" placeholder="Фамилия композитора" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label>Дата рождения</label>
                        <div>
                            <input type="date" name="birthDate" value="<?= $data['birthDate']?>" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Дата смерти</label>
                        <div>
                            <input type="date" name="deathDate" value="<?= $data['deathDate']?>" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label>Страна</label>
                        <div class="has-input-autocomplete">
                            <input type="text" name="country" value="<?=$data['country']?>" placeholder="Страна" class="form-control" autocomplete="off" data-autocomplete="country">
                            <input type="hidden" name="country_id" value="<?=$data['country_id']?>" placeholder="Страна" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                            <div class="dropdown-menu" data-autocompleteList="country"></div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Муз. направление</label>
                        <div class="has-input-autocomplete">
                            <input type="text" name="genre" value="<?=$data['genre']?>" placeholder="Муз. направление" class="form-control" autocomplete="off" data-autocomplete="genre">
                            <input type="hidden" name="genre_id" value="<?=$data['genre_id']?>" placeholder="Муз. направление" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                            <div class="dropdown-menu" data-autocompleteList="genre"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Биография</label>
                    <textarea class="form-control" name="bio" placeholder="Биография" rows="5"><?= $data['bio'];?></textarea>
                </div>
            </form>
		</div>
		<div class="card-footer">
			<div class="form-group text-right">
				<button class="btn btn-outline-success" onclick="updateComposer()">Сохранить</button>
			</div>
		</div>
    </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="editComposerModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editComposerModalTitle">Предупреждение</h5>
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