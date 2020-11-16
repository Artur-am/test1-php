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
            <?php foreach($lists as $id=>$list): ?>
            <tr data-id="<?php echo $list['id']; ?>">
                <td>
                    <input class="td-input" disabled="true" type="text" name="firstName" value="<?php echo $list['firstName'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" disabled="true" type="text" name="lastName" value="<?php echo $list['lastName'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" disabled="true" type="text" name="age" value="<?php echo $list['age'];?>">
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td data-floor="<?php echo $list['floor'];?>">
                    <input id="input-floor-<?php echo $id;?>" class="td-input custom-checkbox" disabled="true" type="checkbox" name="floor" <?php echo (false==$list['floor'])?'':'checked';?>>
                    <label for="input-floor-<?php echo $id;?>"></label>
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" hidden disabled="true" type="text" name="group_id" value="<?php echo $list['group_id'];?>">
                    <select class="ts-select" name="select-group" disabled="true" >
                        <?php foreach($groups as $group): ?>
                            <option value="<?php echo $group['id'];?>"<?php echo ($list['group_id']==$group['id'])?' selected':'' ?>><?php echo $group['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <i class="icon-edit js-edit">&#9998;</i>
                </td>
                <td>
                    <input class="td-input" hidden disabled="true" type="text" name="faculty_id" value="<?php echo $list['faculty_id'];?>">
                    <select class="ts-select" name="select-faculty" disabled="true" >
                        <?php foreach($faculty as $f): ?>
                            <option value="<?php echo $f['id'];?>"<?php echo ($list['faculty_id']==$f['id'])?' selected':'' ?>><?php echo $f['name'];?></option>
                        <?php endforeach; ?>
                    </select>
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