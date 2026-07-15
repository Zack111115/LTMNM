<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Lab 01'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background: #f3f4f6;
            text-align: left;
        }

        .adult {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header>
        <h1>Laravel 12 – Lab 01</h1>
        <nav>
            <a href="/hello">Hello</a> |
            <a href="/students">Students</a> |

            <a href="/time">Time</a>
        </nav>
        <hr>
    </header>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <footer>
        <hr>
        <small>&copy; HUIT – Khoa CNTT</small>
    </footer>
</body>

</html><?php /**PATH C:\laragon\www\buoi6\resources\views/layouts/app.blade.php ENDPATH**/ ?>