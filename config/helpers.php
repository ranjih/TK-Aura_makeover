<?php
require_once __DIR__.'/config.php';
function e($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function redirect(string $url): never { header('Location: '.$url); exit; }
function is_admin(): bool { return !empty($_SESSION['admin_id']); }
function is_customer(): bool { return !empty($_SESSION['customer_id']); }
function require_admin(): void { if (!is_admin()) redirect('../login.php?role=admin'); }
function require_customer(): void { if (!is_customer()) redirect('../login.php'); }
function csrf_token(): string { if (empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function verify_csrf(): void { if ($_SERVER['REQUEST_METHOD']==='POST' && !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) { http_response_code(419); exit('Invalid request token. Go back and try again.'); } }
function flash(string $message, string $type='success'): void { $_SESSION['flash']=['message'=>$message,'type'=>$type]; }
function show_flash(): void { if (!empty($_SESSION['flash'])) { $f=$_SESSION['flash']; echo '<div class="alert '.e($f['type']).'">'.e($f['message']).'</div>'; unset($_SESSION['flash']); } }
function money($amount): string { return '₹'.number_format((float)$amount, 2); }
