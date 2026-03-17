<?php require_once __DIR__ . '/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Crystal Crown Mobile Detailing'; ?></title>
    <meta name="description" content="<?php echo $pageDescription ?? 'Professional mobile car detailing services. We bring luxury detailing to your doorstep.'; ?>">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <a href="index.php" class="logo-link">
                    <img src="logo.webp" alt="Crystal Crown Mobile Detailing" class="logo">
                </a>
                <button class="mobile-menu-toggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="nav-menu">
<?php
$navType = $navType ?? 'public';
$activePage = $activePage ?? '';

if ($navType === 'dashboard') {
    $dashboardLinks = [
        ['href' => 'customerdashboard.php', 'label' => 'Dashboard', 'id' => 'dashboard'],
        ['href' => 'bookings.php',          'label' => 'Book Service', 'id' => 'bookings'],
        ['href' => 'profile.php',           'label' => 'Profile',     'id' => 'profile'],
        ['href' => 'index.php',             'label' => 'Logout',      'id' => 'logout'],
    ];
    foreach ($dashboardLinks as $link) {
        $activeClass = ($activePage === $link['id']) ? ' active' : '';
        echo "                    <li><a href=\"{$link['href']}\" class=\"nav-link{$activeClass}\">{$link['label']}</a></li>\n";
    }
} else {
    $servicesHref = ($activePage === 'home') ? '#services' : 'index.php#services';
    $publicLinks = [
        ['href' => 'index.php',    'label' => 'Home',     'id' => 'home'],
        ['href' => $servicesHref,   'label' => 'Services', 'id' => 'services'],
        ['href' => 'bookings.php', 'label' => 'Book Now', 'id' => 'bookings'],
        ['href' => 'contact.php',  'label' => 'Contact',  'id' => 'contact'],
    ];
    foreach ($publicLinks as $link) {
        $activeClass = ($activePage === $link['id']) ? ' active' : '';
        echo "                    <li><a href=\"{$link['href']}\" class=\"nav-link{$activeClass}\">{$link['label']}</a></li>\n";
    }
    if ($navType === 'auth') {
        $activeClass = ($activePage === 'login') ? ' active' : '';
        echo "                    <li><a href=\"login.php\" class=\"nav-link{$activeClass}\">Login</a></li>\n";
    }
}
?>
                </ul>
            </div>
        </div>
    </nav>
