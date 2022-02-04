<?= $this->extend('layout/admin/main') ?>

<?= $this->section('sidebar') ?>
<div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header">
                <span>Settings</span>
                <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Support"></i>
            </li>
        </ul>
    </div>
</div>
<?= $this->endSection() ?>