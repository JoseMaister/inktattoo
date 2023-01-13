<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">     
        <table class="table">
            <thead>
                <tr class="headings">
                    <th class="column-title text-center">Tittle</th>
                    <th class="column-title text-center">Category</th>
                    <th class="column-title text-center">Intro Text</th>
                    <th class="column-title text-center">Content</th>
                    <th class="column-title text-center">Img</th>
                    <th class="column-title text-center">User</th>
                    <th class="column-title text-center">Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($data) 
            { 
                foreach ($data->result() as $elem) 
                { 
            ?>
                <tr class="even pointer">
                    <td class="text-center"><?= $elem->tittle ?></td>
                    <td class="text-center"><?= $elem->category ?></td>
                    <td class="text-center"><?= $elem->intro_text ?></td>
                    <td class="text-center"><?= $elem->content ?></td>
                    <td class="text-center"><img width="100" src=<?= 'data:image/bmp;base64,' . base64_encode($elem->img); ?>></td>
                    <td class="text-center"><?= $elem->User ?></td>
                    <td class="text-center"><?= $elem->date ?></td>
                </tr>
                <?php
                }
            }
            ?>
            </tbody>
        </table>
 
    </div>
</body>
</html>