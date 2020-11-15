<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo THEME_SRC;?>assets/css/main.min.css">
    <?php echo $header; ?>
</head>
<body>
    <h1 class="page-title">HOME</h1>

    <table class="table-lists">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Пол</th>
                <th>Возраст</th>
                <th>Группа</th>
                <th>Факультет</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lists as $list): ?>
            <tr data-id="<?php echo $list['id']; ?>">
                <td>
                    <input class="td-input" disabled="true" name="firstName" value="<?php echo $list['firstName'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" disabled="true" name="lastName" value="<?php echo $list['lastName'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" disabled="true" name="age" value="<?php echo $list['age'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td data-floor="<?php echo $list['floor'];?>"><?php echo $list['floor'];?></td>
                <td>
                    <input class="td-input" disabled="true" name="group_name" value="<?php echo $list['group_name'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" disabled="true" name="faculty_name" value="<?php echo $list['faculty_name'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <button name="test">+</button>
    
    <script src="<?php echo THEME_SRC;?>assets/js/main.min.js"></script>
</body>
</html>