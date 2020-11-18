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

    
    <form class="form-create" name="create" id="create" action=""></form>
    <form class="form-remove" name="remove" id="remove" action=""></form>

    <table class="table-lists">
        <thead>
            <tr>
                <th>&#128465;</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Возраст</th>
                <th>Пол</th>
                <th>Группа</th>
                <th>Факультет</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lists as $id=>$list): ?>
            <tr data-id="<?php echo $list['id']; ?>">
                <td>
                    <input form="remove" type="checkbox" name="remove_id" value="<?php echo $list['id'];?>">
                </td>
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

            <tr class="tr-form clone-element">
                <td></td>
                <td>
                    <input data-form="create" id="firstName" class="create-input" type="text" name="firstName" placeholder="" />
                    <label class="create-label" for="firstName">Имя</label>
                </td>
                <td>
                    <input data-form="create" id="lastName" class="create-input" type="text" name="lastName" placeholder="" />
                    <label class="create-label" for="lastName">Фамилия</label>
                </td>
                <td>
                    <input data-form="create" id="number" class="create-input" type="number" name="age" value="" />
                    <label class="create-label" for="number">Возраст</label>
                </td>
                <td>
                    <input data-form="create" id="floor" class="td-input custom-checkbox" type="checkbox" name="floor">
                    <label for="floor"></label>
                </td>
                <td>
                    <select data-form="create" name="select-group">
                        <?php foreach($groups as $group): ?>
                            <option value="<?php echo $group['id'];?>"><?php echo $group['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <select data-form="create" name="select-faculty" >
                        <?php foreach($faculty as $f): ?>
                            <option value="<?php echo $f['id'];?>"><?php echo $f['name'];?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr class="reset-td">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><button form="remove" type="submit" name="remove" class="btn-remove close">Remove</button></td>
                <td><button form="create" type="submit" class="btn-add close">Add</button></td>
                <td><button type="submit" class="btn-create">Create</button></td>
            </tr>

        </tbody>
    </table>
    
    <script src="<?php echo THEME_SRC;?>assets/js/main.min.js"></script>
</body>
</html>