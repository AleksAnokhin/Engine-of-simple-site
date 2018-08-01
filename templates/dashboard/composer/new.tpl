<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <form class="new-composer-form">
                <div class="form-group form-row">
                    <div class="col">
                        <label>Имя композитора</label>
                        <div>
                            <input type="text" name="firstName" placeholder="Имя композитора" class="form-control" autocomplete="off">
                            <input type="hidden" name="name" value="create" class="form-control" autocomplete="off">
                            <input type="hidden" name="route" value="dashboard/composer" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Фамилия композитора</label>
                        <input type="text" name="lastName" placeholder="Фамилия композитора" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label>Дата рождения</label>
                        <div>
                            <input type="date" name="birthDate" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                    <div class="col">
                        <label>Дата смерти</label>
                        <div>
                            <input type="date" name="deathDate" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                        </div>
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label>Страна</label>
                        <div class="has-input-autocomplete">
                            <input type="text" name="country" class="form-control" autocomplete="off" data-autocomplete="country">
                            <input type="hidden" name="country_id" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                            <div class="dropdown-menu" data-autocompleteList="country"></div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Муз. направление</label>
                        <div class="has-input-autocomplete">
                            <input type="text" name="genre" class="form-control" autocomplete="off" data-autocomplete="genre">
                            <input type="hidden" name="genre_id" class="form-control" autocomplete="off">
                            <small class="form-text"></small>
                            <div class="dropdown-menu" data-autocompleteList="genre"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Биография</label>
                    <textarea class="form-control" name="bio" placeholder="Биография" rows="5"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>