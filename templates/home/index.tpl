<div class="content-header">
    <div class="content-header-top-menu">
        <ul>
            <li class="active">Композиторы</li>
            <li>
                <span class="title title-big">Музыкальный портал</span>
            </li>
            <li>Полотно времени</li>
        </ul>
    </div>
</div>
<div class="content-body">
    <div id="target">
        <table class="table table-default">
            <thead>
            <tr>
                <td>Композиторы</td>
                <td>Страна
                    <select name="country" id="country" class="select_custom">
                        <option value="all">Все</option>
                        <?php  foreach($data['countries'] as $country) :?>
                        <option value="<?= $country['id'] ?>"><?= $country['title'] ?></option>
                        <?php endforeach?>
                    </select>
                </td>
                <td>Муз. направление
                    <select name="genre" id="genre" class="select_custom">
                        <option value="all">Все</option>
                        <?php  foreach($data['genres'] as $genre) :?>
                        <option value="<?= $genre['id'] ?>"><?= $genre['title'] ?></option>
                        <?php endforeach?>
                    </select>
                </td>
                <td>Произведения</td>
            </tr>
            </thead>
        </table>
    </div>
    <div class="table-fixer">
        <table class="table table-default">
            <tbody>
            <?php if(!empty($data['composers'])) :
            foreach($data['composers'] as $composer) : ?>
            <tr class="inFilter" data-country="<?= $composer['country_id'] ?>"
                data-genre="<?= $composer['genre_id'] ?>" data-composer="<?= $composer['id'] ?>">
                <td><a class="composers_link" href="<?= MAIN. 'operas/' . $composer['id'] ?>"> <?=$composer['firstName'];?></a></td>
                <td><?=$composer['country'];?></td>
                <td><?=$composer['genre'];?></td>
                <td><?= $composer['opera']; ?></td>
            </tr>
            <?php endforeach;
            endif;?>
            </tbody>
        </table>
    </div>
</div>

