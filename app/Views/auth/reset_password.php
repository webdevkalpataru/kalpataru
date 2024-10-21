<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>
<body>
    <h2>Atur Ulang Kata Sandi</h2>
    <form action="/auth/reset-password" method="POST">
        <input type="hidden" name="token" value="<?= $token; ?>">
        <label for="kata_sandi">Kata Sandi Baru:</label>
        <input type="password" id="kata_sandi" name="kata_sandi" required>
        <button type="submit">Atur Ulang Kata Sandi</button>
    </form>
</body>
</html>