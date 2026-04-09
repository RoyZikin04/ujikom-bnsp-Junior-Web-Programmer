<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?? 'My Kursus'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>">My Kursus</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="<?= BASEURL; ?>">Home</a>
            <a class="nav-link" href="<?= BASEURL; ?>/peserta">Data Peserta</a>
            <a class="nav-link" href="<?= BASEURL; ?>/jurusan">Data Jurusan</a>
            <a class="nav-link" href="<?= BASEURL; ?>/pendaftaran">Pendaftaran</a>
        </div>
    </div>
</nav>

<div class="container pb-4">