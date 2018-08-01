</div>
</div>
</section>
<footer class="main-footer">
    <div class="container-fluid">
        <div class="row"></div>
    </div>
</footer>
</div>
<!--https://bootstrapious.com/donate-->
<script src="<?= MAIN . 'js/jquery.min.js' ?>"></script>
<script src="<?= MAIN . 'js/dashboard/bootstrap/popper.min.js' ?>"></script>
<script src="<?= MAIN . 'js/dashboard/bootstrap/bootstrap.min.js' ?>"></script>
<script src="<?= MAIN . 'js/dashboard/front.js' ?>"></script>
<script src="<?= MAIN . 'js/dashboard/FormService.js' ?>"></script>
<?php if(!empty($data['scripts'])) : 
    foreach($data['scripts'] as $script) : ?>
        <script src="<?= MAIN. 'js/' . $script ?>"></script>
    <?php endforeach;?>
<?php endif;?>
</body>
</html>