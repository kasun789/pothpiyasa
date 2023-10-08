<div class="container_onlineUsers" id="container_onlineUsers">
    <div class="onlineUsers">
        <div class="con3">
            <h1 class="onlineUsersh1">Online Users</h1>
        </div>
        <div class="online_user_data">
            <?php if ($online_user_rows): ?>
                <table class="online_user_table">
                    
                    <?php foreach ($online_user_rows as $online_user_row): ?>
                        <tr>
                            <td>
                                <img src="<?= ROOT ?>/uploads/<?= get_userImage('UserID',$online_user_row->UserID) ?>" alt="" srcset="" id="profileImg" class ="online_user_image">
                            </td>
                            <td>
                                <?= $online_user_row->UserName ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                </table>

            <?php else: ?>
                <div class="result_notfound_container">
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>