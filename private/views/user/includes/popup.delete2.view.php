<div class="container_popup">
    <div class="popup" id="popup">
        <img src="<?= ROOT ?>/img/tick.png">
        <h2>Deleted!</h2>
        <p>Data has been deleted.</p>
        <button type="button" onclick="closePopup()">OK</button>
    </div>
</div>







<?php if ($rows): ?>
                <table class="user_table">

                        <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Sex</th>
                                <th>Email</th>
                                <th>Added by</th>
                                <th>Operations</th>

                        </tr>
                        <?php 
                        $i=0;
                        foreach ($rows as $row): 

                                ?>
                        <tr>
                                <td><?= ++$i; ?></td>
                                <td><a href='<?= ROOT ?>/authors/viewOne/<?= $row->AuthorID ?>'><?= $row->Name ?></a></td>
                                <td><?= $row->Sex ?></td>
                                <td><?= $row->Email ?></td>
                                <!-- Getting staff member name when given id -->
                                <td><?= get_user_name('StaffID', $row->AddStaffID) ?></td>


                                <td><button type='button' class='editbtn' id='editbtn'><i
                                                        class='fa-solid fa-pen'></i>&nbsp;<a
                                                        href='<?= ROOT ?>/authors/edit/<?= $row->AuthorID ?>'>
                                                        Edit</a></button>
                                        <button type='button' class='deletebtn' id='deletebtn' disabled><i
                                                        class='fa-solid fa-trash'></i>&nbsp;<a
                                                        href='<?= ROOT ?>/authors/delete/<?= $row->AuthorID ?>'>
                                                        Delete</a></button>
                                </td>

                        </tr>

                        <?php endforeach; ?>
                </table>

                <?php else: ?>
                <h4>No users were found at this time</h4>
                <?php endif; ?>
        </div>