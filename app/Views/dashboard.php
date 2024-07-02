<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
    <h1>Welcome <?= session()->get('user_logged')['username']?>!</h1>
<?=$this->endSection()?>